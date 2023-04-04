<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\License;
use Illuminate\Console\Command;
use App\Mail\EmailExpiringLicense;
use Illuminate\Support\Facades\Mail;

class EmailExpiringLicenseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send-expiring-license';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send expiring license status alerts to Agency';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::now();
        $licenses = License::with('agent')
            ->where('expiry_date', '<=', date('Y-m-d', strtotime('+14 day')))
            ->where('expiry_date', '>=', $today)
            ->get();
        foreach ($licenses as $license) {
            Mail::to($license->agent->email)->send(new EmailExpiringLicense($license));
        }
    }
}
