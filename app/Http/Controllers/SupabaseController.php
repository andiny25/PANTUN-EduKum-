<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class SupabaseController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'apikey' => env('SUPABASE_KEY'),
            'Authorization' => 'Bearer ' . env('SUPABASE_KEY'),
        ])->get(
            env('SUPABASE_URL') . '/rest/v1/users?select=*'
        );

        return response()->json($response->json());
    }
}