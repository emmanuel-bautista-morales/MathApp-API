<?php 
namespace Models;
use Database\DB;
use PDO;

class Lesson {

    public static function all(){
         // almacenar instancia de base de datos
        $db = DB::get_database();
        //preparar la consulta
        $stmt = $db->prepare("select * from lessons");
        $stmt->execute();
        //verificamos que existan registros
        if($stmt->rowCount() > 0){
            $lessons = array();//array para almacenar los datos
            $i=0;
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $lessons[$i]=$row;
                $i++;
            }
            return $lessons;
        }else{
            return [];
        }
        
    }
    
    public static function create($attributes = []) {
        if (sizeof($attributes) > 0) {
            // almacenar instancia de base de datos
            $db = DB::get_database();
            // preparar consulta
            $stmt = $db->prepare("INSERT INTO lessons (title, content, lesson_id) VALUES (:title, :content, :lesson_id)");
            
            if ($stmt->execute(array(':title' => $attributes['title'], ':content' => $attributes['content'], ':lesson_id' => $attributes['lesson_id']))) {
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
       $stmt=$db->prepare("select * from lessons where id= :id");
       $stmt->execute(['id'=>$id]);
       if($stmt->rowCount() > 0){
            $lessons = array();//array para almacenar los datos
            
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $lessons[0]=$row; 
            }

            return $lessons[0];

        }else{
            return null;
        }
 
    }

    public static function delete($id){
        // almacenar instancia de base de datos
        $db = DB::get_database();
        $msg['message'] = '';

        //preparar consulta
        $stmt = $db->prepare("delete from lessons where id = :id");
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