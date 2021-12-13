<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\Product;
use App\Mail\MailNotification;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EmailNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:notification';

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
     * @return int
     */
    public function handle()
    {
        $products = Product::all();
        foreach ($products as $products)
        {
            $user_id = $products['user_id'];

            if($products['emailNotification'] == "EmailNotification")
            {
                $user = User::where('id' , '=' , $user_id)->get()->first();
                $email = $user->email;
                if(!empty($email)) {
                    $detail = [
                        'productID' => $products['itemId'],
                        'productName' => $products['Title'],
                        'publishedStatus' => $products['publishedStatus'],
                        'resion' => $products['unpublishedReasons'],
                        'userEmail' => $email
                    ];
                    Mail::to($email)->send(new MailNotification($detail));
                    $userUpdate = Product::where('emailNotification' , '=' , 'EmailNotification')->get()->first();
                    $userUpdate->emailNotification = "Email Has been Sent";
                    $userUpdate->save();
                    \Log::info("Email Has Been updated".$userUpdate);
                }
            }
            else
            {
                \Log::info("Email is already sent");
            }
        }



    }
}
