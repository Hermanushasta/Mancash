<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ url('pemasukanStore') }}">
                        @csrf
                        <h1 class="font-extrabold ">Setor Kas : </h1>
                        <br>
                        <div>
                            <x-input-label for="nama" :value="__('Nama Anggota')" />
                            <select name="nama" id="nama" class="form-select rounded-md" required>
                                <option value="-1">Nama Anggota</option>
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
                        <div class="mt-4">
                            <x-input-label for="jumlah" :value="__('Jumlah Uang')" />
                            <x-text-input id="jumlah" class="block mt-1 w-2/5" type="text" name="jumlah"
                                :value="old('jumlah')" required autofocus />
                            <x-input-error :messages="$errors->get('jumlah')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="tanggal_setor" :value="__('Tanggal Setor')" />
                            <x-text-input id="tanggal_setor" class="block mt-1 w-2/5" type="date"
                                name="tanggal_setor" :value="old('tanggal_setor')" required autofocus />
                            <x-input-error :messages="$errors->get('tanggal_setor')" class="mt-2" />
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
