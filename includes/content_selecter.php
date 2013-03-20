<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = -1;
}

switch ($page) {
    case 0:
	include 'home.php';
	break;	
    case 1:
        include 'api/domainavail.php';
        include 'lib/tld.php';
        include 'register.php';
        break;
    case 2:
        include 'connection.php';
        include 'lib/emailcheck.php';
	require_once('captcha/recaptchalib.php');
        include 'hosting.php';
        include 'connectionclose.php';
        break;
    case 3: include 'checkout.php';
        break;
    case 4: include 'congrats.php';
        break;
    case 5 : 
            include 'connection.php';
            include 'lib/emailcheck.php';
             include 'lib/tld.php';
              include 'api/helloinfinitycallapi.php';
            require_once('captcha/recaptchalib.php');
            include 'vps.php';
            include 'connectionclose.php';
            break;
    case 6 :
        include 'connection.php';     
        include 'testimonials.php';
        include 'connectionclose.php';
        break;
    default:
        include 'home.php';
        break;
}
?>
