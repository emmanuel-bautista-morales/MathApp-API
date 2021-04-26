<?php
    namespace Models;
    use Database\DB;

    class Question {
        public static function create($attributes=[]) {
            if (sizeof($attributes) > 0) {
                $db = DB::get_database();
                $smt = $db->prepare("INSERT INTO questions (question, test_id) VALUES (:question, :test_id)");

                if ($smt->execute(array(
                    ':question' => $attributes['question'],
                    ':test_id' => $attributes['test_id'],
                ))) {
                   
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
?>