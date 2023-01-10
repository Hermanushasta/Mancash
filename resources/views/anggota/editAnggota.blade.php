<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Anggota') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ url('anggotaUpdate', $members->id) }}">
                        @csrf
                        <div>
                            <x-input-label for="idKoleksi" :value="__('ID Koleksi')" />
                            <x-text-input id="id" class="form-control" type="text" name="id"
                                value="{{ $collection->id }}" readonly />
                        </div>
                        <div>
                            <x-input-label for="namaKoleksi" :value="__('Nama Koleksi')" />
                            <x-text-input id="namaKoleksi" class="block mt-1 w-full" type="text" name="namaKoleksi"
                                value="{{ $collection->namaKoleksi }}" readonly />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="jenisKoleksi" :value="__('Jenis Koleksi')" />
                            <select id="jenisKoleksi" name="jenisKoleksi"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected>Pilih Jenis Koleksi</option>
                                <option value="1" @if (old('jenisKoleksi', $collection->jenis) == 1) selected @endif>Buku</option>
                                <option value="2" @if (old('jenisKoleksi', $collection->jenis) == 2) selected @endif>Majalah
                                </option>
                                <option value="3" @if (old('jenisKoleksi', $collection->jenis) == 3) selected @endif>Cakram Digital
                                </option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-input-label for="jumlahKoleksi" :value="__('Jumlah Koleksi')" />
                            <x-text-input id="jumlahKoleksi" class="block mt-1 w-full" type="text"
                                name="jumlahKoleksi" value="{{ $collection->jumlahKoleksi }}" required autofocus />
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
