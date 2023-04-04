<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notification()
    {
        $today = Carbon::now();
        $expiringContracts = Contract::with('company')
            ->where('expiry_date', '<=', date('Y-m-d', strtotime('+20 day')))
            ->where('expiry_date', '>=', $today)
            ->orderBy('expiry_date')
            ->get();

        return view('pages.notifications', compact('expiringContracts'));
    }
}
