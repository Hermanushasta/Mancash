<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $outcome = DB::table('pengeluaran')
                ->select(
                    'id as id',
                    'nama_pengeluaran as nama_pengeluaran',
                    // DB::raw('
                    //     (CASE
                    //     WHEN jenisKoleksi="1" THEN "Buku"
                    //     WHEN jenisKoleksi="2" THEN "Majalah"
                    //     WHEN jenisKoleksi="3" THEN "Cakram Digital"
                    //     END) AS jenis
                    // '),
                    'jumlah as jumlah',
                    'tanggal_keluar as tanggal_keluar'
                )
                ->orderBy('tanggal_keluar', 'asc')
                ->get();

            return DataTables::of($outcome)
                // ->addColumn(
                //     'action',
                //     function ($members) {
                //         $html =
                //             '<a href="' . ('anggotaView') . "/" . $members->id . '">Edit</a>';
                //         return $html;
                //     }
                // )
                ->make(true);
        }

        return view('pengeluaran.daftarPengeluaran');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengeluaran.catatPengeluaran');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'nama_pengeluaran' => ['required', 'string', 'max:200'],
                'jumlah' => ['required', 'string', 'max:12'],
                'tanggal_keluar' => ['required']
            ]
        );
        Pengeluaran::create($validated);
        return redirect('pengeluaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        return view('pengeluaran.daftarPengeluaran', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        //
    }
}
