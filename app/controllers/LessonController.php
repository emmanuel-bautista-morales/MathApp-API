<?php
    namespace Controllers;

    use Lib\Validator;
    Use Models\Lesson;

    class LessonController {

        public static function all(){
            $lessons = Lesson::all();  

            return json_encode([
                'status' => 'ok',
                'data' => $lessons
            ]);
        }

        public static function create($request) {
            $data = [];
            parse_str($request, $data);
            $title = $data['title'];
            $content = $data['content'];
            $id_signature = $data['course_id'];

            $validator = new Validator();

            $validator->validate($data, [
                'title' => ['required'],
                'content' => ['required'],
                'course_id' => ['required'],
                'course_id' => ['numeric']
            ]);

            if ($validator->error()) {
                return json_encode([
                    'status' => 'error',
                    'errors' => $validator->error()
                ]);
            } else {
                $value = Lesson::create([
                    'title' => $title,
                    'content' => $content,
                    'course_id' => $id_signature
                ]);
    
                if ($value) {
                    return json_encode([
                        'status' => 'ok',
                        'message' => 'Lección creada correctamente'
                    ]);
                } else {
                    return json_encode([
                        'status' => 'error',
                        'message' => 'Hubo un error al crear la lección'
                    ]);
                }
            }          
        }

        public static function show($id){
            $lesson = Lesson::show($id);

            if ($lesson) {
                return json_encode([
                    'status' => 'ok',
                    'data' => $lesson
                ]);
            } else {
                return json_encode([
                    'status' => 'error',
                    'message' => 'No se encontraron lecciones'
                ]);
            }

        }
        
        public static function delete($id){
            $value = Lesson::delete($id);

            if ($value) {
                return json_encode([
                    'status' => 'ok',
                    'message' => 'Lección eliminada'
                ]);
            } else {
                return json_encode([
                    'status' => 'error',
                    'message' => 'Ocurrió un error al eliminar la lección'
                ]);
            }
        }
    }
?>