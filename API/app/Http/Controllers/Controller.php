<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Test;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function insertApi(Request $request)
    {
        Log::info($request->all());
        
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'number' => 'required|string|max:20',
        ]);

        // Create a new Test record
        $test = Test::create([
            'name' => $validatedData['name'],
            'address' => $validatedData['address'],
            'number' => $validatedData['number'],
        ]);

        return response()->json(['success' => true, 'data' => $test], 201);
    }

    public function showData(Request $request){
        $data = Test::all();
        $test = DB::select('SELECT * FROM tests');
        //$test1 = DB::select('SELECT * FROM hamro');
    return response()->json(['success'=> true,'data'=> $test /* ,$test1 */],);
    }
}
