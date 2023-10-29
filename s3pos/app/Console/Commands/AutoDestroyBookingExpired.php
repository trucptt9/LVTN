<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;

class AutoDestroyBookingExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:auto-destroy-booking-expired';

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
            Booking::expired()->each(function ($booking) use (&$total) {
                $booking->status = Booking::STATUS_DESTROY;
                $booking->note = 'Hủy lịch hẹn vì đã hết hạn!';
                $booking->save();
                $total++;
            });
            $this->info('Đã hủy ' . $total . ' lịch hẹn đã hết hạn!');
        } catch (\Throwable $th) {
            showLog($th);
        }
    }
}
