<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Anggota') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ url('pengeluaranUpdate', $pengeluaran->id) }}">
                        @csrf
                        <h1 class="font-extrabold ">Edit Pengeluaran : </h1>
                        <br>
                        <div>
                            <x-input-label for="id" :value="__('Id Anggota')" />
                            <x-text-input id="id" class="block mt-1 w-2/5" type="text" name="id"
                                value="{{ $pengeluaran->id }}" readonly />
                        </div>
                        <div>
                            <x-input-label for="nama_pengeluaran" :value="__('Nama Pengeluaran')" />
                            <x-text-input id="nama_pengeluaran" class="block mt-1 w-2/5" type="text"
                                name="nama_pengeluaran" value="{{ $pengeluaran->nama_pengeluaran }}" required
                                autofocus />
                        </div>
                        <div>
                            <x-input-label for="jumlah" :value="__('Jumlah')" />
                            <x-text-input id="jumlah" class="block mt-1 w-2/5" type="text" name="jumlah"
                                value="{{ $pengeluaran->jumlah }}" required autofocus />
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
    @include('sweetalert::alert')



</x-app-layout>
