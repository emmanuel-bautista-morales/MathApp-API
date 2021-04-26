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
           $courses_list = array();
           //verificamos que existan registros
           if($stmt->rowCount() > 0){
               $courses = array();//array para almacenar los datos
               $i=0;
               while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                   $courses[$i]=$row;
                   $i++;
               }
               
               foreach ($courses as $course) {
                   // obtiene las lecciones del curso
                    $course['lessons'] = self::select_all_where('lessons', 'course_id', $course['id']);
                    // obtiene los tests del curso
                    $course['tests'] = self::select_all_where('tests', 'course_id', $course['id']);
                    $lessons = [];
                    $test_list = [];
                    $questions = [];

                    // obtiene los experimentos de cada lección
                    foreach ($course['lessons'] as $lesson) {
                        $lesson['experiments'] = self::select_all_where('experiments', 'lesson_id',$lesson['id']);
                        array_push($lessons, $lesson);
                    }

                    // obtiene las preguntas dee cada test
                    foreach ($course['tests'] as $test) {
                        $test['questions'] = self::select_all_where('questions', 'test_id', $test['id']);

                        foreach ($test['questions'] as $question) {
                            $question['answers'] = self::get_answers($question['id']);
                            array_push($questions, $question);
                        }
                        
                        $test['questions'] = $questions;
                        array_push($test_list, $test);
                    }
                    
                    $course['lessons'] = $lessons;
                    $course['tests'] = $test_list;
                    

                    array_push($courses_list, $course);
               }
               return $courses_list;
            // return [];
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

        private static function select_all_where($table, $field_name, $value) {
            $db = DB::get_database();
            $stmt = $db->prepare("select * from $table where $field_name= :$field_name");
            $stmt->execute([":$field_name" => $value]);
    
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

        private static function get_answers($question_id) {
            $db = DB::get_database();
            $stmt = $db->prepare("select answers.id, answers.answer, correct from questions_answers inner join answers on answers.id = answer_id where question_id = :question_id");
            $stmt->execute([":question_id" => $question_id]);
    
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