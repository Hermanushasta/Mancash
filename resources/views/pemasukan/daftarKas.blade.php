<x-app-layout>
    @push('script')
        <script>
            $(function() {
                $('#myDataTable').DataTable({
                    ajax: '{{ url('pemasukan') }}',
                    serverSide: true,
                    processing: true,
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'jumlah',
                            name: 'jumlah'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            });
        </script>
    @endpush

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Kas') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 raw form-inline">
                    <table class=" table table-striped table-hover" id="myDataTable" name="myDataTable">
                        <thead>
                            <h1 class="font-extrabold alignz">Daftar Setoran Kas : </h1>
                            <br>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Jumlah</th>
                                <th>Tanggal Setor</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
