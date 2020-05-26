<?php

namespace App\Console\Commands;
use Illuminate\Support\Facades\Auth;
use App\images;
use Storage;
use Illuminate\Console\Command;

class everyminute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $data = Images::where('user_id')->get();
         $strip=trim($data, '[]');
        // $paths=storage_path(1);
        Storage::deleteDirectory('public/'.$strip);
        Images::query()->truncate();
    }
}
