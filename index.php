<?php
    header("Content-type: application/json; charset= utf8");
    require 'vendor/autoload.php';
    
    use Database\DB;

    DB::connect();

    require 'routes/routes.php';
    
?>