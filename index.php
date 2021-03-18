<?php
    require 'vendor/autoload.php';
    
    use Database\DB;

    

    require 'routes/routes.php';
    DB::connect();
?>