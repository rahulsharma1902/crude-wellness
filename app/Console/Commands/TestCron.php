<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Mail;
use App\Mail\ForgottenPassword;
use App\Models\ProductVariations;

class TestCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test-cron';

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
      $variations = new ProductVariations;
      $variations->product_id = 10;
      $variations->strength = 20;
      $variations->qty = 10;
      $variations->price = 30;
      $variations->save();
      return 'done';
    }
}
