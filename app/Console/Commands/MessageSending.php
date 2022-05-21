<?php

namespace App\Console\Commands;

use App\Jobs\ProcessMessage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Message;

class MessageSending extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'MessageSending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gửi những tin nhắn đang chờ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $messages = Message::where('status','=','waiting')->get();
        if(count($messages) > 0){
            foreach($messages as $message){
                dispatch( new ProcessMessage($message) ); 
            }
        }

    }
}
