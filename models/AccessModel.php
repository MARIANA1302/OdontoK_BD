<?php
class AccessModel {
    //Atributos
    private $Connection;
    
    //Metodo constructor
    function __construct( $Connection ){
        $this->Connection = $Connection; 
    }
    
    //Funcion para validar un inicio de sesion
    function validateFormSession($USER,$PASSWORD_USER) {
        $sql=" SELECT * FROM ODONTOK.USER 
               WHERE USSER ='$USER' 
               AND PASSWORD_USER='$PASSWORD_USER' ";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //Funcion para traer el estado de la persona
    function validateState($cod_state){
        $sql = "SELECT * FROM ODONTOK.STATE 
                WHERE COD_STATE = $cod_state";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}
?>