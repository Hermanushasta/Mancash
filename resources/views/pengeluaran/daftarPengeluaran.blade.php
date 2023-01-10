<x-app-layout>
    @push('script')
        <script>
            $(function() {
                $('#myDatatable').DataTable({
                    ajax: '{{ url('pengeluaran') }}',
                    serverSide: true,
                    processing: true,
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'nama_pengeluaran',
                            name: 'nama_pengeluaran'
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
                            data: 'updated_at',
                            name: 'updated_at'
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
            {{ __('Daftar Pengeluaran') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 raw form-inline">
                    <table class=" table table-striped table-hover" id="myDatatable" name="myDatatable">
                        <thead>
                            <h1 class="font-extrabold alignz">Daftar Pengeluaran Kas : </h1>
                            <br>
                            <tr>
                                <th>No</th>
                                <th>Nama Pengeluaran</th>
                                <th>Jumlah</th>
                                <th>Tanggal Keluar</th>
                                <th>Tanggal Update</th>
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
