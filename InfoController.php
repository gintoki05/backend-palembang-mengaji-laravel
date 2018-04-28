<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Info;
use Yajra\Datatables\Datatables;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('info');
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
        $input = $request->all();
        $input['foto'] = null;

        if ($request->hasFile('foto')){
            $input['foto'] = '/upload/foto/'.str_slug($input['judul'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/foto/'), $input['foto']);
        }

        Info::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Data Dibuat'
        ]);
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
        $info = Info::find($id);

        return $info;
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
       $input = $request->all();
        $info = Info::findOrFail($id);

        $input['foto'] = $info->foto;

        if ($request->hasFile('foto')){
            if (!$info->foto == NULL){
                unlink(public_path($info->foto));
            }
            $input['foto'] = '/upload/foto/'.str_slug($input['judul'], '-').'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('/upload/foto/'), $input['foto']);
        }

        $info->update($input);

        return response()->json([
            'success' => true,
            'message' => 'Info Updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Info::destroy($id);
    }

    public function info()
    {
      $info = Info::all();

        return Datatables::of($info)
            ->addColumn('show_foto', function($info){
                if ($info->foto == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url($info->foto) .'" alt="">';
            })
           ->addColumn('action', function($info){
               return  '<button onclick="editForm('. $info->id .')" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-edit"></i> Edit</button> ' ;
                    //    '<a onclick="deleteData('. $info->id .')" class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
            })
           ->rawColumns(['show_foto', 'action'])->make(true);
    }
}
