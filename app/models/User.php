<?php
    namespace Models;


use Database\DB;

use PDO;
    class User {
        public static function login($attributes=[]){
            if(sizeof($attributes)>0){
                // almacenar instancia de base de datos
                $db = DB::get_database();
                $stmt=$db->prepare("select * from users where email= :email and pwd =:pwd");
                $stmt->execute(array(':email'=>$attributes['email'], ':pwd'=>$attributes['pwd']));
                $cont= $stmt->rowCount();
                $arrayList=[];
                if($cont > 0){
                    $user = array();//array para almacenar los datos
                  
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                       $arrayList= $user['user']=$row; 
                    } 
                    $arrayList['answered_tests']=self::get_answered_tests($user['user']['id']);
                        
                        return $arrayList; 
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
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


        private static function get_answered_tests($user_id) {
            $db = DB::get_database();
            $stmt = $db->prepare("select users_tests.test_id from users_tests inner join users on users_tests.user_id= users.id where users.id=:user_id");
            $stmt->execute([":user_id" => $user_id]);
    
            if ($stmt->rowCount() > 0) {
                $array = [];//array para almacenar los datos
                $i = 0;
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $array[$i]=$row;
                    $i++; 
                }
                return $array;
            } else {
                return [];
            }
        }
    }

    
?>