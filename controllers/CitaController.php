<?php

namespace Controllers;

use MVC\Router;

class CitaController
{

    //m | Index
    public static function index(Router $router)
    {

        session_start();

        //f | comprueba si el usuario esta autenticado o no
        isAuth();

        // Renderizar a la Vista View
        $router->render('cita/index', [
            'nombre' => $_SESSION['nombre'],
            'id' => $_SESSION['id']
        ]);
    }
}
