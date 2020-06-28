<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Sum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'arick:sum {data}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'sum all number';

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
     * @return int
     */
    public function handle()
    {
        $items = explode(',', $this->argument('data'));
        $items = array_filter($items, function($v){
            return is_numeric($v);
        });
        $result = array_reduce($items, function($s, $v){
            $s += $v;
            return $s;
        }, 0);
        echo "Result: {$result}\n";
    }
}
