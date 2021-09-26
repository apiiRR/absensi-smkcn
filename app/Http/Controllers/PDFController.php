<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function cetak($from, $to, $project)
    {
        $datas = Data::where('user_id', Auth::user()->id)->whereBetween('date', [$from, $to])->where('jurusan_id', $project)->orderBy('date', 'ASC')->get();
        $user = User::select('name')->where('id', Auth::user()->id)->first();
        // dd($datas);
        // $pdf->set_base_path(realpath(APPLICATION_PATH . '../../../public/css/pdf'));
        $path = base_path('jarvis.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic = 'data:image/'. $type . ';base64,' . base64_encode($data);
        $datas = [$datas, $pic];
        // dd($datas);
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('print', compact('datas'));
        // $pdf = PDF::loadView('print_absent', $datas);
        $pdf->setPaper('A4', 'potrait');
        return $pdf->download('Data_Absen_'.$user->name.'.pdf');
    }
}