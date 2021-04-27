<?php

namespace  Models;

use Database\DB;
use PDO;

class Progress
{
    public static function create($attributes = [])
    {
        if (sizeof($attributes) > 0) {
            // almacenar instancia de base de datos
            $db = DB::get_database();
            // eliminar el progreso actual del usuario
            $stmt = $db->prepare("SELECT * FROM user_progress WHERE user_id=:user_id");
            $stmt->execute([":user_id" => $attributes['user_id']]);

            if ($stmt->rowCount() > 0) {
                $stmt = $db->prepare("UPDATE user_progress SET lesson_id = :lesson_id WHERE user_id = :user_id");
                
                if ($stmt->execute(array(
                    ':user_id' => $attributes['user_id'],
                    ':lesson_id' => $attributes['lesson_id']
                ))) {
                    return true;
                } else {
                    return false;
                }
            } else {
                $stmt = $db->prepare("INSERT INTO user_progress (user_id, lesson_id) VALUES (:user_id, :lesson_id)");

                if ($stmt->execute(array(
                    ':user_id' => $attributes['user_id'],
                    ':lesson_id' => $attributes['lesson_id']
                ))) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            return false;
        }
    }
}
