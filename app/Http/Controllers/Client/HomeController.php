<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Game;
use App\Events;
use App\News;
use DB;
use App\Http\Controllers\Admin\FunctionController;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    public function index()
    {
        $deal_sale = DB::select("SELECT * FROM deal_sale");
        $header = DB::select("SELECT * FROM header");
        $image_header = DB::select("SELECT * FROM image_header");

        return view('client.home', compact('deal_sale', 'header', 'image_header'));
    }    

    public function getDownload(Request $req)
    {
        // try{
            $input = $req->only(['val','val_game']);
            // 0: android, 1:ios, 2:pc
            // 
            $id_game=(int)$req->val_game;
            $type=(int)$req->val;
          
    // type_join_tabletinyint(2) NULL1:game,2:tin tức, 3:event
            $fun= new FunctionController();
            $fun->countDonwload($id_game,1,$type);
            
            return response()->json(true);
        // }catch (\Exception $e) {
          
        //     return response()->json(true);
        // }
    }

    public function connectToGameMini(Request $req){
        $walletAddress = $req->walletAddress;

        // $key = "UDM74D9gZKg2sda1";

        $key = config('app.key_link_game_tele');
        $linkGameTele = config('app.link_game_tele');

        // $encrypted = openssl_encrypt($walletAddress, 'aes-128-ecb', $key, 0);

        $linkGameMini = $linkGameTele."/start?startapp=walletlink_". $walletAddress;

        return response()->json($linkGameMini);
    }
}


