<?php
session_start();
require_once '../inc/Database.php';
include_once 'modelAdmin/modelAdmin.php';
include_once 'controllerAdmin/controllerAdmin.php';

include('routeAdmin/routingAdmin.php');

echo $response;