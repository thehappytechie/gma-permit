<?php

namespace App\Http\Controllers;


use App\Models\Contract;
use App\Models\Permit;
use OwenIt\Auditing\Models\Audit;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard()
    {
        /* Calculating totals in Laravel using conditional agrregates
        https://reinink.ca/articles/calculating-totals-in-laravel-using-conditional-aggregates */
        $contracts = DB::table('contracts')
            ->selectRaw('count(*) as total')
            ->selectRaw("count(case when status = 'active' then 1 end) as active")
            ->selectRaw("count(case when status = 'archived' then 1 end) as archived")
            ->selectRaw("count(case when status = 'draft' then 1 end) as draft")
            ->selectRaw("count(case when status = 'expired' then 1 end) as expired")
            ->selectRaw("count(case when status = 'pending' then 1 end) as pending")
            ->selectRaw("count(case when status = 'superseded' then 1 end) as superseded")
            ->selectRaw("count(case when status = 'negotiating' then 1 end) as negotiating")
            ->first();

        $permitChart = Contract::with('company')->selectRaw("company_id, COUNT(*) as company_id_count")
            ->groupBy('company_id')
            ->inRandomOrder()
            ->limit(10)
            ->get();

        $audits = Audit::whereIn('auditable_type', ['App\Models\Contract'])
            ->whereIn('event', ['created'])
            ->limit(8)
            ->get();

        $expiringPermits = Permit::with('company')
            ->where('expiry_date', '>=', date('Y-m-d'))
            ->get();
        return view('pages.dashboard', compact(['contracts', 'expiringPermits', 'audits', 'permitChart']));
    }
}
