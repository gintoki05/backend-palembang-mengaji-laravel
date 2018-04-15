<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use Yajra\Datatables\Datatables;

class JadwalController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jadwal');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwal = [
            'masjid' => $request['masjid'],
            'waktu' => $request['waktu'],
            'pengisi' => $request['pengisi'],
            'tema' => $request['tema'],
            'hari' => $request['hari'],
            'tanggal' => $request['tanggal'],
            'kategori' => $request['kategori']
        ];

        return Jadwal::create($jadwal);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = Jadwal::find($id);

        return $jadwal;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->masjid = $request['masjid'];
        $jadwal->waktu = $request['waktu'];
        $jadwal->pengisi = $request['pengisi'];
        $jadwal->tema = $request['tema'];
        $jadwal->hari = $request['hari'];
        $jadwal->tanggal = $request['tanggal'];
        $jadwal->kategori = $request['kategori'];

        $jadwal->update();

        return $jadwal;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwal::destroy($id);
    }

    public function jadwal()
    {
      $jadwal = Jadwal::all();

        return Datatables::of($jadwal)
           ->addColumn('action', function($jadwal){
               return  '<button onclick="editForm('. $jadwal->id .')" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</button> ' ;
                    //    '<a onclick="deleteData('. $jadwal->id .')" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
           ->make(true);
    }
}
