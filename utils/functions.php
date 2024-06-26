<?php
function isActive($pagename){
    if(str_contains($_SERVER['REQUEST_URI'],$pagename)){
        echo " active ";
    }
}

function isUserLoggedIn(){
    if(empty($_SESSION['user']))
    {
        return false;
    }else {
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
            // last request was more than 30 minutes ago
            killSession();
            $_SESSION["errorelogin"] = "Sessione scaduta!";
            return false;
        }
        return true;
    }
}

function killSession(){
     session_unset();     // unset $_SESSION variable for the run-time 
     session_destroy();   // destroy session data in storage
}

function randomNumbers($digits = 3){
    return rand(pow(10, $digits-1), pow(10, $digits)-1);
}
 
function registerLoggedUser($user){
    $_SESSION["user"] = $user;
    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
}

function checkPassword($pwd, $errors) {

    if (strlen($pwd) < 8) {
        $errors .= "Password troppo corta!</br>";
    }

    if (!preg_match("#[0-9]+#", $pwd)) {
        $errors .= "Password deve includere almeno un numero!</br>";
    }

    if (!preg_match("#[a-zA-Z]+#", $pwd)) {
        $errors .= "Password deve includere almeno una lettera!</br>";
    }     

    return $errors ;
}

function getPepper(){
    return "hpHBxsvDACsGFK4u4FTRl";
}

function uploadImage($path, $image){
    $imageName = basename($image["name"]);
    $fullPath = UPLOAD_DIR.$path.$imageName;
    
    $maxKB = 3000;
    $acceptedExtensions = array("jpg", "jpeg", "png", "gif");
    $result = 0;
    $msg = "";
    //Controllo se immagine è veramente un'immagine
    $imageSize = getimagesize($image["tmp_name"]);
    if($imageSize === false) {
        $msg .= "File caricato non è un'immagine! ";
    }
    //Controllo dimensione dell'immagine < 3000KB
    if ($image["size"] > $maxKB * 1024) {
        $msg .= "File caricato pesa troppo! Dimensione massima è $maxKB KB. ";
    }

    //Controllo estensione del file
    $imageFileType = strtolower(pathinfo($fullPath,PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $acceptedExtensions)){
        $msg .= "Accettate solo le seguenti estensioni: ".implode(",", $acceptedExtensions);
    }

    //Controllo se esiste file con stesso nome ed eventualmente lo rinomino
    if (file_exists($fullPath)) {
        $i = 1;
        do{
            $i++;
            $imageName = pathinfo(basename($image["name"]), PATHINFO_FILENAME)."_$i.".$imageFileType;
        }
        while(file_exists(UPLOAD_DIR.$path.$imageName));
        $fullPath = UPLOAD_DIR.$path.$imageName;
    }

    // Create directory if it does not exist
    if(!is_dir(UPLOAD_DIR.$path)) {
        mkdir(UPLOAD_DIR.$path,0755, true);
    }

    //Se non ci sono errori, sposto il file dalla posizione temporanea alla cartella di destinazione
    if(strlen($msg)==0){
        
        if(!move_uploaded_file($image["tmp_name"], $fullPath)){
            $msg.= "Errore nel caricamento dell'immagine.";
        }
        else{
            $result = 1;
            $msg = $imageName;
        }
    }
    return array($result, $msg);
}