<?php
$host = explode('?', $_SERVER['REQUEST_URI'])[0];
$num = substr_count($host, '/');
$paths = explode('/', $host)[$num];

if ($paths == '' OR $paths == 'index' OR $paths == 'index.php') {
    $response = Controller::StartSite();
}
elseif ($paths == 'all') {
    $response = Controller::AllNews();
}
elseif ($paths == 'category' && isset($_GET['id'])) {
    $response = Controller::NewsByCatID($_GET['id']);
}
elseif ($paths == 'news' && isset($_GET['id'])) {
    $response = Controller::NewsByID($_GET['id']);
}
else {
    $response = Controller::error404();
}
