<?php
/*  require_once 'NekaKlasa.php';
    require_once 'NekaSimuliranaBaza.php'; 
    ...*/
    require_once 'DAO.php';
    session_start();

$action = isset($_REQUEST["action"])? $_REQUEST["action"] : ""; //provera da li je setovana akcija


if ($_SERVER['REQUEST_METHOD']="POST"){
    //akcije za unos i izmenu
    if ($action == 'update') {
       $id = isset($_POST["id"])? test_input($_POST["id"]) : "";
       $ime = isset($_POST["ime"])? test_input($_POST["ime"]) : ""; 
       $prezime = isset($_POST["prezime"])? test_input($_POST["prezime"]) : ""; 
       $indeks = isset($_POST["indeks"])? test_input($_POST["indeks"]) : ""; 
       if(!empty($id) && !empty($ime) && !empty($prezime) && !empty($indeks)){
           $dao = new DAO();
           $postoji = $dao->getStudentByID($id);
           if($postoji == true){
               $dao->updateStudent($id,$ime,$prezime,$indeks);
               $_SESSION["student"]=$id;
               include 'prikaz.php';
           }
           else{
               $msg = "Ne postoji student sa zadatim ID";
               include 'index.php';

           }
       }
       else{
           $msg = "Popunite sve podatke";
           include 'index.php';
       }
    } 
    
} if ($_SERVER['REQUEST_METHOD']="GET"){
    //akcije za prikaz i brisanje
    if ($action == 'logout') {
        if(isset($_SESSION['student'])){
            session_unset();
            session_destroy();
            include 'index.php';
        }
    } elseif ($action == 'akcijaGet2'){
        //...
    }elseif ($action == 'akcijaGet3'){
        //...
    }
    
} else {
    //...
    header("Location: index.php"); //opciono
    die();
}

//funkcija za preradu unetih podataka
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>