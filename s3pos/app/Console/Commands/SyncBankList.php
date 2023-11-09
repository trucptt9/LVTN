<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\VietQRController;
use Illuminate\Console\Command;

class SyncBankList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-bank-list';

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
            VietQRController::loadBanks();
        } catch (\Throwable $th) {
            showLog($th);
        }
    }
}
