<?php
require_once("autoload.php");

class User extends Conexion
{
    private $strName;
    private $strEmail;
    private $strPassword;
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function insertUser(string $name, string $email, int $password)
    {
        $this->strName = $name;
        $this->strEmail = $email;
        $this->strPassword = $password;
        $sql = "INSERT INTO users (name, email, password) VALUES(?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData = array($this->strName, $this->strEmail, $this->strPassword);
        $resInsert = $insert->execute($arrData);
        $idInsert = $this->conexion->lastInsertId();
        return $idInsert;
    }

    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        $execute = $this->conexion->query($sql);
        $request = $execute->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }

    public function updateUser(int $id, string $name, string $email, string $password)
    {
        $this->strName = $name;
        $this->strEmail = $email;
        $this->strPassword = $password;
        $sql = "UPDATE users SET name=?, email=?, password=? WHERE id = $id";
        $update = $this->conexion->prepare($sql);
        $arrData = array($this->strName, $this->strEmail, $this->strPassword);
        $resExecute = $update->execute($arrData);
        return $resExecute;
    }

    public function getUser(string $email, string $password)
    {
        $sql = "SELECT * FROM users where email=? and password=?";
        $arrWhere = array($email, $password);
        $query = $this->conexion->prepare($sql);
        $query->execute($arrWhere);
        $request = $query->fetch(PDO::FETCH_ASSOC);
        return $request;
    }

    public function delUser(int $id)
    {
        $sql = "DELETE FROM users WHERE id = ?";
        $arrWhere = array($id);
        $delete = $this->conexion->prepare($sql);
        $del = $delete->execute($arrWhere);
        return $del;
    }
}
