<?php

namespace App\Http\Controllers;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private  $data=[
        [ 
            'id' => 'CUST001',
            'name' => 'Agus',
            'address' => 'Bekasi'
            
        ],
        
        [
            'id' => 'CUST002',
            'name' => 'Budi',
            'address' => 'Jakarta'
        ],

        [
            'id' => 'CUST003',
            'name' => 'Charlie',
            'address' => 'Bandung'
        ]];
     public function __construct()
    {
        //
    }
    public function getCustomersByID($id){
        foreach($this->data as $d){
            if($d['id']==$id){
                return [
                    'status'=>200,
                    'success'=> true,
                    'customer'=> $d
                ];
            }
        }

    }


}
