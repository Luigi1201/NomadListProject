<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Http\Controllers\CittaHomeController;

class LikeController extends Controller
{
    public function likeFunction(Request $request){
        $CittaId=$request->CittaId;
        if(session()->has('LoggedUser')){
            $UtenteId=session('LoggedUser');

            //controllo se il like esiste gia
            $like = DB::table('like')
            ->where("user_id",$UtenteId)
            ->where("citta_id", $CittaId)
            ->first();

            if($like){
                //eliminazione like
                DB::table('like')
                    ->where('citta_id','=',$CittaId)
                    ->where('user_id','=',$UtenteId)
                    ->delete();
            }else{
                //Inserimento like nel db
                $query = DB::table("like")
                ->insert([
                    'citta_id'=> $CittaId,
                    'user_id'=>$UtenteId
                ]);
            }

            $nome = DB::table('citta')->where('id', $CittaId)->value('nome');
            return redirect('/'.$nome);
        }
    }
}
