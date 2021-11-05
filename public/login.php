<?php
session_start();
$mail = require_once ('../mailer.php');
require_once ("../kernel.php");
require_once($route_config.'menu.php');
$errors = [];
$paginaView = 'login';
if (isPost() && cfsr()){
    try {
        $email =  isRequired('usuarioLogin');
    }catch (\BatoiPOP\Exceptions\RequiredField $e){
        $errors[$e->getField()] = $e->getMessage();
    }
    if (!empty($_POST['forgot']) && $_POST['forgot'] == 'on'){
        try {
            $user = $query->findByEmail('users',$email);
            if (!$user){
                throw new Exception('No hi ha usuari');
            }
            $token_recup = generar_token_seguro(60);
            $query->update('users',$user->id,createUpdate(compact('token_recup')));
            $mail->setFrom('carlosmonchomolla@gmail.com','123456789.B');

            $mail->addAddress($user->email, $user->name);

            $mail->isHTML(true);

            $mail->Subject = 'Forgot Password';

            $mail->Body = "Utilitza el seguent <a href='http://projecte.dwes.my/forgot.php?email=".$user->email."&token=".$token_recup."'>enllaç</a> per canviar la contraseña";

            $mail->send();

            echo 'El gmail ha sigut enviat';

        }catch (Exception $e){
            echo "El gmail no ha sigut enviat. Mailer error: {$e->getMessage()}";
        }
    } else{
        try {
            $password = isRequired('contraseñaLogin');
        }catch (\BatoiPOP\Exceptions\RequiredField $e){
            $errors[$e->getField()] = $e->getMessage();
        }
    }
    if (!count($errors)){

        try {
            $user = $query->login('users',$email,$password);
            if ($user == null) {
                throw new \Exception('la contraseña no es correcta');
            }
        }catch (Exception $e){
            $errors[] = $e->getMessage();
        }
        if (!count($errors)){
            $_SESSION['user'] = serialize($user);
            header('location:/index.php');
        }else{
            loadView('index',compact('menu', 'errors','paginaView'));
        }
    }
}
loadView('index',compact('menu','errors', 'paginaView'));
