<?php
include '../../config.php';

//Code By : HelloInfinity
//Date : March 6 2013
//Function to Call API Calls
// Method: GET,POST, PUT
// Data: array("param" => "value") ==> sample.php?param=value

function helloInfinityCallAPI($method, $url, $data = false) {
    $curl = curl_init();

    switch ($method) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);

            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_PUT, 1);
            break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // Optional Authentication: - Need not touch this
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "username:password");
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    return curl_exec($curl);
}
?>

<?php
//Example Call to see available domains and suggestions
$url = '';
$tldarray[] = "";
$domainname="";
//$domainstatusarray=array("");
$domainsuggestionsarray[]="";
$flag=0;
$status="";
$exist=false;
$limit=5;
if (isset($_GET['skip']) && $_GET['skip']=='false' ){
if (isset($_POST['check']) && isset($_POST['domain']) && $_POST['domain'] != "" && isset($_POST['tld']) && $_POST['tld'] != "") {

    $domainname = $_POST['domain'];
    $tld = "";
    $i = 0;
    foreach ($_POST['tld'] as $arrayitem) {
        $tld.='&tlds=' . $arrayitem;
        $tldarray[$i] = $arrayitem;
        $i++;
    }

// $api_user_id and  $api_key are initialized in config file
    $url = 'https://test.httpapi.com/api/domains/available.json?auth-userid=' . $api_user_id . '&api-key=' . $api_key . '&domain-name=' . $domainname . $tld . '&suggest-alternative=true';
    $data = "";
    $data = helloInfinityCallAPI('GET', $url, $data);
    $datajson = json_decode($data, TRUE);
    $fulldomainname = "";
    //$flag=0;
   // $j=0;
   
    foreach ($tldarray as $arrayitem) {

        $fulldomainname = $domainname . "." . $arrayitem;
       // echo '<br/>' . $fulldomainname;
        if ($datajson[$fulldomainname]["status"] == "available") {
            $status="Available";
          $flag=1;
        } else {
             $status="Not Available";
             $exist=true;
             
        }
      
    }
   
    // Domain Suggestions
    $stack=array("");
    $i = 0;
    foreach ($datajson[$domainname] as $sugdomain => $sugtld) {
        $stack[$i] = $sugdomain;
        $i++;
    }
   // echo '<br/>Sugg names : <br/>';
    $i = 0;
    foreach ($stack as $value) {
        foreach ($datajson[$domainname][$value] as $sugdomain => $sugtld) {
            if ($datajson[$domainname][$value][$sugdomain] == "available") {
               // echo $value . '.' . $sugdomain;
                $domainsuggestionsarray[$i]=$value . '.' . $sugdomain;
                $i++;
                if ($i == $limit) {

                    break;
                }
            }
        }

        if ($i == $limit) {

            break;
        }
    }
    // domain suggestions end
}
 elseif (isset($_POST['check'])){
     
    if(!isset($_POST['tld'])){
      echo '<br/> Tick Your Domain'; 
      
    }
     if( !isset($_POST['domain']) || $_POST['domain'] =="" ){
        echo '<br/> Type Domain Name';      
    }else{
        $domainname=$_POST['domain'];
    }
 
        
     
    
}
}else{
    //skip true
}
?>
