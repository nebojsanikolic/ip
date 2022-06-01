<?php
require 'flight/Flight.php';
require '../DAO.php';

Flight::route('/', function(){
    echo 'hello world!';
});
Flight::route('POST /students/@id', function($id){
    $dao = new DAO();
    echo json_encode($dao->getStudent($id));
    
});
Flight::route('PUT /students/@id', function($id){
    $dao = new DAO();
    $ime = Flight::request()->data->ime;
    $prezime = Flight::request()->data->prezime;
    $indeks = Flight::request()->data->indeks;
    echo json_encode($dao->updateStudent($id,$ime,$prezime,$indeks));
});

Flight::start();
