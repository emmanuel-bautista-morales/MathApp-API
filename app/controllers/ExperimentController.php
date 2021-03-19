<?php 
namespace Controllers;

use Models\Experiment;

class ExperimentController{
    public static function all(){
        return Experiment::all();
    }

    public static function create($request){
        $data = [];
        parse_str($request, $data);
        $title = $data['title'];
        $content = $data['content'];
        $id_lesson = $data['id_lesson'];
        Experiment::create([
            'title' => $title,
            'content' => $content,
            'id_lesson' => $id_lesson
        ]);
    }

    public static function show($id){
        return Experiment::show($id);
    }

    public static function delete($id){
        Experiment::delete($id);

    }
}

?>