<?php
require_once("autoload.php");
$objUser = new User();
$objPost = new Post();

$action = $_POST['action'];
echo $action;
session_start();
if ($action == "iniciar_sesion") {
    $user = $objUser->getUser($_POST['email'], $_POST['password']);
    if (!empty($user)) {
        $_SESSION["user_id"] = $user["id"];
        header("Location: ./../home.php");
    } else {
        header("Location: ./../index.php");
    }
}

if ($action == "new-post") {
    $post = $objPost->insertPost($_SESSION["user_id"], $_POST['title'], $_POST['description']);
    header("Location: ./../home.php");
} elseif ($action == "update-post") {
    $post = $objPost->updatePost($_POST['id'], $_POST['title'], $_POST['description']);
    header("Location: ./../home.php");
} elseif ($action == "delete-post") {
    $post = $objPost->deletePost($_POST['id']);
    header("Location: ./../home.php");
}
