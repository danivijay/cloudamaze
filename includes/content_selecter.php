<?php if (isset($_GET['page'])) { $page = $_GET['page'];
} else { $page = -1;
}
switch ($page) { case 0: include 'home.php';
break;
case 1: include 'api/domainavail.php';
include 'lib/tld.php';
include 'lib/resellerclubtld.php';
include 'api/helloinfinitycallapi.php';
include 'api/domainprice.php';
include 'register.php';
break;
case 2: include 'connection.php';
include 'lib/emailcheck.php';
require_once('captcha/recaptchalib.php');
include 'api/helloinfinitycallapi.php';
include 'hosting.php';
include 'connectionclose.php';
break;
case 3: include 'checkout.php';
break;
case 4: include 'congrats.php';
break;
case 5 : include 'connection.php';
include 'lib/emailcheck.php';
include 'lib/tld.php';
include 'api/helloinfinitycallapi.php';
require_once('captcha/recaptchalib.php');
include 'vps.php';
include 'connectionclose.php';
break;
case 6 : include 'connection.php';
include 'testimonials.php';
include 'connectionclose.php';
break;
case 7 : include 'connection.php';
include 'lib/emailcheck.php';
require_once('captcha/recaptchalib.php');
include 'corporate_email.php';
include 'connectionclose.php';
break;
case 8 : include 'connection.php';
include 'lib/emailcheck.php';
require_once('captcha/recaptchalib.php');
include 'payment_gateway.php';
include 'connectionclose.php';
break;
case 9 : include 'connection.php';
include 'lib/emailcheck.php';
require_once('captcha/recaptchalib.php');
include 'server_management.php';
include 'connectionclose.php';
break;
case 10 : include 'connection.php';
include 'lib/emailcheck.php';
require_once('captcha/recaptchalib.php');
include 'ssl_certificate.php';
include 'connectionclose.php';
break;
case 11 : include 'connection.php';
include 'lib/emailcheck.php';
require_once('captcha/recaptchalib.php');
include 'dedicated_hosting.php';
include 'connectionclose.php';
break;
case 12: include 'contact_us.php';
break;
case 13: include 'connection.php';
include 'lib/emailcheck.php';
include 'lib/tld.php';
require_once('captcha/recaptchalib.php');
include 'shared_hosting.php';
include 'connectionclose.php';
break;
case 14: include 'downloads.php';
break;
case 15: include 'support.php';
break;
default:        include 'home.php';        
    
                 break;

}  ?>