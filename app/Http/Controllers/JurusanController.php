<?php
namespace App\Http\Controllers;
use App\Models\Jurusan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class JurusanController extends Controller
{
    public function getjurusan()
    {
        $dt_jurusan=jurusan::get();
        return response()->json($dt_jurusan);
    }


    public function getidjurusan($id)
    {
        $dt_jurusan=jurusan::where('id_jurusan',$id)->get();
        return response()->json($dt_jurusan);

    }

    public function createjurusan(Request $req){
        $validate = Validator::make($req->all(),[
            'nama_jurusan'=>'required',

        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $create = jurusan::create([
            'nama_jurusan'=>$req->nama_jurusan,

        ]);
        if($create){
            return response()->json(['status'=>true, 'message'=>'Sukses menambah data jurusan.']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal menambah data jurusan.']);
        }
    
    }   
    
    public function updatejurusan(Request $req, $id){
        $validate = Validator::make($req->all(),[
            'nama_jurusan'=>'required',

    
        ]);
        if($validate->fails()){
            return response()->json($validate->errors()->toJson());
        }
        $update = jurusan::where('id_jurusan',$id)->update([
            'nama_jurusan'=>$req->get('nama_jurusan'),

        ]);
        if($update){
            return response()->json(['status'=>true,  'message'=>'Berhasil mengubah data jurusan']);
        }else{
            return response()->json(['status'=>false, 'message'=>'Gagal mengubah data jurusan']);
        }
    }
 
    
    public function deletejurusan($id){
        $delete = jurusan::where('id_jurusan', $id)->delete();
        if($delete){
            return response()->json(['status'=>true, 'message' => 'Sukses delete data jurusan.']);
        }else{
            return response()->json(['status'=>false, 'message' => 'Gagal data jurusan.']);
        }
    }
       
}

