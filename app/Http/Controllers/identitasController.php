<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class identitasController extends BaseController
{
    public function index()
    {
        $data = DB::table('identitas')->get();
        return [
            'success' => true,
            'status' => 200,
            'message' => 'request data success',
            'data' => $data
        ];
    }
    public function getByID($id)
    {
        $data = DB::table('identitas')->where('id_identitas', $id)->first();
        return response()->json($data);
    }

    public function insert()
    {
        $data = request()->all();
        $mhs = [

            'id_identitas'=> $data['id_identitas'],
            'alamat_app'=> $data['alamat_app'],
            'email_app'=> $data['email_app'],
            'nama_app'=> $data['nama_app'],
            'nomor_hp'=> $data['nomor_hp']
                
        ];
        try{
            DB::table('identitas')->insert($mhs);
            return[
                'success' => true,
                'status' => 200,
                'message' => 'insert data identitas success',
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
            'id_identitas'=> $data['id_identitas'],
            'alamat_app'=> $data['alamat_app'],
            'email_app'=> $data['email_app'],
            'nama_app'=> $data['nama_app'],
            'nomor_hp'=> $data['nomor_hp']
                      
        ];
        try {
            DB::table('identitas')
                ->where('id_identitas', $id)
                ->update($mhs);
            return [
                'success' => true,
                'status' => 201,
                'message' => 'update identitas sukses'
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
            DB::table('identitas')
                ->where('id_identitas', $id)
                ->delete();
            return [
                'success' => true,
                'status' => 201,
                'message' => 'delete identitas sukses'
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
