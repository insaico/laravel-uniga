<?php
namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    public function getmahasiswa()
    {
        $dt_mahasiswa=mahasiswa::get();
        return response()->json($dt_mahasiswa);
    }


    public function getid($id)
    {
        $dt_mahasiswa=mahasiswa::where('id','=',$id)->get();
        return response()->json($dt_mahasiswa);

    }

    public function createmahasiswa(Request $req){
        $validate = Validator::make($req->all(),[
            'nama'=>'required',
            'alamat'=>'required',
            'jenis_kelamin'=>'required'
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $create = Mahasiswa::create([
            'nama'=>$req->nama,
            'alamat'=>$req->alamat,
            'jenis_kelamin'=>$req->jenis_kelamin,
        ]);
        if($create){
            return response()->json(['status'=>true, 'message'=>'Sukses menambah data mahasiswa.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal menambah data mahasiswa.']);
        }
    
    }   
    
    public function updatemahasiswa(Request $req, $id){
        $validate = Validator::make($req->all(),[
            'nama'=>'required',
            'alamat'=>'required',
            'jenis_kelamin'=>'required'
    
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $update = mahasiswa::where('id',$id)->update([
            'nama'=>$req->get('nama'),
            'alamat'=>$req->get('alamat'),
            'jenis_kelamin'=>$req->get('jenis_kelamin')
            
        ]);
        if($update){
            return response()->json(['status'=>true,  'message'=>'Berhasil mengubah data mahasiswa']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal mengubah data mahasiswa']);
        }
    }
 
    
    public function deletemahasiswa($id){
        $delete = mahasiswa::where('id', $id)->delete();
        if($delete){
            return response()->json(['status'=>true, 'message' => 'Sukses delete data mahasiswa.']);
        }else{
            return response()->json(['status'=>false, 'message' => 'Gagal data mahasiswa.']);
        }
    }
       
}
