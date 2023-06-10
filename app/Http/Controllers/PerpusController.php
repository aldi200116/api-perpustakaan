<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class PerpusController extends BaseController
{
    public function index()
    {
        $data = DB::table('user')->get();
        return [
            'success' => true,
            'status' => 200,
            'message' => 'request data success',
            'data' => $data
        ];
    }
    public function getByID($id)
    {
        $data = DB::table('user')->where('id_user', $id)->first();
        return response()->json($data);
    }

    public function insert()
    {
        $data = request()->all();
        $mhs = [

            'id_user'=> $data['id_user'],
            'kode_user'=> $data['kode_user'],
            'nis'=> $data['nis'],
            'fullname'=> $data['fullname'],
            'username'=> $data['username'],
            'password'=> $data['password'],
            'kelas'=> $data['kelas'],
            'alamat'=> $data['alamat'],
            'verif'=> $data['verif'],
            'role'=> $data['role'],
            'join_date'=> $data['join_date']
                ];
        try{
            DB::table('user')->insert($mhs);
            return[
                'success' => true,
                'status' => 200,
                'message' => 'insert data mahasiswa success',
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

            'id_user'=> $data['id_user'],
            'kode_user'=> $data['kode_user'],
            'nis'=> $data['nis'],
            'fullname'=> $data['fullname'],
            'username'=> $data['username'],
            'password'=> $data['password'],
            'kelas'=> $data['kelas'],
            'alamat'=> $data['alamat'],
            'verif'=> $data['verif'],
            'role'=> $data['role'],
            'join_date'=> $data['join_date']
        ];
        try {
            DB::table('user')
                ->where('id_user', $id)
                ->update($mhs);
            return [
                'success' => true,
                'status' => 201,
                'message' => 'update mahasiswa sukses'
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
            DB::table('user')
                ->where('id_user', $id)
                ->delete();
            return [
                'success' => true,
                'status' => 201,
                'message' => 'delete mahasiswa sukses'
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
