<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mancash') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-white-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> --}}
            <div class="p-6 text-gray-900 bold font-extrabold ">
                <div class="text-xl">Selamat datang {{ Auth::user()->name }} </div>
                <br>
                <br>
                <div class="flex justify-start space-x-4 text-left">
                    <div
                        class="bg-slate-50 shadow-md border-l-4 border-green-500 w-1/3 py-8 px-4 rounded-md mb-6 shadow-xl">
                        Jumlah Pemasukan Kas :
                        <br>
                        Rp. {{ $pemasukans }} rupiah

                    </div>
                    <div
                        class="bg-slate-50 shadow-md border-l-4 border-blue-500 w-1/3 py-8 px-4 rounded-md mb-6 shadow-xl">
                        Jumlah Pengeluaran Kas :
                        <br>
                        Rp. {{ $pengeluarans }} rupiah
                    </div>
                    <div
                        class="bg-slate-50 shadow-md border-l-4 border-yellow-500 w-1/3 py-8 px-4 rounded-md mb-6 shadow-xl">
                        Jumlah Anggota :
                        <br>
                        {{ $jumlahAnggota }} orang
                    </div>
                    <div
                        class="bg-slate-50 shadow-md border-l-4 border-red-500 w-1/3 py-8 px-4 rounded-md mb-6 shadow-xl    ">
                        Jumlah Pengeluaran :
                        <br>
                        {{ $jumlahPengeluaran }} belanja
                    </div>
                </div>
            </div>
        </div>

    </div>

</x-app-layout>
