<?php 
namespace Controllers;

use Lib\Validator;
use Models\Experiment;

class ExperimentController{
    public static function all(){
        $experiments = Experiment::all();

        return json_encode([
            'status' => 'ok',
            'data' => $experiments
        ]);
    }

    public static function create($request){
        $data = [];
        parse_str($request, $data);
        $title = $data['title'];
        $content = $data['content'];
        $lesson_id = $data['lesson_id'];

        $validator = new Validator();

        $validator->validate($data, [
            'title' => ['required'],
            'content' => ['required'],
            'lesson_id' => ['required']
        ]);

        if ($validator->error()) {
            return json_encode([
                'status' => 'error',
                'errors' => $validator->error()
            ]);
        } else {
            $value =  Experiment::create([
                'title' => $title,
                'content' => $content,
                'lesson_id' => $lesson_id
            ]);
    
            if ($value) {
                return json_encode([
                    'status' => 'ok',
                    'message' => 'Experimento creado'
                ]);
            } else {
                return json_encode([
                    'status' => 'error',
                    'message' => 'Ocurrió un error al crear el experimento'
                ]);
            }
        }
    }

    public static function show($id){
        $experiment = Experiment::show($id);

        if ($experiment) {
            return json_encode([
                'status' => 'ok',
                'data' => $experiment
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'No se encontró ingún experimento con ese id'
            ]);
        }
    }

    public static function delete($id){
        $value = Experiment::delete($id);

        if ($value) {
            return json_encode([
                'status' => 'ok',
                'message' => 'Experimento eliminado'
            ]);
        } else {
            return json_encode([
                'status' => 'error',
                'message' => 'Ocurrió un error al eliminar el experimento'
            ]);
        }
    }
}

?>