<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
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
        $user  = User::leftJoin('kelas', 'kelas.id', '=', 'users.kelas_id')->select('users.*', 'kelas.nama')->where('users.id', Auth::user()->id)->first();
        /* $datas = Data::join('users', 'users.id', '=', 'data.user_id')->where('users.kelas', '11 TKJ-1')->get(['data.*']); */
        // dd($datas);
        return view('user.profil', [
            'user' => $user,
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
        if (!empty($request->photo)) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $fileName = time().'.'.$request->photo->extension();
            $request->photo->move(public_path('img'), $fileName);
        } else {
            $fileName = '';
        }

        switch ($request->input('update')) {
            case 'data':
                User::where('id', $id)->update([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'photo' => $fileName,
                ]);
                
                toast('Data Berhasil Diupdate','success');
                return back();
                break;
            default:
                User::where('id', $id)->update([
                    'password' => Hash::make($request['name']),
                ]);

                toast('Data Berhasil Diupdate','success');
                return back();
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