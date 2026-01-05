<?php
ob_start();
?>
<h1>404 ERROR</h1>
<?php
$content = ob_get_clean();
include_once 'view/layout.php';
?>