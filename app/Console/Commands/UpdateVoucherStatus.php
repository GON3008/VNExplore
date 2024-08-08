<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Voucher;
use Carbon\Carbon;

class UpdateVoucherStatus extends Command
{
    protected $signature = 'vouchers:update-status';
    protected $description = 'Update the status of expired vouchers';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();
        Voucher::where('valid_until', '<', $now)
            ->where('status', 0)
            ->update(['status' => 1]);

        $this->info('Voucher statuses have been updated.');
    }
}
