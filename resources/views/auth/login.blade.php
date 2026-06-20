<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 font-sans antialiased">

    <div class="min-h-screen flex flex-col md:flex-row">
        <div class="hidden md:flex md:w-1/2 bg-blue-600 items-center justify-center p-12 relative overflow-hidden">
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10">
            </div>
            <div class="relative z-10 text-white max-w-lg">
                <h1 class="text-5xl font-bold mb-6">Kelola Dokumentasi API Anda.</h1>
                <p class="text-blue-100 text-lg">Akses sistem manajemen API perusahaan dengan satu pintu masuk yang aman
                    dan efisien.</p>
            </div>
        </div>

        <div class="w-full md:w-1/2 flex items-center justify-center p-8">
            <div class="w-full max-w-sm">
                <div class="mb-10">
                    <h2 class="text-3xl font-bold text-slate-900">Sign In</h2>
                    <p class="text-slate-500 mt-2">Selamat datang kembali!</p>
                </div>

                <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Email Address</label>
                        <input type="email" name="email" required
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all">
                    </div>

                    <div x-data="{ show: false }" class="relative">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Password</label>

                        <input :type="show ? 'text' : 'password'" name="password" required
                            class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 outline-none transition-all pr-12">

                        <button type="button" @click="show = !show"
                            class="absolute right-3 top-[38px] text-slate-400 hover:text-blue-600 transition-colors">
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>

                    <button type="submit"
                        class="w-full bg-slate-900 text-white py-3.5 rounded-lg font-semibold hover:bg-slate-800 transition-all duration-300 shadow-md">
                        Sign In
                    </button>
                </form>

                <p class="text-center text-slate-400 text-sm mt-8">
                    &copy; 2026 Management System
                </p>
            </div>
        </div>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
