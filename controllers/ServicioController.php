<?php

namespace Controllers;

use Model\Servicio;
use MVC\Router;

class ServicioController {

    //m | Index Servicios
    public static function index(Router $router) {
        
        session_start();

        isAdmin();

        $servicios = Servicio::all();

        // Renderizar al View
        $router->render('servicios/index', [
            'nombre' => $_SESSION['nombre'],
            'servicios' => $servicios
        ]);
    }

    //m | Crear
    public static function crear(Router $router) {

        session_start();

        isAdmin();

        $servicio = new Servicio;
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio->sincronizar($_POST);

            $alertas = $servicio->validar();

            if(empty($alertas)) {
                $servicio->guardar();
                header('Location: /servicios');
            }
        }

        // Renderizar al View
        $router->render('servicios/crear', [
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);

    }

    //m | Actualizar
    public static function actualizar(Router $router) {

        session_start();

        isAdmin();

        if(!is_numeric($_GET['id'])) return;
        $servicio = Servicio::find($_GET['id']);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servicio->sincronizar($_POST);

            $alertas = $servicio->validar();

            if(empty($alertas)) {
                $servicio->guardar();
                header('Location: /servicios');
            }
        }
       
        // Renderizar al View
        $router->render('servicios/actualizar', [
            'nombre' => $_SESSION['nombre'],
            'servicio' => $servicio,
            'alertas' => $alertas
        ]);
    }

    //m | Eliminar
    public static function eliminar() {
        session_start();
        isAdmin();
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $servicio = Servicio::find($id);

            $servicio->eliminar();
            header('Location: /servicios');
        }
    }
}