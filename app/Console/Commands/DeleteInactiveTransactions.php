<?php

namespace MyEscrow\Console\Commands;

use Illuminate\Console\Command;
use DB;
use Carbon\Carbon;

class DeleteInactiveTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeleteInactiveTransactions:updatetransactions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'update inactive transactions';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $current = Carbon::now();
        $dt = Carbon::now();

        $dt = $current->subHours(2);
        $user = DB::table('transactions')
            ->where([
                ['transactions.transaction_status', '=', 0],
                ['transactions.transaction_token', '<>', Null],
                ['transactions.created_at', '<=', $dt]
                ])
            ->update(['transactions.transaction_token' => Null]);
    }
}
