<?php
    namespace Controllers;

    use Lib\Validator;
    Use Models\User;

    class UserController {

        public static function create($request) {
            
            $data = [];
            parse_str($request, $data);
            // print_r($data);
            
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
    }
?>