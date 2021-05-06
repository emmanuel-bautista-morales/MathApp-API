<?php
    namespace Controllers;

    use Lib\Validator;
    Use Models\User;

    class UserController {

        public static function login($request) {
            $data = json_decode($request, true);
          
            $email = $data['email'];
            $pwd = $data['pwd'];

            $validator = new Validator();

            $validator->validate($data, [
              
                'email' => ['required'],
                'pwd' => ['required']
            ]);

            if ($validator->error()) {
                return json([
                    'status' => 'error',
                    'errors' => $validator->error()
                ]);
            } else {
                $login=User::login([
                    'email' => $email,
                    'pwd' => $pwd
                ]);
                if ($login) {
                    return json([
                        'status' => 'ok',
                        'data' => $login
                    ]);
                } else {
                    return json([
                        'status' => 'error',
                        'message' => 'No se encontro el usuario'
                    ]);
                }
                
                return "Error";
            }
        }

        public static function create($request) {
            $data = json_decode($request, true);
            
            $username = $data['username'];
            $email = $data['email'];
            $pwd = $data['pwd'];

            $validator = new Validator();

            $validator->validate($data, [
                'username' => ['required'],
                'email' => ['required'],
                'pwd' => ['required']
            ]);

            if ($validator->error()) {
                return json_encode([
                    'status' => 'error',
                    'errors' => $validator->error()
                ]);
            } else {
                if (User::create([
                    'username' => $username,
                    'email' => $email,
                    'pwd' => $pwd
                ])) {
                    return json_encode([
                        'status' => 'ok',
                        'message' => 'Usuario creado'
                    ]);
                } else {
                    return json_encode([
                        'status' => 'error',
                        'message' => 'Ocurrió un error al crear un usuario'
                    ]);
                }
                
                return "Error";
            }
        }

        public static function add_score($request) {
            
            $data = [];
            parse_str($request, $data);
            // print_r($data);
            
            $user_id = $data['user_id'];
            $test_id = $data['test_id'];
            $score   = $data['score'];

          
    
            $validator = new Validator();
    
            $validator->validate($data, [
                'user_id' => ['required'],
                'test_id' => ['required'],
                'score'   => ['score']
              
            ]);
    
            if ($validator->error()) {
                return json_encode([
                    'status' => 'error',
                    'errors' => $validator->error()
                ]);
            } else {
                if (User::add_score([
                    'user_id' => $user_id,
                    'test_id' => $test_id,
                    'score'   => $score
                    
                ])) {
                    return json_encode([
                        'status' => 'ok',
                        'message' => 'Calificación del test registrado'
                    ]);
                } else {
                    return json_encode([
                        'status' => 'error',
                        'message' => 'Ocurrió un error registrar la calificacion del test'
                    ]);
                }
                
                return "Error";
            }
        }
    }
?>