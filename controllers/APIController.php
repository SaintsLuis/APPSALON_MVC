<?php

namespace Controllers;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;

class APIController
{
    //m | Index
    public static function index()
    {
        $servicios = Servicio::all();
        echo json_encode($servicios);
    }

    //m | Guardar
    public static function guardar()
    {
        // Almacena la Cita y devuelve el ID
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();

        $id = $resultado['id'];

        // Almacena los Servicios con el ID de la Cita
        $idServicios = explode(",", $_POST['servicios']);
        foreach ($idServicios as $idServicio) {
            $args = [
                'citaId' => $id,
                'servicioId' => $idServicio
            ];
            $citaServicio = new CitaServicio($args);
            $citaServicio->guardar();
        }

        // 
        echo json_encode(['resultado' => $resultado]);
    }

    //m |Eliminar
    public static function eliminar() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $cita = Cita::find($_POST['id']); // busca el id
            $cita->eliminar(); // elimina
            header('Location:' . $_SERVER['HTTP_REFERER']); // redericiona

            
        }
    }
}
