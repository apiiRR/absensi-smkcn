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
        date_default_timezone_set('Asia/Jakarta');
        $tanggal = date("Y-m-d");
        $data = Data::where('user_id', Auth::user()->id)->where('date', $tanggal)->first();
        $jurusans = Jurus::get();
        // dd($data);
        return view('user.absen', [
            'jurusans' => $jurusans,
            'data' => $data,
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
        // dd($request->izin);
        date_default_timezone_set('Asia/Jakarta');
        $date = date("Y-m-d");
        $time_in = date("H:i");
        $day = date('l');
        $user = Auth::user()->id;

        switch ($request->input('simpan')) {
            case 'masuk':

                $request->validate([
                'jurusan' => 'required',
                ]);

                $data = Data::create([
                    'date' => $date,
                    'day' => $day,
                    'time_in' => $time_in,
                    'user_id' => $user,
                    'jurusan_id' => $request['jurusan'],
                    'attedance' => 'hadir',
                ]);
                
                toast('Data Berhasil Disimpan','success');
                return back();

                break;
            case 'izin':

                $request->validate([
                'izin' => 'required|max:2048',
                'jurusan' => 'required',
                ]);

                if (!empty($request->izin)) {
                    // dd($request['izin']);
                    $SuratIzin = 'Attachment.'.time().'.'.$request['izin']->extension();
                    $request->izin->move(public_path('uploads'), $SuratIzin);
                } else {
                    $SuratIzin = '';
                }

                $data = Data::create([
                    'date' => $date,
                    'day' => $day,
                    'time_in' => $time_in,
                    'user_id' => $user,
                    'jurusan_id' => $request['jurusan'],
                    'attedance' => 'izin',
                    'activity' => $SuratIzin,
                ]);

                toast('Data Berhasil Disimpan','success');
                return back();

                break;
            default:

                $request->validate([
                'sakit' => 'required|max:2048',
                'jurusan' => 'required',
                ]);

                if (!empty($request->sakit)) {
                    $fileAttachment = 'Attachment.'.time().'.'.$request->sakit->extension();
                    $request->sakit->move(public_path('uploads'), $fileAttachment);
                } else {
                    $fileAttachment = '';
                }


                $data = Data::create([
                    'date' => $date,
                    'day' => $day,
                    'time_in' => $time_in,
                    'user_id' => $user,
                    'jurusan_id' => $request['jurusan'],
                    'attedance' => 'sakit',
                    'activity' => $fileAttachment,
                ]);

                toast('Data Berhasil Disimpan','success');
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
        $request->validate([
            'activity' => 'required',
        ]);

        switch ($request->input('simpan')) {
            case 'keluar':
                $data = Data::where('id', $id)->update([
                    'activity' => $request['activity'],
                ]);

                toast('Absen Keluar Berhasil Disimpan','success');
                return back();
                
                break;
            
            default:
                # code...
                break;
        }
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