@extends('layouts.dashboard')

@section('title', 'API Documentation')

@section('content')

    {{-- Header Utama --}}
    <header class="mb-8 bg-white p-6 md:p-8 rounded-3xl border border-slate-200 shadow-sm flex items-center justify-between">
        {{-- Bagian Teks --}}
        <div>
            <h2 class="text-2xl font-extrabold text-slate-900">API Documentation</h2>
            <p class="text-slate-500 mt-1 text-sm">Jelajahi endpoint dan integrasi sistem.</p>
        </div>

        {{-- Tombol Menu (Hanya muncul di mobile) --}}
        <button @click="open = true"
            class="md:hidden p-3 text-slate-600 bg-slate-50 rounded-2xl border border-slate-200 hover:bg-slate-100 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </header>

    {{-- Container Utama --}}
    <div x-data="{ activeTab: 'mod-0', isSidebarOpen: false }">

        {{-- Tombol Mobile Sidebar --}}
        <button @click="isSidebarOpen = true"
            class="md:hidden fixed bottom-6 right-6 z-50 p-4 bg-blue-600 text-white rounded-full shadow-lg">
            <i class="fa-solid fa-code text-xl"></i>
        </button>

        <div class="flex flex-col md:flex-row gap-8">

            {{-- Sidebar Kategori --}}
            <div class="fixed inset-y-0 right-0 z-40 w-3/4 bg-white border-l shadow-xl p-6 transform transition-transform duration-300 md:relative md:transform-none md:w-1/4 md:h-fit md:border-none md:shadow-none md:bg-transparent md:p-0"
                :class="isSidebarOpen ? 'translate-x-0' : 'translate-x-full md:translate-x-0'">

                <button @click="isSidebarOpen = false" class="md:hidden mb-6 text-slate-400">
                    <i class="fa-solid fa-xmark text-2xl"></i>
                </button>

                <div class="sticky top-6">
                    <h6 class="text-[11px] uppercase tracking-widest text-slate-400 font-bold mb-6 px-2">Kategori Modul</h6>
                    <nav class="flex flex-col gap-1">
                        @foreach ($docs as $module => $items)
                            <button @click="activeTab = 'mod-{{ $loop->index }}'; isSidebarOpen = false"
                                :class="activeTab === 'mod-{{ $loop->index }}' ? 'bg-blue-600 text-white shadow-md' :
                                    'text-slate-600 hover:bg-slate-100'"
                                class="px-4 py-3 rounded-xl font-medium transition-all text-left flex items-center">
                                <i class="fa-solid fa-box-archive mr-3 opacity-70"></i> {{ $module }}
                            </button>
                        @endforeach
                    </nav>
                </div>
            </div>

            {{-- Overlay Mobile --}}
            <div x-show="isSidebarOpen" @click="isSidebarOpen = false" class="md:hidden fixed inset-0 bg-black/30 z-30">
            </div>

            {{-- Konten Utama --}}
            <div class="w-full md:w-3/4">

                {{-- Card Info API  --}}
                <div class="bg-slate-800 rounded-3xl p-6 mb-8 text-white shadow-lg">
                    <h4 class="text-lg font-bold mb-4 flex items-center">
                        <i class="fa-solid fa-server mr-2 text-blue-400"></i> Informasi Koneksi
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold mb-1">Base URL</p>
                            <code class="text-blue-300 font-mono text-sm">{{ $setting->base_url }}</code>
                        </div>
                        <div>
                            <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold mb-1">API Key</p>
                            <code class="text-slate-300 font-mono text-sm">{{ $setting->api_key }}</code>
                        </div>
                        <div class="md:col-span-2">
                            <p class="text-[10px] uppercase tracking-widest text-slate-400 font-bold mb-1">API Secret</p>
                            <code class="text-slate-300 font-mono text-sm">••••••••••••••••</code>
                        </div>
                    </div>
                </div>


                @foreach ($docs as $module => $items)
                    <div x-show="activeTab === 'mod-{{ $loop->index }}'"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0">

                        <div class="mb-8">
                            <h3 class="text-3xl font-extrabold text-slate-800">{{ $module }}</h3>
                            <p class="text-slate-500 mt-2">Daftar endpoint untuk modul {{ $module }}</p>
                        </div>

                        @foreach ($items as $api)
                            {{-- Kartu API --}}
                            <div class="bg-white border border-slate-200 rounded-3xl p-6 mb-8 shadow-sm hover:shadow-md transition-shadow duration-300"
                                x-data="{
                                    loading: false,
                                    result: null,
                                    showResult: false,
                                    async testApi() {
                                        this.loading = true;
                                        this.showResult = true;
                                        try {
                                            const response = await fetch('{{ route('admin.api.test') }}', {
                                                method: 'POST',
                                                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Content-Type': 'application/json' },
                                                body: JSON.stringify({ endpoint: '{{ $api->endpoint }}', doctype: '{{ $api->name }}' })
                                            });
                                            this.result = await response.json();
                                        } catch (err) { this.result = { error: 'Gagal menghubungi server' }; } finally { this.loading = false; }
                                    }
                                }">

                                <div class="flex flex-col gap-4 mb-6">
                                    <div class="flex justify-between items-center gap-4">
                                        <h5 class="font-bold text-slate-900 text-xl">{{ $api->name }}</h5>

                                        {{-- Tombol hanya muncul jika method BUKAN 'POST' --}}
                                        @if ($api->method !== 'POST')
                                            <button @click="testApi()" :disabled="loading"
                                                class="bg-blue-600 hover:bg-blue-700 disabled:bg-slate-400 text-white px-5 py-2 rounded-xl text-xs font-bold transition-all">
                                                <span x-show="!loading">Test API</span>
                                                <span x-show="loading">Memuat...</span>
                                            </button>
                                        @endif
                                    </div>
                                    <div class="flex items-center gap-3 w-full" x-data="{ copied: false }">
                                        <span
                                            class="px-3 py-2 rounded-xl text-[10px] font-bold uppercase {{ $api->method == 'GET' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-orange-700' }} border h-[42px] flex items-center justify-center">{{ $api->method }}</span>
                                        <div class="relative flex-grow">
                                            <code
                                                class="text-blue-400 bg-slate-900 px-4 py-3 rounded-xl text-sm font-mono block w-full border border-slate-800 shadow-inner pr-12">{{ $api->endpoint }}</code>
                                            <button
                                                @click="navigator.clipboard.writeText('{{ $api->endpoint }}'); copied = true; setTimeout(() => copied = false, 2000)"
                                                class="absolute right-3 top-3 text-slate-500 hover:text-white">
                                                <i class="fa-solid"
                                                    :class="copied ? 'fa-check text-green-400' : 'fa-copy'"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-slate-600 mb-6 text-sm leading-relaxed">{{ $api->description }}</p>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                                    {{-- Sisi Kiri: Contoh cURL --}}
                                    <div class="bg-slate-900 p-5 rounded-2xl border border-slate-800 relative min-h-[160px] flex flex-col justify-center"
                                        x-data="{ copied: false }">

                                        <p class="text-[10px] font-bold text-slate-500 uppercase mb-3">Contoh cURL</p>

                                        {{-- Tombol Copy --}}
                                        <button
                                            @click="navigator.clipboard.writeText('curl -X {{ $api->method }} &quot;{{ $setting->base_url }}{{ $api->endpoint }}&quot; -H &quot;Authorization: Bearer {{ $setting->api_key }}:****&quot; -H &quot;Content-Type: application/json&quot;'); copied = true; setTimeout(() => copied = false, 2000)"
                                            class="absolute top-4 right-4 text-slate-500 hover:text-white transition-colors">
                                            <i class="fa-solid" :class="copied ? 'fa-check text-green-400' : 'fa-copy'"></i>
                                        </button>

                                        <pre class="text-blue-300 text-[10px] font-mono whitespace-pre-wrap pr-6">
curl -X {{ $api->method }} "{{ $setting->base_url }}{{ $api->endpoint }}" \
     -H "Authorization: Bearer {{ $setting->api_key }}:****" \
     -H "Content-Type: application/json"</pre>
                                    </div>

                                    {{-- Sisi Kanan: Response Dummy --}}
                                    <div class="bg-slate-50 p-5 rounded-2xl border border-slate-100 min-h-[160px]">
                                        <p class="text-[10px] font-bold text-slate-400 uppercase mb-3">Response (Dummy)</p>
                                        <pre class="text-slate-600 text-[10px] font-mono overflow-x-auto">{{ json_encode($api->response, JSON_PRETTY_PRINT) }}</pre>
                                    </div>
                                </div>
                                <div x-show="showResult" class="mt-6 border-t pt-6" x-cloak>
                                    <p class="text-[10px] font-bold text-blue-600 uppercase mb-3">Live Output</p>
                                    <div
                                        class="bg-slate-950 p-5 rounded-2xl text-green-400 font-mono text-xs overflow-x-auto">
                                        <span x-show="loading">Sedang mengambil data...</span>
                                        <pre x-show="!loading" x-text="JSON.stringify(result, null, 2)"></pre>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
