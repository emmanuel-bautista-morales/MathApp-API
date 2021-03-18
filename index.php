<?php
    require 'vendor/autoload.php';
    
    use Database\DB;

    DB::connect();

    require 'routes/routes.php';
    
?>