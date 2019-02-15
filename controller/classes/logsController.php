<?php

namespace Controller\Classes;

use Model\Logs;

class LogsController
{
    public static function create($usuario, $data, $mensagem)
    {
        $logs = new Logs();
        
        return $logs->create($usuario, $data, $mensagem);
    }
    
    public static function read($id=NULL)
    {
        $logs = new Logs();

        return $logs->read($id);
    }
}