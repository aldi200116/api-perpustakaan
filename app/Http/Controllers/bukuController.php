<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class bukuController extends BaseController
{
    public function index()
    {
        $data = DB::table('buku')->get();
        return [
            'success' => true,
            'status' => 200,
            'message' => 'request data success',
            'data' => $data
        ];
    }
    public function getByID($id)
    {
        $data = DB::table('buku')->where('id_buku', $id)->first();
        return response()->json($data);
    }

    public function insert()
    {
        $data = request()->all();
        $mhs = [

            'id_buku'=> $data['id_buku'],
            'isbn'=> $data['isbn'],
            'judul_buku'=> $data['judul_buku'],
            'j_buku_baik'=> $data['j_buku_baik'],
            'j_buku_rusak'=> $data['j_buku_rusak'],
            'kategori_buku'=> $data['kategori_buku'],
            'penerbit_buku'=> $data['penerbit_buku'],
            'pengarang'=> $data['pengarang'],
            'tahun_terbit'=> $data['tahun_terbit']
                
        ];
        try{
            DB::table('buku')->insert($mhs);
            return[
                'success' => true,
                'status' => 200,
                'message' => 'insert data buku success',
                'data' => $data
            ];
        }catch (\Exception $ex){
            $message =$ex->getMessage();
            return response()
            ->json([
                'success' => false,
                'status' => 400,
                'message' => $message
            ], 400);
        }
    }
public function update($id)
    {
        $data = request()->all();
        $mhs = [
            'id_buku'=> $data['id_buku'],
            'isbn'=> $data['isbn'],
            'judul_buku'=> $data['judul_buku'],
            'j_buku_baik'=> $data['j_buku_baik'],
            'j_buku_rusak'=> $data['j_buku_rusak'],
            'kategori_buku'=> $data['kategori_buku'],
            'penerbit_buku'=> $data['penerbit_buku'],
            'pengarang'=> $data['pengarang'],
            'tahun_terbit'=> $data['tahun_terbit']
 ];
        try {
            DB::table('buku')
                ->where('id_buku', $id)
                ->update($mhs);
            return [
                'success' => true,
                'status' => 201,
                'message' => 'update buku sukses'
            ];
        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()
                ->json([
                    'success' => false,
                    'status' => 400,
                    'message' => $message
                ], 400);
        }
    }

    public function delete($id)
    {
        try {
            DB::table('buku')
                ->where('id_buku', $id)
                ->delete();
            return [
                'success' => true,
                'status' => 201,
                'message' => 'delete buku sukses'
            ];
        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()
                ->json([
                    'success' => false,
                    'status' => 400,
                    'message' => $message
                ], 400);
        }
    }
}
