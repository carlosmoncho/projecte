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

function isGet(){
    return ($_SERVER["REQUEST_METHOD"] === "GET");
}

function loadView($vista,$params){
    extract($params);
    include($_SERVER['DOCUMENT_ROOT'].'/../views/'.$vista.'.view.php') ;
}

function cfsr(){
    if (parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) != $_SERVER['HTTP_HOST']) die('Anti-CSRF');
    else return true;
}

function isRequired($nomCamp){
    if (empty($_POST[$nomCamp]) || $nomCamp === ""){
        throw new \BatoiPOP\Exceptions\RequiredField($nomCamp);
    }else{
        return trim(htmlspecialchars($_POST[$nomCamp]));
    }
}

function isNumeric($nomCamp){
    if ($_POST[$nomCamp]){
        if (is_numeric($_POST[$nomCamp])){
            return trim(htmlspecialchars($_POST[$nomCamp]));
        }else{
            throw new \BatoiPOP\Exceptions\NoNumericField($nomCamp);
        }
    }
}
function filtroStars($nomCamp){
    if ($_POST[$nomCamp] <= 5 && $_POST[$nomCamp] >= 1){
        return trim(htmlspecialchars($_POST[$nomCamp]));
    }else{
        throw new \BatoiPOP\Exceptions\NoFitField("El camp $nomCamp te que tindrer un valor entre 1-5");
    }
}

function saveFile($nomcamp,$type,$directori){
    if (!$_FILES[$nomcamp]['name'] == null){
        if ($_FILES[$nomcamp]['type'] == $type){
            $nomFitxer = $_FILES[$nomcamp]['name'];
            if (move_uploaded_file($_FILES['foto']['tmp_name'],"$directori/".$nomFitxer )){
                return $nomFitxer;
            }
        }else{
            throw new \BatoiPOP\Exceptions\isNotAnImageFile($nomcamp);
        }
    }
}
function nameLenght($nomCamp){
    if (strlen($_POST[$nomCamp]) >= 10 && strlen($_POST[$nomCamp]) <= 30){
        return trim(htmlspecialchars($_POST[$nomCamp]));
    }else{
        throw new \BatoiPOP\Exceptions\NoFitField("El $nomCamp te que ser entre 10 i 30");
    }
}
function contrasenyaSegura($nomCamp){
    if (preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/',$_POST[$nomCamp])){
        return trim(htmlspecialchars($_POST[$nomCamp]));
    }else{
        throw new \BatoiPOP\Exceptions\NoFitField("La contrasenya te que ser entre minim de 8 lletres, contindrer i minuscules majuscules, un numero y algun caracter especial com un .");
    }
}

function compararContrseñas($nomCamp1, $nomCamp2){
    if ($_POST[$nomCamp1] !== $_POST[$nomCamp2]){
        throw new \BatoiPOP\Exceptions\passwordIsNotSame('');
    }
}

function generar_token_seguro($longitud){
    if ($longitud < 4){
        $longitud = 4;
    }
    return bin2hex(random_bytes(($longitud - ($longitud % 2)) / 2));
}

function createUpdate($camps){
    $string='';
    foreach ($camps as $key => $camp){
        if ($key === array_key_last($camps)){
            $string .= "`$key` = '$camp'";
        }else {
            $string .= "`$key` = '$camp', ";
        }
    }
    return $string;
}