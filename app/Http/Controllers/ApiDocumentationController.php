<?php

namespace App\Http\Controllers;

use App\Models\ApiDocumentation;
use App\Models\Setting;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiDocumentationController extends Controller
{
    public function index(): View
    {
        // Mengambil semua data dan mengelompokkannya berdasarkan modul
        $docs = ApiDocumentation::all()->groupBy('module');
        $setting = Setting::where('is_active', true)->first();

        return view('api_docs.index', compact('docs', 'setting'));
    }

    public function testEndpoint(Request $request)
    {
        $endpoint = $request->input('endpoint');

        $frappe = Setting::where(
            'is_active',
            true
        )->first();

        if(!$frappe){
            return response()->json([
                'message'=>'Frappe config belum ada'
            ],404);
        }

        $response = Http::withHeaders([
            'Authorization' =>
            'token '
            .$frappe->api_key
            .':'
            .$frappe->api_secret,
            'Accept'=>'application/json'

        ])
        ->get(
            rtrim($frappe->base_url,'/')
            .'/'
            .ltrim($endpoint,'/')
        );
        return response()->json(
            $response->json(),
            $response->status()
        );

    }
}