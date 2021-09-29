<?php
function dd(...$variable){
     foreach ($variable as $var){
         var_dump($var);
         echo "<br/>";
     }
     die();
}

function isPost(){
    return ($_SERVER["REQUEST_METHOD"] === "POST");
}

function loadView($vista,$params){
    extract($params);
    include($_SERVER['DOCUMENT_ROOT'].'/../views/'.$vista.'.view.php') ;
}

function cfsr(){
    if (parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']) die('Anti-CSRF');
    else return true;
}

function isRequired($nomCamp, &$errors){
    if (empty($_POST[$nomCamp]) || $nomCamp === ""){
        $errors[] = "El $nomCamp es necessari";
        return null;
    }else{
        return trim(htmlspecialchars($_POST[$nomCamp]));
    }
}

function isNumeric($nomCamp, &$errors){
    if (is_numeric($_POST[$nomCamp])){
        return trim(htmlspecialchars($_POST[$nomCamp]));
    }else{
        $errors[] = "El $nomCamp no es numeric";
        return null;
    }
}
function filtroStars($nomCamp, &$errors){
    if ($_POST[$nomCamp] <= 5 && $_POST[$nomCamp] >= 1){
        return trim(htmlspecialchars($_POST[$nomCamp]));
    }else{
        $errors[] = "El camp $nomCamp te que tindrer un valor entre 1-5";
        return null;
    }
}

function saveFile($nomcamp,$type,$directori,&$errors){
    if ($_FILES[$nomcamp]['type'] == $type){
        $nomFitxer = $_FILES[$nomcamp]['name'];
        if (move_uploaded_file($_FILES['foto']['tmp_name'],"$directori/".$nomFitxer )){
            return $nomFitxer;
        }else{
            $errors[] = 'No es pot muntar el fitxer';
        }
    }else{
        $errors[] = 'El fitxer no es '.$type;
    }
}
function nameLenght($nomCamp, &$errors){
    if (strlen($_POST[$nomCamp]) >= 10 && strlen($_POST[$nomCamp]) <= 30){
        return trim(htmlspecialchars($_POST[$nomCamp]));
    }else{
        $errors[] = "El $nomCamp te que ser entre 10 i 30";
        return null;
    }
}
function contrasenyaSegura($nomCamp, &$errors){
    if (preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/',$_POST[$nomCamp])){
        return trim(htmlspecialchars($_POST[$nomCamp]));
    }else{
        $errors[] = "La contrasenya te que ser entre minim de 8 lletres, contindrer i minuscules majuscules, un numero y algun caracter especial com un .";
        return null;
    }
}

function compararContrseñas($nomCamp1, $nomCamp2, &$errors){
    if ($_POST[$nomCamp1] !== $_POST[$nomCamp2]){
        $errors[] = "Les contrasenyes tenen que ser iguals";
        return null;
    }
}

