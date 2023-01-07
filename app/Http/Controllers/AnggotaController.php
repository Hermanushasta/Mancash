<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;


class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $members = DB::table('anggotas')
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
                    'nim as nim',
                    'alamat as alamat',
                    'no_telepon as no_telepon'
                )
                ->orderBy('created_at', 'asc')
                ->get();

            return DataTables::of($members)
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

        return view('anggota.daftarAnggota');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anggota.tambahAnggota');
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
                'nama' => ['required', 'string', 'max:200'],
                'nim' => ['required', 'string', 'max:10'],
                'alamat' => ['required', 'string', 'max:100'],
                'no_telepon' => ['required', 'string', 'max:13']
            ]
        );
        Anggota::create($validated);
        return redirect('anggota')->withSuccess('Task Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        return view('anggota.daftarAnggota', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota)
    {
        //
    }
}
