<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalMateri' => 0,
            'totalKuis' => 0,
            'totalUser' => 0,
            'totalPenyuluh' => 0,
            'recentMateri' => []
        ]);
    }
}