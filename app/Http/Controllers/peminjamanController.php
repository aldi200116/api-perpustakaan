<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Routing\Controller as BaseController;

class peminjamanController extends BaseController
{
    public function index()
    {
        $data = DB::table('peminjaman')->get();
        return [
            'success' => true,
            'status' => 200,
            'message' => 'request data success',
            'data' => $data
        ];
    }
    public function getByID($id)
    {
        $data = DB::table('peminjaman')->where('id_peminjaman', $id)->first();
        return response()->json($data);
    }
    public function insert()
    {
        $data = request()->all();
        $mhs = [
         
            'id_peminjaman'=> $data['id_peminjaman'],
            'nama_anggota'=> $data['nama_anggota'],
            'judul_buku'=> $data['judul_buku'],
            'tanggal_peminjaman'=> $data['tanggal_peminjaman'],
            'tanggal_pengembalian'=> $data['tanggal_pengembalian'],
            'kondisi_buku_saat_dipinjam'=> $data['kondisi_buku_saat_dipinjam'],
            'kondisi_buku_saat_dikembalikan'=> $data['kondisi_buku_saat_dikembalikan'],
            'denda'=> $data['denda']
            ];
        try{
            DB::table('peminjaman')->insert($mhs);
            return[
                'success' => true,
                'status' => 200,
                'message' => 'insert data peminjaman success',
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
            
            'id_peminjaman'=> $data['id_peminjaman'],
            'nama_anggota'=> $data['nama_anggota'],
            'judul_buku'=> $data['judul_buku'],
            'tanggal_peminjaman'=> $data['tanggal_peminjaman'],
            'tanggal_pengembalian'=> $data['tanggal_pengembalian'],
            'kondisi_buku_saat_dipinjam'=> $data['kondisi_buku_saat_dipinjam'],
            'kondisi_buku_saat_dikembalikan'=> $data['kondisi_buku_saat_dikembalikan'],
            'denda'=> $data['denda']   
        ];
        try {
            DB::table('peminjaman')
                ->where('id_peminjaman', $id)
                ->update($mhs);
            return [
                'success' => true,
                'status' => 201,
                'message' => 'update peminjaman sukses'
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
            DB::table('peminjaman')
                ->where('id_peminjaman', $id)
                ->delete();
            return [
                'success' => true,
                'status' => 201,
                'message' => 'delete peminjaman sukses'
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