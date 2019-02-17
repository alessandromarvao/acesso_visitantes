<?php

namespace Controller\Classes;

use Model\Acessos;

class AcessosController
{
    public static function create($matricula, $voucher, $nome)
    {
        $acesso = new Acessos();

        return $acesso->create($matricula, $voucher, $nome);
    }

    public static function read($id=NULL)
    {
        $acesso = new Acessos();

        return $acesso->read($id);
    }

    public static function getAcessosByTime(){
        date_default_timezone_set('America/Recife');

        $acesso = new Acessos();

        $time1 = '';
        $time2 = '';
        
        switch(true){
            case date('H:i:s') <= '12:00:00':
                $time1 = date('Y-m-d') . ' 00:00:00';
                $time2 = date('Y-m-d') . ' 12:00:00';
                break;
            case date('H:i:s') <= '18:00:00':
                $time1 = date('Y-m-d') . ' 12:00:00';
                $time2 = date('Y-m-d') . ' 18:00:00';
                break;
            case date('H:i:s') <= '23:59:59':
                $time1 = date('Y-m-d') . ' 18:00:00';
                $time2 = date('Y-m-d') . ' 23:59:59';
                break;
        }

        return $acesso->getAcessosByTime($time1, $time2);
    }

    public static function getAcessosByDate(){
        date_default_timezone_set('America/Recife');

        $acesso = new Acessos();
        $date = date('Y-m-d');

        return $acesso->getAcessosByDate($date);
    }
}