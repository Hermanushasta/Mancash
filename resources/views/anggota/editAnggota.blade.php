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
                    <form method="POST" action="{{ url('anggotaUpdate', $anggota->id) }}">
                        @csrf
                        <h1 class="font-extrabold ">Edit Anggota : </h1>
                        <br>
                        <div>
                            <x-input-label for="id" :value="__('Id Anggota')" />
                            <x-text-input id="id" class="block mt-1 w-2/5" type="text" name="id"
                                value="{{ $anggota->id }}" readonly />
                        </div>
                        <div>
                            <x-input-label for="nama" :value="__('Nama Anggota')" />
                            <x-text-input id="nama" class="block mt-1 w-2/5" type="text" name="nama"
                                value="{{ $anggota->nama }}" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="nim" :value="__('NIM')" />
                            <x-text-input id="nim" class="block mt-1 w-2/5" type="text" name="nim"
                                value="{{ $anggota->nim }}" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="alamat" :value="__('Alamat')" />
                            <x-text-input id="alamat" class="block mt-1 w-2/5" type="text" name="alamat"
                                value="{{ $anggota->alamat }}" required autofocus />
                        </div>
                        <div>
                            <x-input-label for="no_telepon" :value="__('Nomor Telepon')" />
                            <x-text-input id="no_telepon" class="block mt-1 w-2/5" type="text" name="no_telepon"
                                value="{{ $anggota->no_telepon }}" required autofocus />
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
