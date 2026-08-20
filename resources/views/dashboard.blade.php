<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Sistem Alumni') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold text-gray-800">
                        Selamat Datang, {{ Auth::user()->name }}!
                    </h3>
                    <p class="text-gray-600 mt-1">
                        Anda telah masuk ke Sistem Pendataan Alumni SMK. Gunakan menu di bawah untuk mengelola data alumni.
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="p-3 bg-blue-100 text-blue-600 rounded-lg">
                            </div>
                            <h4 class="text-lg font-bold text-gray-800">Kelola Data Alumni</h4>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Lihat tabel seluruh data alumni, lakukan pencarian, edit data, atau hapus data alumni.
                        </p>
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('alumni.index') }}" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                            Lihat Semua Data &rarr;
                        </a>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="p-3 bg-green-100 text-green-600 rounded-lg">
                            </div>
                            <h4 class="text-lg font-bold text-gray-800">Tambah Alumni Baru</h4>
                        </div>
                        <p class="text-gray-600 text-sm">
                            Inputkan data siswa yang baru lulus ke dalam sistem pendataan alumni SMK.
                        </p>
                    </div>
                    <div class="mt-5">
                        <a href="{{ route('alumni.create') }}"  class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                            + Tambah Alumni
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>