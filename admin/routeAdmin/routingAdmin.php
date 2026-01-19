<?php
$host = explode ('?', $_SERVER['REQUEST_URI']) [0];
$num = substr_count($host, '/');
$path = explode('/', $host) [$num];

if ($path =='' OR $path == 'index.php' )
{
   $response = controllerAdmin::formLoginSite();
}
//--login
elseif ($path == 'login')
{
   $response = controllerAdmin::loginAction();
}
//--logout
elseif ($path == 'logout')
{
   $response = controllerAdmin::logoutAction();
}
//-listNews
elseif($path=='newsAdmin'){
   $response=controllerAdminNews::NewsList();
}

else
{
    $response = controllerAdmin::error404();
}
