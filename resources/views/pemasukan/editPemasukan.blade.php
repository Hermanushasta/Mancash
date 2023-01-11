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
                    <form method="POST" action="{{ url('pemasukanUpdate', $pemasukan->id) }}">
                        @csrf
                        <h1 class="font-extrabold ">Edit Pemasukan : </h1>
                        <br>
                        <div>
                            <x-input-label for="id" :value="__('Id Pemasukan')" />
                            <x-text-input id="id" class="block mt-1 w-2/3" type="text" name="id"
                                value="{{ $pemasukan->id }}" readonly />
                        </div>
                        <div>
                            <x-input-label for="nama" :value="__('Nama Anggota')" />
                            <select name="nama" id="nama" class="form-select rounded-md w-2/3"
                                value="{{ old('nama') }}" required>
                                <option selected value="{{ old('nama') }}">{{ old('nama') }}</option>
                                @foreach ($users as $user)
                                    @if ($user->id == old('nama'))
                                        <option value="{{ $user->nama }}" selected>{{ $user->nama }}</option>
                                    @else
                                        <option value="{{ $user->nama }}" selected>{{ $user->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="jumlah" :value="__('Jumlah Setor')" />
                            <x-text-input id="jumlah" class="block mt-1 w-2/3" type="text" name="jumlah"
                                value="{{ $pemasukan->jumlah }}" required autofocus />
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
