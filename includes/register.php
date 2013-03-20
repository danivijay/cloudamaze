<?php
$isdomainavailable = "NOT SET";
if ($flag) {
    $isdomainavailable = "YES";
} else {
    $isdomainavailable = "NO";
}
if (isset($_POST['check']) && $_POST['check'] == "Submit") {
    if (isset($_POST['domain']) && $_POST['domain'] != "") {
        $domain = $_POST['domain'];
        //validate domain
        if (preg_match("/^($label)\\.($tld)$/", $domain, $match) && in_array($match[2], $tld_list)) {
            $_SESSION['domain'] = $domain;
            header('Location: index.php?page=2');
        }
    }
} elseif (isset($_POST['domainradio']) && $_POST['domainradio'] != "") {
    $domainname = $_POST['domainradio'];
}
?>
<div id="content">
    <div style="width:100%;height:auto;">
        <div style="float: left;width: 30%">
            <img src="images/lemon-slice.png" /> 
        </div>
        <div style="width:100%;text-align: right;">
            <div style="text-align:center;"><h2><font style="color:#9dc33c;"> Easy Peasy </font><font color="#61c8d9"> Lemon squeezy!</font></h2></div>
        </div>
    </div>   
    <form method="post" <?php if (isset($_GET['skip']) && $_GET['skip'] == 'true') { ?> action="index.php?page=1&skip=true"  <?php } else { ?> action="index.php?page=1&skip=false"<?php } ?>>
        <table align="center" >
            <tr><td colspan="3">
                    <input type="text" name="domain"  value="<?php echo $domainname; ?>" id="txt_domain" <?php if ((isset($_GET['check']) && $_GET['check'] == 'Submit') || ( isset($_POST['domainradio']) && $_POST['domainradio'] != "")) { ?> readonly="readonly" <?php } ?> />
                    <input type="submit" id="txt_submit" name="check" <?php if (( isset($_GET['skip']) && $_GET['skip'] == 'true' ) || ( isset($_POST['domainradio']) && $_POST['domainradio'] != "")) { ?> value="Submit"  <?php } else { ?> value="Check" <?php } ?>  />        
                </td></tr>
<?php if (( isset($_GET['skip']) && $_GET['skip'] == 'false' ) && (!isset($_POST['domainradio']))) { ?>
                <tr>
                    <td align="left"  colspan="3">
                        <input type="checkbox" name="tld[]" value="com"  <?php if (!isset($_POST['check'])) { ?> checked="checked" <?php } elseif (in_array("com", $tldarray)) { ?> checked="checked" <?php } ?> />com 
                        <input type="checkbox" name="tld[]" value="net" <?php if (in_array("net", $tldarray)) { ?> checked="checked" <?php } ?> />net &nbsp;&nbsp;
                        <input type="checkbox" name="tld[]" value="in" <?php if (in_array("in", $tldarray)) { ?> checked="checked" <?php } ?> />in &nbsp;&nbsp;
                        <input type="checkbox" name="tld[]" value="biz" <?php if (in_array("biz", $tldarray)) { ?> checked="checked" <?php } ?> />biz &nbsp;&nbsp;
                        <input type="checkbox" name="tld[]" value="org" <?php if (in_array("org", $tldarray)) { ?> checked="checked" <?php } ?> />org &nbsp;&nbsp;
                   </td>

                <tr>
                    <td align="left" colspan="3">        
                         <input type="checkbox" name="tld[]" value="biz" <?php if (in_array("biz", $tldarray)) { ?> checked="checked" <?php } ?> />biz &nbsp;&nbsp;
                         <input type="checkbox" name="tld[]" value="us" <?php if (in_array("us", $tldarray)) { ?> checked="checked" <?php } ?> />us &nbsp;&nbsp;
                         <input type="checkbox" name="tld[]" value="eu" <?php if (in_array("eu", $tldarray)) { ?> checked="checked" <?php } ?> />eu &nbsp;&nbsp;
                         <input type="checkbox" name="tld[]" value="co.uk" <?php if (in_array("co.uk", $tldarray)) { ?> checked="checked" <?php } ?> />co.uk &nbsp;&nbsp;
                   
                    </td>
                </tr> 
<?php // to display given Domain Available or Not
                if ($status != "" && $exist) {
                    ?>
                    <tr><td id="tdheadNot"> Domain Already Exist :</td></tr> <?php
                    foreach ($tldarray as $arrayitem) {
                        $fulldomainname = $domainname . "." . $arrayitem;
                        if ($datajson[$fulldomainname]["status"] != "available") {
                            ?> <tr><td align="left"><?php echo $fulldomainname; ?> </td></tr>  
                        <?php
                        }
                    }
                }
                // to activate radio button to select Available Domains
                if ($flag) {
                    ?> <tr><td id="tdhead">  Available Domains : </td></tr>
                    <?php
                    foreach ($tldarray as $arrayitem) {

                        $fulldomainname = $domainname . "." . $arrayitem;

                        if ($datajson[$fulldomainname]["status"] == "available") {
                            ?> <tr><td align="left"><input type="radio" value="<?php echo $fulldomainname; ?>" name="domainradio" onclick="this.form.submit();" /> <?php echo $fulldomainname; ?> </td></tr> 
                            <?php
                        }
                    }
                } else {
                    if ($status != "") {
                        ?> <tr><td id="tdhead"><?php echo 'Suggested Domains:'; ?> </td></tr>
                        <?php foreach ($domainsuggestionsarray as $value) {
                            ?> <tr><td align="left"><input type="radio" value="<?php echo $value; ?>" name="domainradio" onclick="this.form.submit();" /><?php echo $value; ?> </td></tr>
                        <?php
                        }
                    }
                }
            }
            ?>
        </table> 
    </form>  
  <div id="buttons">
        <div id="skip-domain">
            <a href="index.php?page=0" id="OpenContact" class="btnclass"> Home </a>
        </div>
    </div>
</div>