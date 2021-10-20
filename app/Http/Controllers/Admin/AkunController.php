<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
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
        // $datas = User::get();
        $datas = User::leftJoin('kelas', 'kelas.id', '=', 'users.kelas_id')->select('users.*', 'kelas.nama')->get();
        $kelas = Kelas::get();
        return view('admin.akun', [
            'datas' => $datas,
            'kelas' => $kelas,
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required',
        ]);

        $data = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
        ]);

        toast('Data Berhasil Diupdate','success');
        return back();
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
        $datas = User::find($id);
        return response()->json($datas);
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
        User::destroy($id);

        toast('User Berhasil Dihapus','success');
        return back();
    }

    public function updat(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'userId' => 'required',
        ]);

        $id = $request->userId;

        if ($request->password) {
            $data = User::where('id', $id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => $request['role'],
                'kelas' => $request['kelas'],
            ]);
        } else {
            $data = User::where('id', $id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'role' => $request['role'],
                'kelas' => $request['kelas'],
            ]);
        }

        toast('Data Berhasil Diupdate','success');
        return back();
    }

    public function default()
    {
        $datas = User::where('role', 'user')->get();
        // dd($datas);
        for ($i=0; $i < count($datas); $i++) {
            $password = "Merdeka@1945";
            // dd($datas[$i]['id']);
            $data = User::where('id', $datas[$i]['id'])->update([
                'password' => Hash::make($password),
            ]);
        }

        toast('Kata Sandi Diupdate','success');
        return back();
    }
}