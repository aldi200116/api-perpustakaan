<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class kategoriController extends BaseController
{
    public function index()
    {
        $data = DB::table('kategori')->get();
        return [
            'success' => true,
            'status' => 200,
            'message' => 'request data success',
            'data' => $data
        ];
    }
    public function getByID($id)
    {
        $data = DB::table('kategori')->where('id_kategori', $id)->first();
        return response()->json($data);
    }

    public function insert()
    {
        $data = request()->all();
        $mhs = [

            'id_kategori'=> $data['id_kategori'],
            'kode_kategori'=> $data['kode_kategori'],
            'nama_kategori'=> $data['nama_kategori'],
            ];
        try{
            DB::table('kategori')->insert($mhs);
            return[
                'success' => true,
                'status' => 200,
                'message' => 'insert data kategori success',
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


            'id_kategori'=> $data['id_kategori'],
            'kode_kategori'=> $data['kode_kategori'],
            'nama_kategori'=> $data['nama_kategori'],
          
        ];
        try {
            DB::table('kategori')
                ->where('id_kategori', $id)
                ->update($mhs);
            return [
                'success' => true,
                'status' => 201,
                'message' => 'update kategori sukses'
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
            DB::table('kategori')
                ->where('id_kategori', $id)
                ->delete();
            return [
                'success' => true,
                'status' => 201,
                'message' => 'delete kategori sukses'
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
