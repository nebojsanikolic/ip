<?php 
    require_once 'DAO.php';
    $dao = new DAO();
    var_dump($dao->updateStudent(1,'marko','markovic','155/2018'));

?>