<?php
namespace Controllers;

use Lib\Validator;
use Models\Progress;

class ProgressController{
    public static function create($request) {
            
        $data = json_decode($request, true);
        
        $user_id = $data['user_id'];
        $lesson_id = $data['lesson_id'];
      

        $validator = new Validator();

        $validator->validate($data, [
            'user_id' => ['required'],
            'lesson_id' => ['required']
          
        ]);

        if ($validator->error()) {
            return json_encode([
                'status' => 'error',
                'errors' => $validator->error()
            ]);
        } else {
            if (Progress::create([
                'user_id' => $user_id,
                'lesson_id' => $lesson_id,
                
            ])) {
                return json_encode([
                    'status' => 'ok',
                    'message' => 'progreso registrado'
                ]);
            } else {
                return json_encode([
                    'status' => 'error',
                    'message' => 'Ocurrió un error registrar el progreso'
                ]);
            }
            
            return "Error";
        }
    }
}

?>