<?php 
//unset($_SESSION['choice']);
    $name="";
    $cp="";
    $address="";
    $phone="";
    $mobile="";
    $email="";
    $web="";
    $des="";
    $invoice="";
    if (isset($_POST['sslradio']) && $_POST['sslradio'] != "" ) {
    $_SESSION['choice']=$_POST['sslradio'];    
    }
    if(isset($_POST['submit']) && $_POST['submit']=='Submit'){
   
    $flag=1;
   if(isset($_POST['name'])){
    $name=$_POST['name'];   
   } 
    if(isset($_POST['cp'])){
    $cp=$_POST['cp'];   
   } 
    if(isset($_POST['address'])){
    $address=$_POST['address'];   
   } 
    if(isset($_POST['phone'])){
    $phone=$_POST['phone'];   
   } 
    if(isset($_POST['mobile'])){
    $mobile=$_POST['mobile'];   
   } 
    if(isset($_POST['email'])){
    $email=$_POST['email'];   
   } 
    if(isset($_POST['web'])){
    $web=$_POST['web'];   
   } 
    if(isset($_POST['des'])){
    $des=$_POST['des'];   
   } 
   if(check_email_address($email)==FALSE){
       $email="";
       $flag=0;
   }
   if($name=="" || $cp=="" || $address=="" || $mobile=="" || $email=="" || $des==""   ){
       $flag=0;
   } 
  
   $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
   if (!$resp->is_valid) {
        // What happens when the CAPTCHA was entered incorrectly
        $flag = 0;
     } 
   if($flag==1){
       //collect data 
       switch ($_SESSION['choice']) {
                            case 1:
                                $ssldetails = "|Plan Name 	: SSL 123 Certificate
                                               |1 Year 		: 1,250
                                               |2 Year 		: 2,290
                                               |1 Year Renewal  : 1,250
                                               |2 Year Renewal	: 2,290
                                               |1 Year Add License : 885
                                               |2 Year Add License : 1,510";
                                break;
                            case 2: 
                                 $ssldetails = "|Plan Name 	: Web Server Certificate
                                                |1 Year 		: 4,110
                                                |2 Year 		: 7,230
                                                |1 Year Renewal  : 3,850
                                                |2 Year Renewal	: 6,710
                                                |1 Year Add License : 2,550
                                                |2 Year Add License : 4,630";
                                break;
                            case 3:
                                $ssldetails="|Plan Name 	: SGC SuperCert
                                             |1 Year 		: 9,830
                                             |2 Year 		: 18,150
                                             |1 Year Renewal  : 7,750
                                             |2 Year Renewal	: 15,550
                                             |1 Year Add License : 6,190
                                             |2 Year Add License : 11,910";
                                break;
                            case 4:
                                $ssldetails="|Plan Name 	: Web Server Wild Card Certificate
                                                |1 Year 		: 18,150
                                                |2 Year 		: 28,550
                                                |1 Year Renewal  : 18,150
                                                |2 Year Renewal	: 28,550
                                                |1 Year Add License : 11,910
                                                |2 Year Add License : 20,750";
                                break;
                            
       }
       // insert into db
       $currentdate = date("Y/m/d");
                mysql_query("INSERT INTO query_form(form_type,date,name,contact_point,address,phone,mobile,email,web,description) 
                VALUES('3','$currentdate','$name','$cp','$address','$phone','$mobile','$email','$web','$des') ");
                 $id=mysql_insert_id();
                 $invoice = "#hiSSL00". $id;
                  mysql_query("INSERT INTO ssl_details(id,details) 
                VALUES('$id','$ssldetails') ");
               
              // mail   
                    $email_details="|Name           : $name".
                                   "|Contact Person : $cp".
                                   "|Addres         :$address".
                                   "|Phone          :$phone".
                                   "|Email          :$email".
                                   "|Web            :$web".
                                   "|Description    :$des";
                    $from = $_POST["email"];
                    $to = $to_email;
                    $message = "|Corporate Email " . "|Invoice Id " . $invoice . $email_details;
                    $subject = $name . "- New Corporate Email Request";
                    $message = $message . "\n\n" . "-------------------\n". "on-" . $currentdate;
                    $message = str_replace("|", "\n\n", $message);
                    $message = str_replace("+", "", $message);
                    $headers = "From: " . $name . " " . $from;
                    mail($to, $subject, $message, $headers);
                    
                    // mail to client 
                    
                    unset($_SESSION['choice']);
                
   }
}
?>

<div class="form_outer">
    <div class="banner_outer">
        <img src="images/queryform/ssl_1.jpg" class="banner_img"/>
        <div class="data_text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in enim ut est mattis faucibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Cras id pellentesque lacus. Fusce sit amet risus erat. Sed lorem nisl, tincidunt vitae pharetra et, interdum vel tellus. Sed ac erat non odio hendrerit hendrerit quis quis dui. Proin mollis nisl nec lacus pharetra in dictum metus aliquet. Aliquam facilisis est in magna venenatis hendrerit. Mauris a turpis lacus. Vivamus tincidunt velit at sapien auctor nec tristique dolor cursus.
        </div>
    </div>
<?php if (!isset($_POST['sslradio']) && $invoice=="" ) { ?>
    <div class="two_section_outer">
        <div class="section_container">
            <div class="single_section_container">
                <div class="data_text">
                    &#9632; Web & Mail servers
                </div>
            </div>
            <div class="single_section_container">
                <div class="data_text">
                    &#9632; Business Intranets and Extranets
                </div>
            </div>
            <div class="single_section_container">
                <div class="data_text">
                    &#9632; Wikis and VPNs
                </div>
            </div>
            <div class="single_section_container">
                <div class="data_text">
                    &#9632; Consumer Portals
                </div>
            </div>
            <div class="single_section_container">
                <div class="data_text">
                    &#9632; and many more websites!
                </div>
            </div>        	
        </div>
       
        <div class="section_container" id="left_container">
            <div class="single_section_container">
                
                <div class="data_text">
                    &nbsp;thawte-Acclaimed and Trusted brand
                </div>
            </div>
            <div class="single_section_container">
                <img src="images/queryform/ssl_2.png" class="img_icon_small"/>
                <div class="data_text">
                    256-Bit Encryption
                </div>
            </div>
            <div class="single_section_container">
                <img src="images/queryform/ssl_3.png" class="img_icon_small"/>
                <div class="data_text">
                    Reliable & Secure
                </div>
            </div>
            <div class="single_section_container">
                <img src="images/queryform/ssl_4.png" class="img_icon_small"/>
                <div class="data_text">
                    Multiple Selling Options
                </div>
            </div>
            <div class="single_section_container">
                <img src="images/queryform/ssl_5.png" class="img_icon_small"/>
                <div class="data_text">
                    Lowest Prices
                </div>
            </div>

        </div>
    </div>
<?php } ?>


</div>

  <form  name="form" method="post" action="index.php?page=10">   
     <?php if (!isset($_POST['sslradio']) && $invoice=="" &&  !isset($_SESSION['choice'])) { ?>
<div class="table_container">
    <div class="pricing_table pricing_six">

        <ul class="pricing_column gradient_yellow">
            <li class="pricing_header1">Duration</li>
            <li class="odd"><span>1 Year</span></li>
            <li class="even"><span>2 Year</span></li>
            <li class="odd"><span>1 Year Renewal</span></li>
            <li class="even"><span>2 Year Renewal</span></li>
            <li class="odd"><span>1 Year Add License</span></li>
            <li class="even"><span>2 Year Add License</span></li>
        </ul>

        <ul class="pricing_column gradient_yellow">
            <li class="pricing_header1">SSL 123 Certificate</li>
            <li class="odd"><span>&#8377; 1,250</span></li>
            <li class="even"><span>&#8377; 2,290</span></li>
            <li class="odd"><span>&#8377; 1,250</span></li>
            <li class="even"><span>&#8377; 2,290</span></li>
            <li class="odd"><span>&#8377; 885</span></li>
            <li class="even"><span>&#8377; 1,510</span></li>
            <li class="odd"><input type="radio" name="sslradio" value="1" onclick="this.form.submit();" />Choose</li>
        </ul>

        <ul class="pricing_column gradient_yellow">
            <li class="pricing_header1">Web Server Certificate</li>
            <li class="odd"><span>&#8377; 4,110</span></li>
            <li class="even"><span>&#8377; 7,230</span></li>
            <li class="odd"><span>&#8377; 3,850</span></li>
            <li class="even"><span>&#8377; 6,710</span></li>
            <li class="odd"><span>&#8377; 2,550</span></li>
            <li class="even"><span>&#8377; 4,630</span></li>
            <li class="odd"><input type="radio" name="sslradio" value="2" onclick="this.form.submit();" />Choose</li>
       
        </ul>

        <ul class="pricing_column gradient_yellow">
            <li class="pricing_header1">SGC SuperCert</li>
            <li class="odd"><span>&#8377; 9,830</span></li>
            <li class="even"><span>&#8377; 18,150</span></li>
            <li class="odd"><span>&#8377; 7,750</span></li>
            <li class="even"><span>&#8377; 15,550</span></li>
            <li class="odd"><span>&#8377; 6,190</span></li>
            <li class="even"><span>&#8377; 11,910</span></li>
            <li class="odd"><input type="radio" name="sslradio" value="3" onclick="this.form.submit();" />Choose</li>
        </ul>

        <ul class="pricing_column gradient_yellow">
            <li class="pricing_header1">Web Server Wild Card Certificate</li>
            <li class="odd"><span>&#8377; 18,150</span></li>
            <li class="even"><span>&#8377; 28,550</span></li>
            <li class="odd"><span>&#8377; 18,150</span></li>
            <li class="even"><span>&#8377; 28,550</span></li>
            <li class="odd"><span>&#8377; 11,910</span></li>
            <li class="even"><span>&#8377; 20,750</span></li>
             <li class="odd"><input type="radio" name="sslradio" value="4" onclick="this.form.submit();" />Choose</li>
        </ul>

    </div>
</div>
     
<div class="form_outer">
    <div class="footer_note_outer">
        <div class="footer_note">
            <div class="footer_data_text">
                <h4>Note:</h4>
                <br/>For a Dedicated IP, you will be charged Rs. 220/month.
            </div>
        </div>
    </div>
</div>
     <?php } ?>
      <?php if (isset($_POST['sslradio']) && $_POST['sslradio'] != "" || isset($_SESSION['choice'])  ) { ?>
           <div class="form_outer">
               <div class="form_content">
    	<div id="stylized" class="myform">
           
            <form id="form" name="form" method="post" action="index.php?page=10">
                <h1>Query From</h1>
                <p>SSL Certificate</p>
                
                <div>
                    <label>Name *
                    <span class="small">Your company name</span>
                    </label>
                    <input type="text" name="name" id="name" value="<?php echo $name?>" />
                    
                    <label>Contact Point *
                    <span class="small">Person to contact</span>
                    </label>
                    <input type="text" name="cp" id="cp" value="<?php echo $cp ?>" />
                    
                    <label>Address *
                    <span class="small">Current address</span>
                    </label>
                    <input type="text" name="address" id="add" value="<?php echo $address ?>" />
                    
                    <label>Phone 
                    <span class="small">Valid phone number</span>
                    </label>
                    <input type="text" name="phone" id="ph" value="<?php echo $phone ?>" />
                    
                    <label>Mobile *
                    <span class="small">Valid mobile number</span>
                    </label>
                    <input type="text" name="mobile" id="mob"  value="<?php echo $mobile ?>" />
                    
                    <label>Email *
                    <span class="small">Valid email id</span>
                    </label>
                    <input type="text" name="email" id="email"  value="<?php echo $email ?>" />
                    
                    <label>Web
                    <span class="small">Your website</span>
                    </label>
                    <input type="text" name="web" id="web" value="<?php echo $web ?>" />
                    
                    <label>Description *
                    <span class="small">Brief description of requirement</span>
                    </label>
                    <textarea name="des" id="des"><?php echo $des ?></textarea> 
                    <?php echo recaptcha_get_html($publickey); ?>
                    
                </div>
                <div class="btn_wrapper">
                	<button type="reset">Reset</button>
                        <button type="submit" name="submit" value="Submit">Submit</button>
                </div>
                <div class="spacer"></div>
            
            </form>
            
		</div>    
    </div>
           </div>

      <?php }  elseif($invoice!=""){ 
                
                
                ?>
      <div class="form_outer">
          <div class="form_content">
              <div id="stylized" class="myform">
            <b>Your request has been received</b> (Request ID :<?php echo $invoice; ?> ).<br/> Cloudamaze sales team will contact you shortly. <br/>Thanks for contacting cloudamaze.

            <br/>You can call +91 890 750 9611 for any inquires if needed.
            <div class="btn_wrapper">
                	<a href="index.php?page=0" id="OpenContact" class="btnclass"> Home </a>
                </div>
              </div>
              </div>
      </div>
         <?php   } ?>

 </form>