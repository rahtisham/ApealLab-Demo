<?php

namespace App\Http\Controllers\Integrations;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\apiIntegrations;
use App\Actions\Integration\Walmart;
use Illuminate\Support\Facades\DB;

class WalmartController extends Controller
{
    public function index(Request $request)
    {
        return view('walmart');
    }

    public function add(Request $request)
    {
        $uses_session_id = auth()->user()->id;

        $client_id = $request->get('clientID');
        $secret = $request->get('clientSecretID');

        $this->validate($request ,[

            'clientName' => 'required',
            'clientID' => 'required',
            'clientSecretID' => 'required',

        ]);

        $url = "https://marketplace.walmartapis.com/v3/token";
        $uniqid = uniqid();
        $authorization_key = base64_encode($client_id.":".$secret);


        $ch = curl_init();
        $options = array(

            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 60,
            CURLOPT_HEADER => false,
            CURLOPT_POST =>1,
            CURLOPT_POSTFIELDS => "grant_type=client_credentials",
            CURLOPT_HTTPHEADER => array(

                "WM_SVC.NAME: Walmart Marketplace",
                "WM_QOS.CORRELATION_ID: $uniqid",
                "Authorization: Basic $authorization_key",
                "Accept: application/json",
                "Content-Type: application/x-www-form-urlencoded",
            ),
        );
            curl_setopt_array($ch,$options);


            $response = curl_exec($ch);
            $code = curl_getinfo($ch,CURLINFO_HTTP_CODE);

            curl_close($ch);


        if($code == 201 || $code == 200)
        {
            $token = json_decode($response,true);

            $integration = new apiIntegrations([


                'name' => $request->get('clientName'),
                'client_id'      => $request->get('clientID'),
                'client_secret'  => $request->get('clientSecretID'),
                'status'  => "active",
                'token'  => "test",
                'is_active'  =>  '0',
                'platform'  => "Walmart",
                'user_id' => $uses_session_id

            ]);

            $integration->save();

//            return redirect()->action([WalmartGetAllTemsController::class, 'checkProduct'] , ['id' => 1]);

            return response()->json(['success'=>
                ' <div class="alert alert-primary alert-dismissible fade show">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                <strong>Welcome!</strong> Data Has Been Submited Successfully....
                <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                </button>
                </div>'
            ]);

        }
        else{

            return response()->json(['error'=>
            '<div class="alert alert-danger alert-dismissible fade show">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
            <strong>Welcome!</strong> Invalid User Credential
            <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
            </button>
            </div>'
            ]);

        }

    }


    public function walmartIntegrationLintingView(Request $request , $id)
    {

        $integrations = DB::table('integrations')->where('id' , $id)->first();
        return view('integrationListening' , compact('id' , 'integrations'));

    }

    public function walmartListeningDelete($id)
    {
       $clientid =  apiIntegrations::where('id' , $id)->delete();
       return redirect('dashboard')->with('success' , 'Client Integrate Has Been Deleted!');
    }


}
