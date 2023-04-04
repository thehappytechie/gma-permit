<?php

namespace App\View\Components;

use App\Models\Contract;
use Carbon\Carbon;
use App\Models\License;
use Illuminate\View\Component;

class Notification extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $today = Carbon::now();
        $expiringContracts = Contract::with('company')
            ->where('expiry_date', '<=', date('Y-m-d', strtotime('+20 day')))
            ->where('expiry_date', '>=', $today)
            ->count();
        return view('components.notification', compact('expiringContracts'));
    }
}
