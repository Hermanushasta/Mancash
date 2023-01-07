<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Pengeluaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ url('pengeluaranStore') }}">
                        @csrf
                        <h1 class="font-extrabold ">Catat Pengeluaran : </h1>
                        <br>
                        <div class="mt-4">
                            <x-input-label for="nim" :value="__('Nama Pengeluaran')" />
                            <x-text-input id="nim" class="block mt-1 w-2/5" type="text" name="nim"
                                :value="old('nim')" required autofocus />
                            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="jumlah" :value="__('Jumlah Pengeluaran')" />
                            <x-text-input id="jumlah" class="block mt-1 w-2/5" type="text" name="jumlah"
                                :value="old('jumlah')" required autofocus />
                            <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="tanggal_keluar" :value="__('Tanggal Keluar')" />
                            <x-text-input id="tanggal_keluar" class="block mt-1 w-2/5" type="date"
                                name="tanggal_keluar" :value="old('tanggal_keluar')" required autofocus />
                            <x-input-error :messages="$errors->get('tanggal_keluar')" class="mt-2" />
                        </div>
                        <button type="submit", name="ButtonSubmit", id="ButtonSubmit"
                            class="btn btn-outline-primary mt-4">Submit</button>
                        <button type="reset", name="ButtonReset", id="ButtonReset"
                            class="btn btn-outline-danger mt-4">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
