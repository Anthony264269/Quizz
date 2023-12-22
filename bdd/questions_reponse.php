<?php
require_once('./connexion.php');


if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
}else{
    $id = 1;
}
