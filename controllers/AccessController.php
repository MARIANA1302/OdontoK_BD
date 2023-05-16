<?php
require_once "models/AccessModel.php";
require_once "views/AccessView.php";

class AccessController
{

    //Funcion encargada de mostrar el formulario de inicio de session
    function validateClient()
    {

        $AccessView = new AccessView(); //Crea un objeto vista de inicio de sesion
        $AccessView->showFormSession(); //Muestra el formulario

    }

    //Funcion encargada de validar los datos enviados a traves del formulario
    //de inicio de sesion. 
    function validateFormSession($array)
    {


        $usser = $array['usser']; //Obtiene el usuario enviado a traves del formulario
        $password_user = $array['password_user']; //Obtiene el password enviado a traves del forumario

        if (empty($usser)) { //Valida que el usuario si haya sido ingresado
            exit("El usuario es obligatorio");
        }
        if (empty($password_user)) { //Valida que la contraseña si haya sido ingresada
            exit("La clave es obligatoria");
        }

        $Connection = new Connection(); //Crea una conexion

        $AccessModel = new AccessModel($Connection); //Crea un acces model

        //Obtener el resultado de la consulta realizada a traves del modelo
        $array_access = $AccessModel->validateFormSession($usser, $password_user);
        if ($array_access) {
            
            
                    $_SESSION['cod_user'] = $array_access[0]->cod_user; //Obtener el id del usuario encontrado
                    $_SESSION['auth'] = 'OK';
                
            
        }

        header('Location: index.php');
    }

    function closeSession()
    {

        $response = array();

        session_unset();
        session_destroy();
        $_SESSION = array();

        $response['message'] = "Se ha cerrado la sesion";

        exit(json_encode($response));
    }
}
