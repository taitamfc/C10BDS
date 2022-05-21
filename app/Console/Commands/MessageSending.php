<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MessageSending extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        DB::table('messages')->insert([
            'title' => 'tieu de',
            'content' => 'Day la noi dung bai viet',
            'type' =>'kieu',
            'status' =>'trang thai',
            'date_send' => '2022-05-22'
        ]);
    }
}
