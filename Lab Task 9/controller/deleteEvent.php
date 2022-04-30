<?php 

require_once '../model/model.php';

if (deleteEvent($_GET['id'])) {
    header('Location: ../view/profile.php');
}

 ?>