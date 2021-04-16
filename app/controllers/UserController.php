<?php
    namespace Controllers;
    Use Models\User;

    class UserController {

        public static function create($request) {
            
            $data = [];
            parse_str($request, $data);
            // print_r($data);
            
            $username = $data['username'];
            $email = $data['email'];
            $pwd = $data['pwd'];

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
?>