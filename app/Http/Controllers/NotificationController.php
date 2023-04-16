<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Permit;

class NotificationController extends Controller
{
    public function notification()
    {
        $today = Carbon::now();
        $expiringPermits = Permit::with('company')
            ->where('expiry_date', '<=', date('Y-m-d', strtotime('+20 day')))
            ->where('expiry_date', '>=', $today)
            ->orderBy('expiry_date')
            ->get();

        return view('pages.notifications', compact('expiringPermits'));
    }
}
