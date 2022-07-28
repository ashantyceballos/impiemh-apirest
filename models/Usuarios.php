<?php
    //Archivo que contiene los querys necesarios para realizar las transacciones en las tablas
    //Clase general para los productos
    class Usuario extends Conectar {

        public function get_usuario(){
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT email,password FROM usuarios WHERE estado=1";
            $sql = $conectar -> prepare($sql);
            $sql -> execute();
            return $resultado = $sql -> fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function login(Request $request){
            if (!Auth::attempt($request->only('email', 'password'))){
                return response()
                    ->json(['message' => "No autorizado"], 401);
            }
    
            $user= User::where('email', $request['email'])->firstOrFail();
    
            $token = $user->createToken('auth_token')->plainTextToken;
    
            return response()
                ->json([
                    'message'=>'Hi '.$user->name,
                    'accessToken' => $token,
                    'token_type' => 'Bearer',
                    'user' => $user,
                ]);
        }
    
        public function logout(){
            auth()->user()->tokens()->delete();
    
            return [
                'message' => 'Ha cerrado sesión correctamente y el token se eliminó con éxito'
            ];
        }

    }