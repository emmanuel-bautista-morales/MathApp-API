<?php 
namespace Controllers;

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
        $id_lesson = $data['id_lesson'];
        $value =  Experiment::create([
            'title' => $title,
            'content' => $content,
            'id_lesson' => $id_lesson
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