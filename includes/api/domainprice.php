<?php

//include '../includes/lib/resellerclubtld.php';
//include 'helloinfinitycallapi.php'

function getdomainpriceapi($domainname) {
    $domarray = array("org", "biz", "us", "cno", "info");
    $standardcomarray = array("us", "eu", "de", "qc", "kr", "gr");
    $premiumcomarray = array("uk", "gb", "br", "hu", "jpn", "no", "ru", "sa", "se", "uy", "za");

//check tld is in offer table
    $offer_domain = $domainname;
    $split = explode(".", $offer_domain, 2);
    $offer_domain = $split[1];
    $sql = "select count(*) as count FROM domain_offer WHERE domain_name='$offer_domain'";
    $result = mysql_query($sql) or die(mysql_error());

    $row = mysql_fetch_array($result);
    if ($row != NULL) {
        $count = $row['count'];
    } else {
        $count = 0;
    }

    if ($count > 0) {

        $sql = "select offer_price FROM domain_offer WHERE domain_name='$offer_domain'";
        $result = mysql_query($sql) or die(mysql_error());

        $row = mysql_fetch_array($result);
        if ($row != NULL) {
            $domainprice = $row['offer_price'];
        }
    } else {

        if ($domainname != "") {
            $selectedtld = $domainname;
            $count = substr_count($selectedtld, '.');
            if ($count == 1) {
                $split = explode(".", $selectedtld, 2);
                $selectedtld = $split[1];

                if (in_array($selectedtld, $domarray)) {
                    $selectedtld = "dom" . $selectedtld;
                } elseif ($split[1] == "com") {
                    $selectedtld = "domcno";
                } else {
                    $selectedtld = "dot" . $selectedtld;
                }
            }
            if ($count == 2) {
                $split = explode(".", $selectedtld, 3);
                if ($split[2] == "com" || $split[2] == "net") {

                    if (in_array($split[1], $standardcomarray)) {
                        $selectedtld = "centralnicstandard";
                    } elseif (in_array($split[1], $premiumcomarray)) {
                        $selectedtld = "centralnicpremium";
                    } else if ($split[1] == "cn" && $split[2] == "com") {
                        $selectedtld = "centralniccncom";
                    }
                } else if ($split[2] == "de" && $split[1] == "com") {
                    $selectedtld = "centralniccomde";
                } else if ($split[2] == "org" && $split[1] == "ae") {
                    $selectedtld = "centralnicstandard";
                } else {
                    $selectedtld = "thirdleveldot" . $split[2];
                }
            }
        } else {

            $selectedtld = "domcno";
            //default
        }


        $url = 'https://test.httpapi.com/api/products/customer-price.json?auth-userid=408467&api-key=8m1GgBU964O70VLpdQkDjMZDYbg9xX32';
        $data = "";
        $data = helloinfinityCallAPI('GET', $url, $data);
        $datajson = json_decode($data, TRUE);
        //print_r($datajson);




        $domainprice = $datajson[$selectedtld]["addnewdomain"][1];
        if ($domainprice == "") {
            $domainprice = "Not Available";
        }
    }

    return $domainprice;
}

?>
