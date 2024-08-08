<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Voucher;
use Carbon\Carbon;

class CheckVoucherStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vouchers:check-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check vouchers and update status if expired';

    public function __construct(){
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();
        Voucher::where('valid_until', '<', $now)
            ->where('active', 1) // Assuming 'active' is the field indicating status
            ->update(['active' => 0]);

        $this->info('Vouchers status updated successfully.');
    }
}
