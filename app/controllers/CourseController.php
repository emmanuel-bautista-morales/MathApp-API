<?php
    namespace Controllers;

use Lib\Validator;
use Models\Course;

    class CourseController {

        public static function all() {
            $courses = Course::all();

            return json_encode([
                'status' => 'ok',
                'data' => $courses
            ]);
        }

        public static function create($request) {
            $data = [];
            parse_str($request, $data);
            $name = $data['name'];

            $validator = new Validator();

            $validator->validate($data, [
                'name' => ['required']
            ]);

            if ($validator->error()) {
                return json_encode([
                    'status' => 'error',
                    'errors' => $validator->error()
                ]);
            } else {
                $value = Course::create([
                    'name' => $name
                ]);
    
                if ($value) {
                    return json_encode([
                        'status' => 'ok',
                        'message' => 'Curso creado correctamente'
                    ]);
                } else {
                    return json_encode([
                        'status' => 'error',
                        'message' => 'Ocurrió un error al crear el curso'
                    ]);
                }
            }
            
        }

        public static function show($id){
            $experiment = Course::show($id);
    
            if ($experiment) {
                return json_encode([
                    'status' => 'ok',
                    'data' => $experiment
                ]);
            } else {
                return json_encode([
                    'status' => 'error',
                    'message' => 'No se encontró ningún curso con ese id'
                ]);
            }
        }

        public static function delete($id){
            $value = Course::delete($id);
    
            if ($value) {
                return json_encode([
                    'status' => 'ok',
                    'message' => 'Curso eliminado'
                ]);
            } else {
                return json_encode([
                    'status' => 'error',
                    'message' => 'Ocurrió un error al eliminar el curso'
                ]);
            }
        }

        // public static function get_lessons($course_id) {
        //     $lessons = Course::get_lessons($course_id);

        //     if ($lessons) {
        //         return json_encode([
        //             'status' => 'ok',
        //             'data' => $lessons
        //         ]);
        //     } else {
        //         return json_encode([
        //             'status' => 'error',
        //             'message' => 'No se econtraron lecciones para ese curso'
        //         ]);
        //     }
        // }

        
    }
?>