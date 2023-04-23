<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Permit;
use OwenIt\Auditing\Models\Audit;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        /* Calculating totals in Laravel using conditional agrregates
        https://reinink.ca/articles/calculating-totals-in-laravel-using-conditional-aggregates */
        $permits = DB::table('permits')
            ->selectRaw('count(*) as total')
            ->selectRaw("count(case when permit_type = 'safety permit' then 1 end) as safety")
            ->selectRaw("count(case when permit_type = 'operating permit' then 1 end) as operating")
            ->first();

        $certificates = DB::table('certificates')
            ->selectRaw('count(*) as total')
            ->first();

        $permitChart = Permit::with('company')->selectRaw("company_id, COUNT(*) as company_id_count")
            ->groupBy('company_id')
            ->inRandomOrder()
            ->limit(10)
            ->get();

        $certificateChart = Certificate::with('vessel')->selectRaw("vessel_id, COUNT(*) as vessel_id_count")
            ->groupBy('vessel_id')
            ->inRandomOrder()
            ->limit(10)
            ->get();

        $audits = Audit::whereIn('auditable_type', ['App\Models\Permit'])
            ->whereIn('event', ['created'])
            ->limit(8)
            ->get();

        $expiringPermits = Permit::with('company')
            ->where('expiry_date', '>=', date('Y-m-d'))
            ->get();
        return view('pages.dashboard', compact(['permits', 'expiringPermits', 'audits', 'permitChart', 'certificates', 'certificateChart']));
    }
}
