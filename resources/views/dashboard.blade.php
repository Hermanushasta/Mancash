<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mancash') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
            <div class="p-6 text-gray-900 bold">
                <div>Selamat datang {{ Auth::user()->name }} </div>
                <br>
                <div class="flex justify-between space-x-4">
                    <div class="bg-slate-50 shadow-md border-l-2 border-green-500 w-1/3 py-8 px-4 rounded-md mb-6">
                        Jumlah Pemasukan Kas
                    </div>
                    <div class="bg-slate-50 shadow-md border-l-2 border-green-500 w-1/3 py-8 px-4 rounded-md mb-6">
                        Jumlah Pengeluaran Kas
                    </div>
                    <div class="bg-slate-50 shadow-md border-l-2 border-green-500 w-1/3 py-8 px-4 rounded-md mb-6">
                        Jumlah Anggota
                    </div>
                    <div class="bg-slate-50 shadow-md border-l-2 border-green-500 w-1/3 py-8 px-4 rounded-md mb-6">
                        Jumlah Pengeluaran
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
