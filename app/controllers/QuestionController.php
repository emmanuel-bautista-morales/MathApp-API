<?php
    namespace Controllers;
    use Lib\Validator;
    use Models\Question;

    class QuestionController {
        public static function create($request) {
            $data = [];
            $data = json_decode($request, true);

            $validator = new Validator();

            $validator->validate($data, [
                'question' => ['required'],
                'test_id' => ['required', 'numeric'],
            ]);

            if ($validator->error()) {
                return json_encode([
                    'status' => 'error',
                    'errors' => $validator->error()
                ]);
            } else {
                $value = Question::create($data);
                if ($value) {
                    return json_encode([
                        'status' => 'ok',
                        'message' => 'Pregunta creado correctamente'
                    ]);
                } else {
                    return json_encode([
                        'status' => 'error',
                        'message' => 'Hubo un error al crear la pregunta'
                    ]);
                }
            }
        }
    }
?>