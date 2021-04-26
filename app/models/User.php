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

        public static function add_score($attributes = []){
            if (sizeof($attributes) > 0) {
                // almacenar instancia de base de datos
                $db = DB::get_database();
                // preparar consulta
                $stmt = $db->prepare("INSERT INTO users_tests (user_id, test_id, score) VALUES (:user_id, :test_id, :score)");
                
                if ($stmt->execute(array(':user_id' => $attributes['user_id'], 
                    ':test_id' => $attributes['test_id'], ':score' => $attributes['score']))) {
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