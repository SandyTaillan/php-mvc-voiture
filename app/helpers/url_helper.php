<!--app/helpers/url_helpers-->
<?php
/**
 * @param $page
 * simple fonction de redirection des pages
 */
function redirect($page){
        header('location: ' . URLROOT . '/' . $page);
    }

