<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class pemberitahuanController extends BaseController
{
    public function index()
    {
        $data = DB::table('pemberitahuan')->get();
        return [
            'success' => true,
            'status' => 200,
            'message' => 'request data success',
            'data' => $data
        ];
    }
    public function getByID($id)
    {
        $data = DB::table('pemberitahuan')->where('id_pemberitahuan', $id)->first();
        return response()->json($data);
    }

    public function insert()
    {
        $data = request()->all();
        $mhs = [

            'id_pemberitahuan'=> $data['id_pemberitahuan'],
            'isi_pemberitahuan'=> $data['isi_pemberitahuan'],
            'level_user'=> $data['level_user'],
            'status'=> $data['status']
            ];
        try{
            DB::table('pemberitahuan')->insert($mhs);
            return[
                'success' => true,
                'status' => 200,
                'message' => 'insert data pemberitahuan success',
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
            'id_pemberitahuan'=> $data['id_pemberitahuan'],
            'isi_pemberitahuan'=> $data['isi_pemberitahuan'],
            'level_user'=> $data['level_user'],
            'status'=> $data['status']
                      
        ];
        try {
            DB::table('pemberitahuan')
                ->where('id_pemberitahuan', $id)
                ->update($mhs);
            return [
                'success' => true,
                'status' => 201,
                'message' => 'update pemberitahuan sukses'
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
            DB::table('pemberitahuan')
                ->where('id_pemberitahuan', $id)
                ->delete();
            return [
                'success' => true,
                'status' => 201,
                'message' => 'delete pemberitahuan sukses'
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
