<?php

class MenuModel
{

    private $Connection;

    function __construct($Connection)
    {
        $this->Connection = $Connection;
    }


    function listUser($cod_user)
    {
        $sql = "SELECT * FROM ODONTOK.USER WHERE
        COD_USER = '$cod_user'";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }

    function numRegister()
    {
        $sql = "SELECT count(*) FROM ODONTOK.USER";
        $this->Connection->query($sql);
        return $this->Connection->fetchAll();
    }
}
