<?php
namespace Models;
use Database\DB;
use PDO;
class Experiment{

  public static function all(){
   //instancia de la base de datos
    $db=DB::get_database();
    $stmt=$db->prepare("select * from experiments");
    $stmt->execute();

    if($stmt->rowCount()){
        $experiments=array();
        $i=0;

        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            $experiments[$i]=$row;
            $i++;
        }
        return $experiments;
    }else{
          return [];
    }

  }


  public static function create($attributes = []){
    $msg['message'] = '';
    if (sizeof($attributes) > 0) {
      // almacenar instancia de base de datos
      $db = DB::get_database();
      // preparar consulta
      $stmt = $db->prepare("INSERT INTO experiments (title,content,lesson_id) VALUES (:title, :content, :lesson_id)");
      
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
    $stmt=$db->prepare("select * from experiment where id= :id");
    $stmt->execute(['id'=>$id]);
    if($stmt->rowCount() > 0){
      $experiments = array();//array para almacenar los datos
      
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $experiments[0]=$row; 
      }

      return $experiments[0];
    } else{
      return null;
    }
  }

  public static function delete($id){
      // almacenar instancia de base de datos
      $db = DB::get_database();
      $msg['message'] = '';

      //preparar consulta
      $stmt = $db->prepare("delete from experiment where id = :id");
      $stmt->execute(['id'=>$id]);
      //verificamos que se haya eliminado un registro
      if($stmt->rowCount() >0 ){
          return true;
      }else{
          return false;
      }
  }

}
