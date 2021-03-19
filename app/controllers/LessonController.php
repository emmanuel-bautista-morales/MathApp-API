<?php
    namespace Controllers;
    Use Models\Lesson;

    class LessonController {

        public static function all(){
            return Lesson::all();  
        }

        public static function create($request) {
            $data = [];
            parse_str($request, $data);
            $title = $data['title'];
            $content = $data['content'];
            $id_signature = $data['id_signature'];

           Lesson::create([
                'title' => $title,
                'content' => $content,
                'id_signature' => $id_signature
            ]);
        }
        public static function show($id){
            return Lesson::show($id);
        }
        
        public static function delete($id){
            Lesson::delete($id);

        }
    }
?>