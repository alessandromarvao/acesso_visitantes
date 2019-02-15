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
}