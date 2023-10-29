<?php

namespace App\Console\Commands;

use App\Models\License;
use Illuminate\Console\Command;

class AutoBlockLicenseExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-block-license-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $total = 0;
            License::where('status', '<>', License::STATUS_SUSPEND)->expired()->each(function ($license) use (&$total) {
                $license->status = License::STATUS_SUSPEND;
                $license->note = 'Khóa license vì đã hết hạn!';
                $license->save();
                $total++;
            });
            $this->info('Đã khóa ' . $total . ' license đã hết hạn!');
        } catch (\Throwable $th) {
            showLog($th);
        }
    }
}
