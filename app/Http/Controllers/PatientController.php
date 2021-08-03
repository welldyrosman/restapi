<?php

namespace App\Http\Controllers;

use App\Helpers\MasterFunctionsHelper;
use Illuminate\Http\Request;
use App\Models\Patient;
use Exception;

class PatientController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'ktpno' => 'required',
            'fullname' => 'required',
            'birddate'=>'required',
            'gender'=>'required',
            'phoneno'=>'required',
            'email'=>'required',
            'religion'=>'required',
            'education'=>'required',
            'jobdesc'=>'required',
            'partnername'=>'required',
            'partnerphone'=>'required',
            'address'=>'required',
            'city'=>'required',
            'maritalstatus'=>'required',
            'password'=>'required',
            'passwordver'=>'required',
        ]);
        try{
            $phoneno=$request->input("phoneno");
            $partnerphone=$request->input("partnerphone");
            $pass=$request->input("password");
            $pass2=$request->input("passwordver");
            if($phoneno==$partnerphone){
                throw new Exception("Nomor Telpon Kerabat Dekat tidak boleh sama");
            }
            if($pass!=$pass2){
                throw new Exception("Kombinasi Password Salah");
            }
            $patients = Patient::create($data);
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
        return response()->json(MasterFunctionsHelper::OKResponse(true,"Data Berhasil Di Simpan",$patients),200);
    }
    public function test(){
        return MasterFunctionsHelper::sayhello();
    }
    public function index()
    {
        $patients = Patient::all();
        return response()->json(MasterFunctionsHelper::OKResponse(true,"Query Successfull",$patients),200);
    }
    public function getbyid($id){
        $patients = Patient::find($id);
        return response()->json($patients);
    }
    public function update(Request $request, $id){
        $patients=Patient::find($id);
        if(!$patients){
            throw new Exception("Pasien tidak ditemukan");
        }
        $this->validate($request,[
            'ktpno' => 'required',
            'fullname' => 'required',
            'birddate'=>'required',
            'gender'=>'required',
            'phoneno'=>'required',
            'email'=>'required',
            'religion'=>'required',
            'education'=>'required',
            'jobdesc'=>'required',
            'partnername'=>'required',
            'partnerphone'=>'required',
            'address'=>'required',
            'city'=>'required',
            'maritalstatus'=>'required',
        ]);
        $data = $request->all();
        $patients->fill($data);
        $patients->save();
        return response()->json(MasterFunctionsHelper::OKResponse(true,"Update Successfull",$patients),200);
    }
    public function destroy($id){
        $patients = Patient::find($id);
        if (!$patients) {
            throw new Exception("Pasien tidak ditemukan");
        }
        $patients->delete();
        return response()->json(MasterFunctionsHelper::OKResponse(true,"Delete Successfull",$patients),200);
    }
}
