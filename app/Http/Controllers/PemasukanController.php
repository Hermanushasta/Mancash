<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Anggota;
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
                    // DB::raw('
                    //     (CASE
                    //     WHEN jenisKoleksi="1" THEN "Buku"
                    //     WHEN jenisKoleksi="2" THEN "Majalah"
                    //     WHEN jenisKoleksi="3" THEN "Cakram Digital"
                    //     END) AS jenis
                    // '),
                    'jumlah as jumlah',
                    'created_at as created_at'
                )
                ->orderBy('created_at', 'asc')
                ->get();

            return DataTables::of($incomes)
                ->addColumn(
                    'action',
                    function ($members) {
                        $html =
                            '<a href="' . ('anggotaView') . "/" . $members->id . '">Edit</a>';
                        '<a href="' . ('pemasukanDelete') . "/" . $members->id . '">Edit</a>';
                        return $html;
                    }
                )
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
                'jumlah' => ['required', 'string', 'max:12'],
            ]
        );
        Pemasukan::create($validated);
        return redirect('pemasukan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasukan $pemasukan)
    {
        return view('pemasukan.daftarKas', compact('pemasukan'));
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
    public function update(Request $request, Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasukan  $pemasukan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasukan $pemasukan)
    {
        //
    }
}
