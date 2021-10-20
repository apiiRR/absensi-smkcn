<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Kelas;
use Illuminate\Http\Request;

class DataKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $datas = Kelas::get();
        return view('admin.data_kelas', [
            'datas' => $datas,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = Data::leftJoin('users', 'users.id', '=', 'data.user_id')->select('data.*', 'users.name')->where('users.kelas_id', $id)->get();
        $nama = Kelas::find($id);
        return view('admin.list', [
            'datas' => $datas,
            'nama' => $nama,
            'id' => $id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function filter($from, $end, $id)
    {
        $datas = Data::leftJoin('users', 'users.id', '=', 'data.user_id')->select('data.*', 'users.name')->where('users.kelas_id', $id)->whereBetween('date', [$from, $end])->get();
        $nama = Kelas::find($id);
        return view('admin.list', [
            'datas' => $datas,
            'nama' => $nama,
            'id' => $id,
        ]);
    }
}