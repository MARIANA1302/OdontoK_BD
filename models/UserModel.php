<?php
class UserModel
{
    private $Connection;
    
    //Metodo constrcutor
    function __construct($Connection) {
        $this->Connection = $Connection;
    }


    //Metodo para insertar un usuaro
    function insertUser($cod_role,$cod_document_type,$cod_state,$username,$user_last_name,
    $document_number,$usser,$password){
    
        $sql = "INSERT INTO ODONTOK.USER (COD_USER,COD_ROLE,COD_DOCUMENT_TYPE,COD_STATE,USERNAME,USER_LAST_NAME,DOCUMENT_NUMBER,USSER,PASSWORD_USER)
        VALUES (DEFAULT,$cod_role,$cod_document_type,$cod_state,'$username','$user_last_name','$document_number','$usser','$password')";
        $this->Connection->query($sql);

    }

    function updateUser($cod_user,$cod_role,$cod_document_type,$cod_state,$username,$user_last_name,
    $document_number,$usser,$password){
        $sql = "UPDATE ODONTOK.USER SET COD_ROLE = '$cod_role', COD_DOCUMENT_TYPE = '$cod_document_type',
        COD_STATE = '$cod_state', USERNAME = '$username', USER_LAST_NAME = '$user_last_name',
        DOCUMENT_NUMBER = '$document_number', USSER = '$usser', PASSWORD_USER = '$password' WHERE COD_USER = '$cod_user'";
         $this->Connection->query($sql);
    }

    //Metodo para listar todos los usuarios
    function paginateUser(){
        $sql = "SELECT USSER.COD_USER,USSER.DOCUMENT_NUMBER,USSER.USERNAME,USSER.USER_LAST_NAME,STAT_U.NAME_STATE,ROLE_U.NAME_ROLE
                FROM ODONTOK.USER USSER
                INNER JOIN ODONTOK.STATE STAT_U ON USSER.COD_STATE = STAT_U.COD_STATE
                INNER JOIN ODONTOK.ROLE ROLE_U ON USSER.COD_ROLE = ROLE_U.COD_ROLE;";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }


    //--------------------------------------- LISTAR TABLAS 

    //Metodo para traer en un array todos los tipos de documento
    function paginateDocumentType(){
        $sql = "SELECT * FROM ODONTOK.DOCUMENT_TYPE ";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //Metodo para listar los roles
    function paginateRol(){
        $sql = "SELECT * FROM ODONTOK.ROLE";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //Metodo para listar todos los estados
    function paginateState(){
        $sql = "SELECT * FROM ODONTOK.STATE";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }


    //----------------------------- METODOS PARA BUSCAR
    
    //Metodo para buscar por documento
    function searchUserDocument($document_number){
        $sql = "SELECT USSER.COD_USER,USSER.DOCUMENT_NUMBER,USSER.USERNAME,USSER.USER_LAST_NAME,STAT_U.NAME_STATE,ROLE_U.NAME_ROLE
        FROM ODONTOK.USER USSER
        INNER JOIN ODONTOK.STATE STAT_U ON USSER.COD_STATE = STAT_U.COD_STATE
        INNER JOIN ODONTOK.ROLE ROLE_U ON USSER.COD_ROLE = ROLE_U.COD_ROLE
        WHERE USSER.DOCUMENT_NUMBER = '$document_number'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //Metodo para buscar por estado
    function searchUserState($cod_state){
        $sql = "SELECT USSER.COD_USER,USSER.DOCUMENT_NUMBER,USSER.USERNAME,USSER.USER_LAST_NAME,STAT_U.NAME_STATE,ROLE_U.NAME_ROLE
        FROM ODONTOK.USER USSER
        INNER JOIN ODONTOK.STATE STAT_U ON USSER.COD_STATE = STAT_U.COD_STATE
        INNER JOIN ODONTOK.ROLE ROLE_U ON USSER.COD_ROLE = ROLE_U.COD_ROLE
        WHERE USSER.COD_STATE = '$cod_state' ";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //Metodo para seleccionar un usuario en concreto
    function selectUser($cod_user){
        $sql = "SELECT * FROM ODONTOK.USER WHERE COD_USER = $cod_user";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //---------------- METODOS  PARA REALIZAR VALIDACIONES

    //Saber si un documento ya existe en la base de datos
    function duplicateDocumentNumber($document_number) {
        $sql="SELECT * FROM ODONTOK.USER WHERE DOCUMENT_NUMBER='$document_number'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //Saber si un numero de documento no es repetido
    function duplicateDocumentNumberUpdate($document_number,$cod_user_update){
        $sql="SELECT * FROM ODONTOK.USER WHERE DOCUMENT_NUMBER='$document_number'
        AND COD_USER<> '$cod_user_update'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //Saber si un nombre de usuario esta en la base de datos 
    function duplicateUsser($usser){
        $sql="SELECT * FROM ODONTOK.USER WHERE USSER='$usser'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    //Saber que el nuevo usuario no esta dupli
    function duplicateUsserUpdate($usser,$cod_user_update){
        $sql="SELECT * FROM ODONTOK.USER WHERE USSER='$usser'
        AND COD_USER <> '$cod_user_update'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    
}
?>