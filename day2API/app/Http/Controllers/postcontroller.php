<?php

namespace App\Http\Controllers;

use App\Models\test;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class postcontroller extends Controller
{
    use AuthorizesRequests,ValidatesRequests;
    public function apipush(Request $request)
    {
        $data = DB::select ('SELECT * FROM tests');
        return response()->json(['success'=>true,'data'=>$data]);
    }
    public function apipop(Request $request)
    {
        Log::info($request->all());
        $validatedData=$request->validate([
            'name'=>'required|string|max:255',
            'address'=> 'required|sting|max:255',
            'number'=> 'required|string|max:20',
        ]);
        $test = test::create([
            'name'=> $validatedData['name'],
            'address'=> $validatedData['address'],
            'number'=> $validatedData['number'],
        ]);
    }
}
