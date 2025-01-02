<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MyTaskCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'command:name';
    protected $signature = 'my:task';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perform my custom task';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
