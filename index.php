Wellcome!
<a href="about-us">About us</a>
<a href="contact-us">Contact us</a>
<?php
    require_once 'Routes.php';

    function __autoload($class_name){
        if (file_exists('./classes/'.$class_name.'.php')){
            require_once './classes/'.$class_name.'.php';
        }else if (file_exists('./Controllers/'.$class_name.'.php')){
            require_once './Controllers/'.$class_name.'.php';
        }

    }
?>
