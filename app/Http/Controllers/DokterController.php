<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Dokter;

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
    public function getyid($id){
        $dokter = Dokter::find($id);
        return response()->json($dokter);
    }
}
