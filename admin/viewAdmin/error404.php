<?php ob_start() ?>
<h2>404 Error - Page Not Found</h2>
<article>

    <h3>404 Error - Page Not Found</h3>
    <p>Sorry, the page you are looking for does not exist.</p>

</article>
<?php $content = ob_get_clean(); ?>
<?php include "viewAdmin/templates/layout.php"; ?>