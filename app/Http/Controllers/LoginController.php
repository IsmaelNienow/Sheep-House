<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    Public Function index(Request $request){

        $erro = '';
        if($request->get('erro')==1){
            $erro = 'Usuário ou senha não existe';
            
        }
        if($request->get('erro')==2){
            $erro = 'Necessário realizar login para ter acesso a página';
        }

        return view('site.Login',['titulo' => 'Login','erro' => $erro]);
    }

    public function autenticar(Request $request){

        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];
    
        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];
    
        $request->validate($regras, $feedback);
    
        // Recuperando os parâmetros do formulário
        $email = $request->get('usuario');
        $password = $request->get('senha');
                
        // Iniciar o Model User
        $user = User::where('email', $email)->first();
    
        if($user) {
            
            // Verificar se a senha fornecida corresponde ao hash armazenado no banco de dados
            if(password_verify($password, $user->password)) {
                // Se a senha estiver correta, iniciar a sessão e redirecionar o usuário
                
                session_start();
                $_SESSION['nome'] = $user->name;
                $_SESSION['email'] = $user->email;
    
                return redirect()->route('app.home');
            }
        }
    
        // Se o usuário não existir ou a senha estiver incorreta, redirecionar para a página de login com mensagem de erro
        return redirect()->route('site.login',['erro' => 1]);
    }
    

    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
    
}
