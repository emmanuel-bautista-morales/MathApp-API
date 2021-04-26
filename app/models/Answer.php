<?php
    namespace Models;
    use Database\DB;

    class Answer {
        public static function create($attributes=[]) {
            if (sizeof($attributes) > 0) {
                $db = DB::get_database();
                $smt = $db->prepare("INSERT INTO answers (answer, correct) VALUES (:answer, :correct)");

                if ($smt->execute(array(
                    ':answer' => $attributes['answer'],
                    ':correct' => $attributes['correct'],
                ))) {
                    $answerId = $db->lastInsertId();
                    $smt = $db->prepare("INSERT INTO questions_answers (question_id, answer_id) VALUES (:question_id, :answer_id)");

                    if ($smt->execute(array(
                        ':question_id' => $attributes['question_id'],
                        ':answer_id' => $answerId,
                    )))  {
                        return true;
                    } else {
                        return false;
                    }
                    
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
?>