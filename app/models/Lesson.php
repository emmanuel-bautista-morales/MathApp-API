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
            header("Content-type: application/json; charset= utf8");
            echo json_encode($lessons);
        }else{
            echo json_encode(['message'=>'No hay datos']);
        }
        
    }
    
    public static function create($attributes = []) {
        $msg['message'] = '';
        if (sizeof($attributes) > 0) {
            // almacenar instancia de base de datos
            $db = DB::get_database();
            // preparar consulta
            $stmt = $db->prepare("INSERT INTO lessons (title, content, id_signature) VALUES (:title, :content, :id_signature)");
            
            if ($stmt->execute(array(':title' => $attributes['title'], ':content' => $attributes['content'], ':id_signature' => $attributes['id_signature']))) {
                $msg['message'] = 'Almacenado correctamente';
                } else {
                 $msg['message'] = 'No se almacenaron los datos';
                }
          
        } else {
            $msg['message'] = 'Verifique que haya ingresado todos los datos';
        }
        header("Content-type: application/json; charset= utf8");
        echo  json_encode($msg);  
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
        header("Content-type: application/json; charset= utf8");
        echo json_encode($lessons);

        }else{
        header("Content-type: application/json; charset= utf8");
        echo json_encode(['message'=>'No se encotró ese registro']);
       
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
            $msg['message'] = 'eliminado';
        }else{
            $msg['message'] = 'no eliminado';
        }
        header("Content-type: application/json; charset= utf8");
        echo  json_encode($msg);  
    }
}

?>