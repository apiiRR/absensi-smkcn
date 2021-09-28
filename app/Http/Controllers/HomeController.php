<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Jurus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         if (Auth::user()->role == 'admin') { // Role Admin
            date_default_timezone_set('Asia/Jakarta');
            $bulan = date('n');
            $hari = date('d');
            /* $absen_today = Data::where('date_in', $tanggal)->count();
            $total_user = User::where('role', 'user')->count();
            $total_project = Project::count();
            $total_holiday = Holiday::count();
            $datas = Data::where('date_in', $tanggal)->get(); */
            // dd($hari);
            $totUser = User::where('role', 'user')->get()->count();
            $totJurusan = Jurus::get()->count();
            $lapBulan = Data::whereMonth('date', $bulan)->get()->count();
            $lapHarian = Data::whereDay('date', $hari)->get()->count();
            $hadir = Data::where('attedance', 'hadir')->get();
            $totHadir = $hadir->count();
            $sakit = Data::where('attedance', 'sakit')->get();
            $totSakit = $sakit->count();
            $izin = Data::where('attedance', 'izin')->get();
            $totIzin = $izin->count();
            return view('admin.home', [
                'hadir' => $hadir,
                'totHadir' => $totHadir,
                'sakit' => $sakit,
                'totSakit' => $totSakit,
                'izin' => $izin,
                'totIzin' => $totIzin,
                'totUser' => $totUser,
                'totJurusan' => $totJurusan,
                'lapBulan' => $lapBulan,
                'lapHarian' => $lapHarian,
            ]);
        } elseif (Auth::user()->role == 'user') { // Role User
            // date_default_timezone_set('Asia/Jakarta');
            $user = Auth::user()->id;
            // $tanggal = date("Y-m-d");
            // $datas = Data::where('user_id', $user)->where('date_in', $tanggal)->orderBy('id', 'desc')->first();
            $datas = Data::where('user_id', $user)->orderBy('date', 'desc')->take(5)->get();
            // $datas = $user->datas;
            // dd($datas);
            return view('user.home', compact('datas'));

            
        }
    }
}