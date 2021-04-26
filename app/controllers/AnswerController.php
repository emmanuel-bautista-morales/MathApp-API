<?php
    namespace Controllers;

    use Lib\Validator;
    use Models\Answer;

    class AnswerController {
        public static function create($request) {
            $data = [];
            $data = json_decode($request, true);

            $validator = new Validator();

            $validator->validate($data, [
                'answer' => ['required'],
                // 'correct' => ['required'],
            ]);

            if ($validator->error()) {
                return json_encode([
                    'status' => 'error',
                    'errors' => $validator->error()
                ]);
            } else {
                $value = Answer::create($data);
                if ($value) {
                    return json_encode([
                        'status' => 'ok',
                        'message' => 'Respuesta creado correctamente'
                    ]);
                } else {
                    return json_encode([
                        'status' => 'error',
                        'message' => 'Hubo un error al crear la respuesta'
                    ]);
                }
            }
        }
    }
?>