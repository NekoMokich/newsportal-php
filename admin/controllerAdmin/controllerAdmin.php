<?php
class controllerAdmin {

public static function formLoginSite() {
    return viewAdmin::formLoginSite();
include_once ('viewAdmin/viewAdmin.php');
}
//auth user

public static function loginAction() {
 $logIn = modelAdmin::userAuthentication();
 if(isset($logIn) and $logIn==true){
    include_once('viewAdmin/startAdmin.php');
}
    else{
        $_SESSION['errorLogin'] = "Invalid username or password.";
        include_once ('viewAdmin/formLogin.php');
    }
}

//logout
public static function logoutAction() {
    modelAdmin::userLogout();
    include_once ('viewAdmin/formLogin.php');
}
//error404
public static function error404() {
    include_once ('viewAdmin/error404.php');
    }
}
?>
