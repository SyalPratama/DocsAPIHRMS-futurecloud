@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

    {{-- Header Dashboard --}}
    <header class="bg-white p-6 md:p-8 rounded-3xl border border-slate-200 shadow-sm flex items-center justify-between mb-8">
        <div>
            <h2 class="text-2xl font-extrabold text-slate-900">Dashboard</h2>
            <p class="text-slate-500 mt-1 text-sm">Selamat datang kembali, pantau aktivitas sistem Anda di sini.</p>
        </div>
        <button @click="open = true"
            class="md:hidden p-3 text-slate-600 bg-slate-50 rounded-2xl border border-slate-200 hover:bg-slate-100 transition">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </header>

    {{-- Stat Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        @php

            $stats = [
                [
                    'label' => 'Total Modul',
                    'value' => $docs->count(),
                    'icon' => 'fa-box-archive',
                    'color' => 'text-blue-600',
                ],
                [
                    'label' => 'Total API',
                    'value' => $totalApi,
                    'icon' => 'fa-code',
                    'color' => 'text-emerald-600',
                ],
                [
                    'label' => 'Status Sistem',
                    'value' => 'Active',
                    'icon' => 'fa-circle-check',
                    'color' => 'text-orange-600',
                ],
            ];
        @endphp

        @foreach ($stats as $stat)
            <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center gap-4">
                    <div class="p-4 bg-slate-50 rounded-2xl {{ $stat['color'] }}">
                        <i class="fa-solid {{ $stat['icon'] }} text-xl"></i>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 font-bold uppercase tracking-wider">{{ $stat['label'] }}</p>
                        <h4 class="text-2xl font-extrabold text-slate-900">{{ $stat['value'] }}</h4>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Recent Activity / Main Content Area --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        {{-- Card 1 --}}
        <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm">
            <h3 class="font-bold text-slate-900 mb-4">Aktivitas Terakhir</h3>
            <div class="space-y-4">
                {{-- Contoh item --}}
                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-2xl">
                    <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                    <span class="text-sm text-slate-600">Update dokumentasi modul Auth</span>
                    <span class="ml-auto text-xs text-slate-400">2 jam lalu</span>
                </div>
            </div>
        </div>

        {{-- Card 2 --}}
        <div class="bg-slate-800 p-6 rounded-3xl text-white shadow-lg">
            <h3 class="font-bold mb-4">Quick Action</h3>
            <p class="text-slate-400 text-sm mb-6">Butuh bantuan integrasi? Silakan buka pusat bantuan atau hubungi tim
                teknis.</p>
            <a href="#"
                class="inline-block px-5 py-3 bg-blue-600 hover:bg-blue-700 rounded-xl text-sm font-bold transition">
                Hubungi Support
            </a>
        </div>
    </div>

@endsection
