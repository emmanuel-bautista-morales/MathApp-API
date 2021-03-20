<?php
    namespace Models;
    Use Database\DB;
    Use PDO;

    class Course {
        public static function all(){
            // almacenar instancia de base de datos
           $db = DB::get_database();
           //preparar la consulta
           $stmt = $db->prepare("select * from courses");
           $stmt->execute();
           //verificamos que existan registros
           if($stmt->rowCount() > 0){
               $courses = array();//array para almacenar los datos
               $i=0;
               while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                   $courses[$i]=$row;
                   $i++;
               }
               return $courses;
           }else{
               return [];
           }
           
       }

       public static function create($attributes = []) {
            if (sizeof($attributes) > 0) {
                // almacenar instancia de base de datos
                $db = DB::get_database();
                // preparar consulta
                $stmt = $db->prepare("INSERT INTO courses (name) VALUES (:name)");
                
                if ($stmt->execute(array(':name' => $attributes['name']))) {
                        return true;
                    } else {
                        return false;
                    }
            } else {
                return false;
            }
        }

        public static function show($id){
            // almacenar instancia de base de datos
            $db = DB::get_database(); 
            
            // preparar consulta
            $stmt=$db->prepare("select * from courses where id= :id");
            $stmt->execute(['id'=>$id]);
            if($stmt->rowCount() > 0){
                 $courses = array();//array para almacenar los datos
                 
                 while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                     $courses[0]=$row; 
                 }
     
                 return $courses[0];
     
             }else{
                 return null;
             }
      
        }

        public static function delete($id){
            // almacenar instancia de base de datos
            $db = DB::get_database();
    
            //preparar consulta
            $stmt = $db->prepare("delete from courses where id = :id");
            $stmt->execute(['id'=>$id]);
            //verificamos que se haya eliminado un registro
            if($stmt->rowCount() >0 ){
                return true;
            }else{
                return false;
            }
        }
     

    }
    
?>