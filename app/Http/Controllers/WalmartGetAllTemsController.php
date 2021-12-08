<?php

namespace App\Http\Controllers;

use App\Models\apiIntegrations;
use Illuminate\Http\Request;
use App\Actions\Integration\Walmart;
use App\Models\product;


class WalmartGetAllTemsController extends Controller
{
    public function index()
    {
        return view('walmartallitem');
    }

    public function checkProduct(Request $request)
    {

        $client_id = $request->get('clientID');
        $secret = $request->get('clientSecretID');


        $this->validate($request ,[

            'clientName' => 'required',
            'clientID' => 'required',
            'clientSecretID' => 'required',

        ]);

        $response[] = Walmart::getItem($client_id , $secret);
            // Walmart taken generate with Original data


            foreach ($response[0]['ItemResponse'] as $items) {


             $unpublishedReasons = [];
             // If $unpublishedReasons empty will run

            if(array_key_exists('unpublishedReasons' ,$items))
            {
                $unpublished = $items['unpublishedReasons']['reason'];
                $unpublishedReasons = implode(', ', $unpublished);
                // If $unpublishedReasons get here so this query will run
            }

                $price = $items['price']['amount'];

                $productItems[] = Product::create([
                    'itemId' => $items['wpid'],
                    'user_id' => auth()->user()->id,
                    'UPC' => $items['upc'],
                    'SKU' => $items['sku'],
                    'Title' => $items['productName'],
                    'price' => $price,
                    'unpublishedReasons' => $unpublishedReasons,
                    'lifeStatus' => $items['lifecycleStatus'],
                    'publishedStatus' => $items['publishedStatus']
                ]);

                if ($productItems)
                {
                    echo "Data Inserted";
                }
                else
                {
                    echo "Data did not insert";
                }

            }
        //End loop

         }
    //End function



}
