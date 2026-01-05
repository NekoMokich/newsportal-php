<?php
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$paths = explode('/', $host)[$num];

if($paths == '' OR $path == 'index' OR $path == 'index.php'){
    $response = Controller::StartSite();
}

elseif($path == 'all') {
    $response = Controller::AllNews();
}
elseif($path == 'category' and isset($_GET['id'])) {
    $response = controller::NewsByCatID($_GET['id']);
}
elseif($path == 'news' and isset($_GET['id'])) {
    $response = controller::NewsByID($_GET['id']);
}

else {
    $response = Controller::error404();
}