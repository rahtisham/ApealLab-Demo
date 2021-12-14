<?php

namespace App\Console\Commands;

use App\Actions\Integration\Walmart;
use App\Models\apiIntegrations;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use App\Mail\MailNotification;
use App\Http\Controllers\Integrations\WalmartController;

class WalmartProductsNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is the demo cron';

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

        $integrations = apiIntegrations::all();
        foreach ($integrations as $integration)
        {
            $response = Walmart::getItem($integration->client_id , $integration->client_secret);

            foreach ($response['ItemResponse'] as $items) {

                $unpublishedReasons = '';
                $status = '';

                if(array_key_exists('unpublishedReasons' ,$items))
                {
                    $unpublished = $items['unpublishedReasons']['reason'];
                    $unpublishedReasons = implode(', ', $unpublished);
                }

                if($items['publishedStatus'] == "UNPUBLISHED" || $items['publishedStatus'] == "PUBLISHED" || $items['publishedStatus'] == "SYSTEM_PROBLEM")
                {
                    $status = "EmailNotification";
                }

                $price = $items['price']['amount'];

                $productItems = Product::create([
                    'itemId' => $items['wpid'],
                    'user_id' => $integration->user_id,
                    'client_id' => $integration->id,
                    'UPC' => $items['upc'],
                    'SKU' => $items['sku'],
                    'Title' => $items['productName'],
                    'price' => $price,
                    'unpublishedReasons' => $unpublishedReasons,
                    'lifeStatus' => $items['lifecycleStatus'],
                    'publishedStatus' => $items['publishedStatus'],
                    'emailNotification' => $status
                ]);

                \Log::info("There are all user id.".$productItems);

            }
          // End foreach loop of Walmart Product

        }
     // End foreach loop of integration

       \Log::info("Items Have Been Added");



        //return Command::SUCCESS;
    }
}
