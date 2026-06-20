<?php

namespace App\Http\Controllers;

use App\Models\ApiDocumentation;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard utama.
     */
    public function index(): View
    {
        $allApis = ApiDocumentation::all();
        $docs = $allApis->groupBy('module');
        $totalApi = $allApis->count(); 

        return view('admin.dashboard', compact('docs', 'totalApi'));
    }
}