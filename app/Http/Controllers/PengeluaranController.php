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
            $outcome = DB::table('pengeluarans')
                ->select(
                    'id as id',
                    'nama_pengeluaran as nama_pengeluaran',
                    'jumlah as jumlah',
                    'created_at as created_at',
                    'updated_at as updated_at'
                )
                ->orderBy('created_at', 'asc')
                ->get();

            return DataTables::of($outcome)
                ->addColumn(
                    'action',
                    function ($members) {
                        $html = '<a href="' . ('anggotaView') . "/" . $members->id . '">Edit </a>';
                        $html .= '<a href="' . ('/pengeluaranDelete') . "/" . $members->id . '"> Hapus</a>';
                        return $html;
                    }
                )
                ->rawColumns(['action'])
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
                'jumlah' => ['required', 'string', 'max:11'],
            ]
        );
        Pengeluaran::create($validated);
        return redirect('pengeluaran')->with('success', 'Data Berhasil dimasukkan');
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
    public function destroy(Pengeluaran $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
