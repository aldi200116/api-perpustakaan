<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class penerbitController extends BaseController
{
    public function index()
    {
        $data = DB::table('penerbit')->get();
        return [
            'success' => true,
            'status' => 200,
            'message' => 'request data success',
            'data' => $data
        ];
    }
    public function getByID($id)
    {
        $data = DB::table('penerbit')->where('id_penerbit', $id)->first();
        return response()->json($data);
    }

    public function insert()
    {
        $data = request()->all();
        $mhs = [

            'id_penerbit'=> $data['id_penerbit'],
            'kode_penerbit'=> $data['kode_penerbit'],
            'nama_penerbit'=> $data['nama_penerbit'],
            'verif_penerbit'=> $data['verif_penerbit']
        ];
        try{
            DB::table('penerbit')->insert($mhs);
            return[
                'success' => true,
                'status' => 200,
                'message' => 'insert data penerbit success',
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


            'id_penerbit'=> $data['id_penerbit'],
            'kode_penerbit'=> $data['kode_penerbit'],
            'nama_penerbit'=> $data['nama_penerbit'],
            'verif_penerbit'=> $data['verif_penerbit']
              ];
        try {
            DB::table('penerbit')
                ->where('id_penerbit', $id)
                ->update($mhs);
            return [
                'success' => true,
                'status' => 201,
                'message' => 'update penerbit sukses'
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
            DB::table('penerbit')
                ->where('id_penerbit', $id)
                ->delete();
            return [
                'success' => true,
                'status' => 201,
                'message' => 'delete penerbit sukses'
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
