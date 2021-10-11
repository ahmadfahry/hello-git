<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;
class SiswaController extends Controller
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
     public function uploadFile(Request $request,$oke)
    {
            $result ='';
            $file = $request->file($oke);
            $name = $file->getClientOriginalName();
            // $tmp_name = $file['tmp_name'];

            $extension = explode('.',$name);
            $extension = strtolower(end($extension));

            $key = rand().'-'.$oke;
            $tmp_file_name = "{$key}.{$extension}";
            $tmp_file_path = "admin/images/cars/";
            $file->move($tmp_file_path,$tmp_file_name);
            // if(move_uploaded_file($tmp_name, $tmp_file_path)){
            $result = url('admin/images/cars').'/'.$tmp_file_name;
            // }
        return $result;
    }

    public function index()
    {
       $data = DB::table('siswa as sis')
               ->join('kelas as ks','ks.id','=','sis.id_kelas') 
               ->join('jurusan as js','js.id','=','ks.id_jurusan')
               ->select('sis.*','ks.nama_kelas','js.nama_jurusan','js.tingkat')
               ->get();
        $kelas = DB::table('kelas as ks')
               ->join('jurusan as js','js.id','=','ks.id_jurusan')
               ->select('ks.*','js.nama_jurusan','pd.nama_prodi','js.tingkat')
               ->get();
        return view('admin.siswa.master_siswa',compact('data','kelas'));
    }

    public function edit($id)
    {
       $dt = DB::table('siswa as sis')
               ->where('sis.id',$id)
               ->first();

         $kelas = DB::table('kelas as ks')
               ->join('jurusan as js','js.id','=','ks.id_jurusan')
               ->select('ks.*','js.nama_jurusan','pd.nama_prodi','js.tingkat')
               ->get();
        return view('admin.siswa.master_siswa_edit',compact('dt','kelas'));
    }

    public function detail()
    {
        $dt = DB::table('siswa as sis')
               ->where('sis.id_user',Auth::user()->id)
               ->first();
        $kelas = DB::table('kelas as ks')
               ->join('jurusan as js','js.id','=','ks.id_jurusan')
               ->select('ks.*','js.nama_jurusan','pd.nama_prodi','js.tingkat')
               ->get();
        return view('admin.siswa.biodata_siswa',compact('dt','kelas'));
    }

    public function create(Request $request)
    {
        $now = str_replace('-', '',Carbon::now()->format('Y-m-d'));
        $nim =  $now.rand(1000,10000);
        $user_id = DB::table('users')->insertGetId(
            [
                'name'=>$request->nama_siswa,
                'username'=>$nis,
                'role'=>'siswa',
                'password'=>bcrypt($nis),
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]
        );
        DB::table('siswa')->insert(
            [
                'nama_mahasiswa'=>$request->nama_siswa,
                'nis'=>$nis,
                'id_kelas'=>$request->id_kelas,
                'id_user'=>$user_id,
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect('siswa');
    }

    public function updateSelf(Request $request,$id)
    {
        if($request->file('foto_siswa')!=null)
        {
            $foto_siswa = $this->uploadFile($request,'foto_siswa');
        }else
        {
            $foto_siswa = $request->old_foto;
        }
        DB::table('siswa')->where('id',$id)->update(
            [
                //'nama_siswa'=>$request->nama_siswa,
                'tanggal_lahir'=>$request->tanggal_lahir,
                'tempat_lahir'=>$request->tempat_lahir,
                'alamat'=>$request->alamat,
                'asal_sekolah'=>$request->asal_sekolah,
                'jurusan_sekolah'=>$request->jurusan_sekolah,
                'jenis_kelamin'=>$request->jenis_kelamin,
                'no_hp'=>$request->no_hp,
                'agama'=>$request->agama,
                'foto_mahasiswa'=>$foto_siswa,
                'email'=>$request->email,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect('siswa/biodata');
    }

     public function update(Request $request,$id)
    {

        DB::table('siswa')->where('id',$id)->update(
            [
                'nama_siswa'=>$request->nama_siswa,
                'id_kelas'=>$request->id_kelas,
                //'id_user'=>$user_id,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

       return redirect('siswa');
    }

    public function delete($id)
    {
        $dt = DB::table('siswa as sis')
               ->where('sis.id',$id)
               ->first();
        DB::table('users')->where('id',$dt->id_user)->delete();
        DB::table('siswa')->where('id',$id)->delete();
        return redirect()->back();
    }
}
