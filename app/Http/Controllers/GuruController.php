<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use DB;
class GuruController extends Controller
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
       $data = DB::table('guru')->get();
       return view('admin.guru.master_guru',compact('data'));
    }

     public function edit($id)
    {
       $dt = DB::table('guru')->where('id',$id)->first();
       return view('admin.guru.master_guru_edit',compact('dt'));
    }

    public function create(Request $request)
    {
        DB::table('guru')->insert(
            [
                'nama_guru'=>$request->nama_guru,
                'nip'=>$request->nip,
                'foto_guru'=>$this->uploadFile($request,'foto_guru'),
                'created_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect()->back();
    }

    public function update(Request $request,$id)
    {
        if($request->file('foto_guru')!=null)
        {
            $foto_guru= $this->uploadFile($request,'foto_guru');
        }else
        {
            $foto_guru = $request->old_foto;
        }
        DB::table('guru')->where('id',$id)->update(
            [
                'nama_guru'=>$request->nama_guru,
                'nip'=>$request->nip,
                'foto_guru'=>$foto_guru,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]
        );

        return redirect('guru');
    }

    public function delete($id)
    {
        DB::table('guru')->where('id',$id)->delete();
        return redirect()->back();
    }
}
