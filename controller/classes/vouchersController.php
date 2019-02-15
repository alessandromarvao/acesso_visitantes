<?php

namespace Controller\Classes;

Use Model\Vouchers;

class VouchersController
{
    public static function create($id)
    {
        $voucher = new Vouchers();

        return $voucher->create($id, 0);
    }

    public static function read()
    {
        $voucher = new Vouchers();

        return $voucher->read();
    }
    
    public static function getFirst(){
        $voucher = new Vouchers();
    
        return $voucher->getFirst();
    }

    public static function utilizado($id){
        $voucher = new Vouchers();

        return $voucher->utilizado($id);
    } 

    // public static function list_old()
    // {
    //     $voucher = new Vouchers();

    //     return $voucher->list_old();
    // }
}