<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Anggota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $incomes = DB::table('pemasukans')
                ->select(
                    'id as id',
                    'nama as nama',
                    'jumlah as jumlah',
                    'created_at as created_at',
                    'updated_at as updated_at'
                )
                ->orderBy('created_at', 'asc')
                ->get();

            return DataTables::of($incomes)
                ->addColumn(
                    'action',
                    function ($incomes) {
                        $html = '<a class="bg-green-700 p-2 text-white rounded-md m-4" href="' . ('pemasukanView') . "/" . $incomes->id . '">Edit </a>';
                        $html .= '<a class="bg-red-600 p-2 text-white rounded-md m-4" href="' . ('/pemasukanDelete') . "/" . $incomes->id . '">Hapus</a>';
                        return $html;
                    }
                )
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pemasukan.daftarKas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Anggota::get();
        $incomes = Pemasukan::get();
        return view('pemasukan.setorKas', compact('incomes', 'users'));
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

                'nama' => ['required'],
                'jumlah' => ['required', 'integer'],
            ]
        );
        Pemasukan::create($validated);
        return redirect('pemasukan')->with('success', 'Data berhasil dimasukkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasukan $pemasukan)
    {
        $users = Anggota::get();
        return view('pemasukan.editPemasukan', compact('pemasukan', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'nama' => ['required'],
                'jumlah' => ['required', 'integer'],
            ]
        );
        Pemasukan::find($id)->update($validated);
        return redirect('/pemasukan')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasukan $id)
    {
        $id->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
