<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Resend\Laravel\Facades\Resend;
use App\Models\User;
use App\Models\ResetUser;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use Hash;
class ResetPassword extends Controller
{
    /**
     * Envio de email para recuperacion de cuenta...
     */
    public function SendEmail (Request $request){
        $rules = [
            'email' => 'required',
        ];
        $validatedData = $this->validate($request, $rules);
        $email         = $validatedData['email'];
        $user          = User::where('email',$email)->first();
        if($user){
            $codigo  = Str::random(7);
            $payload = [
                'user_id' => $user['id'],
                'code'    => $codigo,
                'expire'  => Carbon::now()->addMinutes(3)->toDateTimeString()
            ];
          $insert =  DB::table('codeReset')->updateOrInsert(
                ['user_id' => $user['id']],
                $payload
            );
          if($insert){
            Resend::emails()->send([
                'from' => env('MAIL_FROM_ADDRESS'),
                'to' => [$email],
                'subject' => 'Código de recuperación:',
                'html' => '<p>Tu codigo de recuperacion es: <br><br> <h1> <b>'.$codigo.'</b></h1><p>',
            ]);
            return redirect()->route('CodeInsert');
          }else{
            return back()->withErrors(['error' => 'Cuenta No Encontrada']);
          }
        }
        return back()->withErrors(['error' => 'Cuenta No Encontrada']);

    }
    public function  Verify(Request $request){
        $rules = [
            'code'  => 'required',
        ];
        $validatedData = $this->validate($request, $rules);
        $code          = $validatedData['code'];
        $data          = ResetUser::where('code',$code)->first();
        $time          = Carbon::now()->toDateTimeString();
       if(!empty($data)){
            if($data->expire < $time ){
                if($code == $data['code']){
                    return view('auth.passwords.newPassword')->with('user_id',$data['user_id']);
                }
                return back()->withErrors(['error' => 'Codigo Incorrecto']);
            }else{
                if($data->count() && isset($data->user_id)){
                    ResetUser::where('user_id', $data->user_id)->delete();
                }
                return back()->withErrors(['error' => 'Codigo Expirado']);
            }
       }else{
         return back()->withErrors(['error' => 'Codigo Incorrecto']);
       }

    }
    public function updatePassword(Request $request){
        $usuario = User::find($request->user_id);
        $contraseñaCifrada = Hash::make($request->password);
        $usuario->update(['password' => $contraseñaCifrada]);
        return redirect()->route('home');
    }
}
