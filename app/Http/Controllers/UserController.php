<?php

namespace App\Http\Controllers;

use App\Helpers\MasterFunctionsHelper;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'userid' => 'required',
            'fullname' => 'required',
            'gender'=>'required',
            'password'=>'required',
            'repassword'=>'required',]
        );
        $userid=$request->input('userid');
        $pass1=$request->input('password');
        $pass2=$request->input('repassword');
        $data['image']='welldy.png';
        try{
            $cekuser = User::where('userid',$userid)->first();
            //return response()->json(MasterFunctionsHelper::OKResponse(true,"USer berhasil didaftarkan",$cekuser),200);
            if($cekuser!=null){
               throw new Exception("UserExist");
            }
            if($pass1!=$pass2){
                throw new Exception("Kombinasi password salah");
                //return response()->json(MasterFunctionsHelper::OKResponse(false,"Kombinasi Password Salah",null),400);
            }
            $user = User::create($data);
            return response()->json(MasterFunctionsHelper::OKResponse(true,"USer berhasil didaftarkan",$user),200);
        }catch(Exception $e){
            return response()->json(MasterFunctionsHelper::OKResponse(false,$e->getMessage(),null),400);
        }
    }
    public function login(Request $request)
    {
        try{
            $this->validate($request, [
                'userid' => 'required',
                'password' => 'required',]);
            $userid=$request->input('userid');
            $password=$request->input('password');

            $user = User::where('userid',$userid)->where('password',$password)->first();
            if($user==null){
                throw new Exception("User Tidak ditemukan");
            }
            return response()->json(MasterFunctionsHelper::OKResponse(true,"Login Berhasil",$user),400);
        }catch(Exception $e){
            return response()->json(MasterFunctionsHelper::OKResponse(false,$e->getMessage(),null),400);
        }
    }
    public function getbyid($id){
        $user = User::find($id);
        return response()->json($user);
    }
}
