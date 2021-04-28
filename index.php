<?php
    // cors
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Allow: GET, POST, OPTIONS, PUT, DELETE");
    // json
    //  header("Content-type: application/json; charset= utf8");
    require 'vendor/autoload.php';
    require './app/lib/helpers.php';
    
    use Database\DB;

    DB::connect();

    require 'routes/routes.php';
    
?>