<?php 
 namespace  Models;
 use Database\DB;

    class Progress {
        public static function create($attributes = []) {
            if (sizeof($attributes) > 0) {
                // almacenar instancia de base de datos
                $db = DB::get_database();
                // preparar consulta
                $stmt = $db->prepare("INSERT INTO user_progress (user_id, lesson_id) VALUES (:user_id, :lesson_id)");
                
                if ($stmt->execute(array(':user_id' => $attributes['user_id'], 
                    ':lesson_id' => $attributes['lesson_id']))) {
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