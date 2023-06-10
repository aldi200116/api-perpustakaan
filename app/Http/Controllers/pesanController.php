<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class pesanController extends BaseController
{
    public function index()
    {
        $data = DB::table('pesan')->get();
        return [
            'success' => true,
            'status' => 200,
            'message' => 'request data success',
            'data' => $data
        ];
    }
    public function getByID($id)
    {
        $data = DB::table('pesan')->where('id_pesan', $id)->first();
        return response()->json($data);
    }

    public function insert()
    {
        $data = request()->all();
        $mhs = [
            'id_pesan'=> $data['id_pesan'],
            'isi_pesan'=> $data['isi_pesan'],
            'judul_pesan'=> $data['judul_pesan'],
            'penerima'=> $data['penerima'],
            'pengirim'=> $data['pengirim'],
            'status'=> $data['status'],
            'tanggal_kirim'=> $data['tanggal_kirim']
            ];
        try{
            DB::table('pesan')->insert($mhs);
            return[
                'success' => true,
                'status' => 200,
                'message' => 'insert data pesan success',
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
            'denda'=> $data['denda'],
            'id_pesan'=> $data['id_pesan'],
            'isi_pesan'=> $data['isi_pesan'],
            'judul_pesan'=> $data['judul_pesan'],
            'penerima'=> $data['penerima'],
            'pengirim'=> $data['pengirim'],
            'status'=> $data['status'],
            'tanggal_kirim'=> $data['tanggal_kirim']
                      
        ];
        try {
            DB::table('pesan')
                ->where('id_pesan', $id)
                ->update($mhs);
            return [
                'success' => true,
                'status' => 201,
                'message' => 'update pesan sukses'
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
            DB::table('pesan')
                ->where('id_pesan', $id)
                ->delete();
            return [
                'success' => true,
                'status' => 201,
                'message' => 'delete pesan sukses'
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
