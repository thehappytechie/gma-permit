<?php

namespace App\Console\Commands;

use App\Models\License;
use Illuminate\Console\Command;
use App\Mail\EmailExpiredLicense;
use Illuminate\Support\Facades\Mail;

class EmailExpiredLicenseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send-expired-license';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send expired license status alerts to Agency';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $licenses = License::with('agent')
        ->where('expiry_date', '=', date('Y-m-d', strtotime('+0 day')))
        ->get();
    foreach ($licenses as $license) {
        Mail::to($license->agent->email)->send(new EmailExpiredLicense($license));
    }
    }
}
