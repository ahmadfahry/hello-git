<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;
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
        if(Auth::user()->role=='admin')
        {
            $jurusan = DB::table('jurusan')->count();
            $dosen = DB::table('guru')->count();
            $mhs = DB::table('siswa')->count();
            return view('home',compact('jurusan','guru','sis'));
        }else
        {
           $sis = DB::table('siswa')->where('id_user',Auth::user()->id)->first();
           $kelas = DB::table('kelas')->where('id',$mhs->id_kelas)->first();
           $guru = DB::table('guru')->where('id',$kelas->id_guru)->first();
            $mps = DB::table('siswa_matapelajaran')->where('id_siswa',$sis->id)->count();
            return view('home_siswa',compact('guru','mps'));
        }
        
    }
}
