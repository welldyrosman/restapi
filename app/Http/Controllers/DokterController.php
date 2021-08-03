<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Dokter;

class DokterController extends Controller
{
    public function create(Request $request)
    {
        $data = $request->all();
        $book = Dokter::create($data);

        return response()->json($book);
    }
    public function index()
    {
        $book = Dokter::all();
        return response()->json($book);
    }
}
