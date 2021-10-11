<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;
use PDF;
class MataPelajaranController extends Controller
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
       $data = DB::table('mata_pelajaran as mp')
              ->join('guru as gu','gu.id','=','mp.id_guru')
              ->select('mp.*','gu.nama_gu')
              ->get();
       $guru= DB::table('guru')->get();
       return view('admin.matapelajran.master_mata_pelajaran',compact('data','guru'));
    }

    public function edit($id)
    {
       $dt = DB::table('mata_pelajaran')->where('id',$id)->first();
       $guru = DB::table('guru')->get();
       return view('admin.matapelajaranmaster_mata_pelajaran_edit',compact('dt','guru'));
    }

    public function indexSiswa()
    {
       $data = DB::table('mata_pelajaran as mp')
              ->select('mp.id as id_matapelajaran','mp.nama_mata_pelajaran')
              ->get();
      $sis   = DB::table('siswa')->where('id_user',Auth::user()->id)->first();
      //return $data;
       return view('admin.matapelajaran.master_mata_pelajaran_siswa',compact('data','siswa'));
    }

    public function updateMatapelajaranPilih(Request $request)
    {
        DB::table('siswa_matapelajaran')->where('id_siswa',$request->id_siswa)->delete();
        $id_matapelajaran = $request->id_mata_pelajaran;
        foreach ($id_matapelajaran as $idm)
        {
           DB::table('siswa_matapelajaran')->insert(
            [
              'id_matapelajaran'=>$idm,
              'id_siswa'=>$request->id_siswa
            ]
          );
        }
        return redirect()->back()->with('success','Data matapelajaran telah di update');
    }

    public function create(Request $request)
    {
        DB::table('mata_pelajaran')->insert(
            [
                'nama_mata_pelajaran'=>$request->nama_mata_pelajaran,
                'sks'=>$request->sks,
                'id_guru'=>$request->id_guru,
                'semester'=>$request->semester,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        DB::table('mata_pelajaran')->where('id',$id)->update(
            [
                'nama_mata_pelajaran'=>$request->nama_mata_pelajaran,
                'sks'=>$request->sks,
                'id_guru'=>$request->id_guru,
                'semester'=>$request->semester,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect('matapelajaran');
    }

    public function delete($id)
    {
        DB::table('mata_pelajaran')->where('id',$id)->delete();
        return redirect()->back();
    }

    public function cetakPfd($id)
    {
       $cekbeh1 = DB::table('transactions')
       ->where('id_siswa',$id)
       ->where('status','Menunggu Verfikasi Admin')
       ->get();
       $cekbeh2 = DB::table('transactions')
       ->where('id_siswa',$id)
       ->where('status','Menunggu Verfikasi Admin')
       ->get();
       if(!$cekbeh1->isEmpty() || !$cekbeh2->isEmpty())
       {
          return redirect()->back()->with('danger','Ada pembayaran yang belum terselesaikan jika sudah membayar dan mengupload bukti transfer dan masih tidak bisa cetak krs, silahkan hubungi admin untuk konfirmasi!');
       }else
       {
           $sis = DB::table('siswa')->where('id',$id)->first();
           $kelas = DB::table('kelas')->where('id',$mhs->id_kelas)->first();
           $guru = DB::table('guru')->where('id',$kelas->id_guru)->first();
           $data = DB::table('siswa_matapelajaran')->where('id_siswa',$id)->get();
           $pdf = PDF::loadview('admin.matakpelajaran.cetak_rapor',compact('data','sis','kelas','guru'));
           return $pdf->download('RAPOR-'.$sis->nis.'.pdf');
       }
       
    }
}
