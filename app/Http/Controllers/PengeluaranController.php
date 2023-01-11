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
                    function ($outcome) {
                        $html = '<a class="bg-green-700 p-2 text-white rounded-md m-4" href="' . ('pengeluaranView') . "/" . $outcome->id . '">Edit </a>';
                        $html .= '<a class="bg-red-600 p-2 text-white rounded-md m-4" href="' . ('/pengeluaranDelete') . "/" . $outcome->id . '">Hapus</a>';
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
                'jumlah' => ['required', 'integer'],
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
        return view('pengeluaran.editPengeluaran', compact('pengeluaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $pengeluaran)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'nama_pengeluaran' => ['required', 'string', 'max:200'],
                'jumlah' => ['required', 'integer'],
            ]
        );
        Pengeluaran::find($id)->update($validated);
        return redirect('/pengeluaran')->with('success', 'Data Berhasil diupdate');
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
