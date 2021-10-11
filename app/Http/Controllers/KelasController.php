<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;
class KelasController extends Controller
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
       $data = DB::table('kelas as ks')
               ->join('jurusan as js','js.id','=','ks.id_jurusan')
               ->join('guru as gu','gu.id','=','ks.id_guru')
               ->select('js.nama_jurusan','ks.*','js.tingkat','ds.nama_guru')
               ->get();
       $jurusan = DB::table('jurusan')->get();
       $guru = DB::table('guru')->get();
       return view('admin.kelas.master_kelas',compact('data','jurusan','guru'));
    }

      public function edit($id)
    {
       $dt = DB::table('kelas as ks')
               ->where('ks.id',$id)
               ->first();
       $jurusan = DB::table('jurusan')->get();
       $guru    = DB::table('guru')->get();
       return view('admin.kelas.master_kelas_edit',compact('dt','jurusan','guru'));
    }

    public function create(Request $request)
    {
        DB::table('kelas')->insert(
            [
                'nama_kelas'=>$request->nama_kelas,
                'id_jurusan'=>$request->id_jurusan,
                'id_guru'=>$request->id_guru,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect()->back();
    }

    public function update(Request $request,$id)
    {

        DB::table('kelas')->where('id',$id)->update(
            [
                'nama_kelas'=>$request->nama_kelas,
                'id_jurusan'=>$request->id_jurusan,
                'id_guru'=>$request->id_guru,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect('kelas');
    }

    public function delete($id)
    {
        DB::table('kelas')->where('id',$id)->delete();
        return redirect()->back();
    }
}
