<?php
require_once("autoload.php");

class Post extends Conexion
{
    private $intUser_id;
    private $strTitle;
    private $strDescription;
    private $created_at;
    private $conexion;

    public function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function insertPost(int $user_id, string $title, string $description)
    {
        $this->strUser_id = $user_id;
        $this->strTitle = $title;
        $this->strDescription = $description;
        $this->created_at = date('Y-m-d');
        $sql = "INSERT INTO posts (user_id, title, description, created_at) VALUES(?,?,?,?)";
        $insert = $this->conexion->prepare($sql);
        $arrData = array($this->strUser_id, $this->strTitle, $this->strDescription, $this->created_at);
        $resInsert = $insert->execute($arrData);
        $idInsert = $this->conexion->lastInsertId();
        return $idInsert;
    }

    public function updatePost(int $id, string $title, string $description)
    {
        $this->strTitle = $title;
        $this->strDescription = $description;
        $sql = "UPDATE posts SET title=?, description=? WHERE id = $id";
        $update = $this->conexion->prepare($sql);
        $arrData = array($this->strTitle, $this->strDescription);
        $resExecute = $update->execute($arrData);
        return $resExecute;
    }

    public function deletePost(int $id)
    {
        $sql = "DELETE FROM posts WHERE id = ?";
        $arrWhere = array($id);
        $delete = $this->conexion->prepare($sql);
        $del = $delete->execute($arrWhere);
        return $del;
    }

    public function getPosts(int $id)
    {
        $sql = "SELECT * FROM posts where user_id=?";
        $arrWhere = array($id);
        $query = $this->conexion->prepare($sql);
        $query->execute($arrWhere);
        $request = $query->fetchall(PDO::FETCH_ASSOC);
        return $request;
    }
}
