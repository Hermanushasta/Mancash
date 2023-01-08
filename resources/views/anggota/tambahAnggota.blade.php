<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Anggota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ url('anggotaStore') }}">
                        @csrf
                        <h1 class="font-extrabold ">Tambah Anggota : </h1>
                        <br>
                        <div>
                            <x-input-label for="nama" :value="__('Nama Anggota')" />
                            <x-text-input id="nama" class="block mt-1 w-2/5" type="text" name="nama"
                                :value="old('nama')" required autofocus />
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="nim" :value="__('NIM')" />
                            <x-text-input id="nim" class="block mt-1 w-2/5" type="text" name="nim"
                                :value="old('nim')" required autofocus />
                            <x-input-error :messages="$errors->get('nim')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="alamat" :value="__('Alamat')" />
                            <x-text-input id="alamat" class="block mt-1 w-2/5" type="text" name="alamat"
                                :value="old('alamat')" required autofocus />
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="no_telepon" :value="__('No Telepon')" />
                            <x-text-input id="no_telepon" class="block mt-1 w-2/5" type="text" name="no_telepon"
                                :value="old('no_telepon')" required autofocus />
                            <x-input-error :messages="$errors->get('no_telepon')" class="mt-2" />
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
    @include('sweetalert::alert')



</x-app-layout>
