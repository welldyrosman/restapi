<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Dokter;
use stdClass;

class DokterController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();
        $dokter = Dokter::create($data);

        return response()->json($dokter);
    }
    public function index()
    {
        $dokter = Dokter::all();
        return response()->json($dokter);
    }
    public function getbyid($id){
        $dokter = Dokter::find($id);
        $schedule=array([
            "day"=>"Senin",
            "start"=>"07.00",
            "end"=>"10.00"
        ],[
            "day"=>"Selasa",
            "start"=>"07.00",
            "end"=>"10.00"
        ],[
            "day"=>"Kamis",
            "start"=>"07.00",
            "end"=>"10.00"
        ],[
            "day"=>"Jumat",
            "start"=>"07.00",
            "end"=>"10.00"
        ]);
        $dokter->praktek=$schedule;
        return response()->json($dokter);
    }
}
