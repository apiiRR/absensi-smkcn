<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Jurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
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
        $datas = Data::where('user_id', Auth::user()->id)->get();
        $hadir = Data::where('user_id', Auth::user()->id)->where('attedance', 'hadir')->get()->count();
        $sakit = Data::where('user_id', Auth::user()->id)->where('attedance', 'sakit')->get()->count();
        $izin = Data::where('user_id', Auth::user()->id)->where('attedance', 'izin')->get()->count();
        $jurusans = Jurus::get();
        $user_jurus = Data::select('jurusan_id')->where('user_id', Auth::user()->id)->distinct()->first();
        // dd($user_jurus);
        return view('user.riwayat', [
            'datas' => $datas,
            'sakit' => $sakit,
            'hadir' => $hadir,
            'izin' => $izin,
            'jurusans' => $jurusans,
            'user_jurus' => $user_jurus,
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
        Data::destroy($id);

        toast('Data Berhasil Dihapus','success');
        return back();
    }
}
