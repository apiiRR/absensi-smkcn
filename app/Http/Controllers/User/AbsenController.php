<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Jurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
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
        $jurusans = Jurus::get();
        return view('user.absen', [
            'jurusans' => $jurusans,
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
        // dd($request->input());
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y-m-d");
        $time_in = date("H:i");
        $day = date('l');
        $user = Auth::user()->id;

        switch ($request->input('simpan')) {
            case 'hadir':
                $data = Data::create([
                    'date' => $date,
                    'day' => $day,
                    'time_in' => $time_in,
                    'activity' => $request['activity'],
                    'user_id' => $user,
                    'jurusan_id' => $request['jurusan'],
                    'attedance' => 'hadir',
                ]);

                return back();

                break;
            case 'izin':
                $data = Data::create([
                    'date' => $date,
                    'day' => $day,
                    'time_in' => $time_in,
                    'user_id' => $user,
                    'jurusan_id' => $request['jurusan'],
                    'attedance' => 'izin',
                ]);

                return back();

                break;
            default:
                $data = Data::create([
                    'date' => $date,
                    'day' => $day,
                    'time_in' => $time_in,
                    'user_id' => $user,
                    'jurusan_id' => $request['jurusan'],
                    'attedance' => 'sakit',
                ]);

                return back();

                break;
        }
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
        //
    }
}