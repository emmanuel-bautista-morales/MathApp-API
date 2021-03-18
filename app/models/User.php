<?php
    namespace Models;
    use Database\DB;

    class User {
        public static function create($attributes = []) {
            if (sizeof($attributes) > 0) {
                // almacenar instancia de base de datos
                $db = DB::get_database();
                // preparar consulta
                $stmt = $db->prepare("INSERT INTO users (username, email, pwd) VALUES (:username, :email, :pwd)");
                
                if ($stmt->execute(array(':username' => $attributes['username'], 
                    ':email' => $attributes['email'], ':pwd' => $attributes['pwd']))) {
                        return true;
                    } else {
                        return false;
                    }
                return true;
            } else {
                return false;
            }
        }
    }
?>