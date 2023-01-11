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
                            <x-input-label for="nama_pengeluaran" :value="__('Nama Pengeluaran')" />
                            <x-text-input id="nama_pengeluaran" class="block mt-1 w-2/3" type="text"
                                name="nama_pengeluaran" :value="old('nama_pengeluaran')" required autofocus />
                            <x-input-error :messages="$errors->get('nama_pengeluaran')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="jumlah" :value="__('Jumlah Pengeluaran')" />
                            <x-text-input id="jumlah" class="block mt-1 w-2/3" type="text" name="jumlah"
                                :value="old('jumlah')" required autofocus />
                            <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
                        </div>
                        <div class="mt-4 space-x-1">
                            <x-primary-button>
                                {{ __('Submit') }}
                            </x-primary-button>
                            <button type="reset", name="ButtonReset", id="ButtonReset"
                                class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
