<div id="menu-bar-container">
  
                    
    <ul id="menu-bar">
     <li <?php if(isset($_GET['page']) && $_GET['page']==1){ ?>   class="current" <?php  } ?> ><a href="index.php">Home</a></li>
     <li><a href="index.php?page=1&skip=false">Domain</a></li>
     <li <?php if((isset($_GET['page']) && $_GET['page']==5) || (isset($_GET['page']) && $_GET['page']==11) || (isset($_GET['page']) && $_GET['page']==13) ){ ?>   class="current"  <?php  } ?> ><a href="index.php?page=13">Hosting</a>
         <ul>
           <li><a href="index.php?page=13">Shared Hosting</a></li>
           <li><a href="index.php?page=5">Virtual Private Servers</a></li>
           <li><a href="index.php?page=11">Dedicated Hosting</a></li>
         </ul>
     </li>     
     
     <li  <?php if((isset($_GET['page']) && $_GET['page']==7) || (isset($_GET['page']) && $_GET['page']==8) || (isset($_GET['page']) && $_GET['page']==9) || (isset($_GET['page']) && $_GET['page']==10) ){ ?>   class="current" style="text-shadow: none;" <?php  } ?> ><a href="index.php?page=7">Services</a>
     	<ul>
        	<li><a href="index.php?page=7">Corporate Email</a></li>
            <li><a href="index.php?page=10">SSL Certificate</a></li>
           	<li><a href="index.php?page=8">Payment Gateway</a></li>
           	<li><a href="index.php?page=9">Server Management</a></li>
        </ul>
     </li>
     <li><a href="http://blog.cloudamaze.com/" target="_blank">Blog</a></li>
     <li <?php if(isset($_GET['page']) && $_GET['page']==6){ ?>   class="current" <?php  } ?> ><a href="index.php?page=6">Testimonials</a></li>
     <li <?php if(isset($_GET['page']) && $_GET['page']==14){ ?>   class="current" <?php  } ?>><a href="index.php?page=14">Downloads</a></li>
     <li><a href="http://www.cloudamaze.com/support" target="_blank">24/7 Support</a></li>
     <li <?php if(isset($_GET['page']) && $_GET['page']==12){ ?>   class="current" <?php  } ?> ><a href="index.php?page=12">Contact Us</a></li>
    </ul>
</div>
<?php if ( (isset($_GET['page']) &&  $_GET['page']==2) || (isset($_GET['page']) &&  $_GET['page']==3) || (isset($_GET['page']) &&  $_GET['page']==4)  ){ ?>
<div id="tab_bar_wrapper">	
    <div id="tri_div_start"></div>    
        <div id="tab_wrapper">
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 1) { ?>id="tri_div_back_active"<?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($_GET['page']) && $_GET['page'] == 1) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Register</div>
            </div>
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 1) { ?> id="tri_div_front_active" <?php } else { ?> id="tri_div_front" <?php } ?>  ></div>
        </div>
        <div id="tab_wrapper">
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 2) { ?> id="tri_div_back_active" <?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($_GET['page']) && $_GET['page'] == 2) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Select Plan</div>
            </div>
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 2) { ?> id="tri_div_front_active" <?php } else { ?> id="tri_div_front" <?php } ?>  ></div>
        </div>
        <div id="tab_wrapper">
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 3) { ?> id="tri_div_back_active" <?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($_GET['page']) && $_GET['page'] == 3) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Checkout</div>
            </div>
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 3) { ?> id="tri_div_front_active" <?php } else { ?> id="tri_div_front" <?php } ?>  ></div>
        </div>
        <div id="tab_wrapper">
        	<div <?php if (isset($_GET['page']) && $_GET['page'] == 4) { ?> id="tri_div_back_active" <?php } else { ?> id="tri_div_back" <?php } ?>  ></div>
            <div <?php if (isset($_GET['page']) && $_GET['page'] == 4) { ?> id="tab_item_active" <?php } else { ?> id="tab_item" <?php } ?>  >
                <div id="text_wrapper">Congrats</div>
            </div>        	
        </div> 
        <div <?php if (isset($_GET['page']) && $_GET['page'] == 4) { ?> id="tri_div_front_active" <?php } else { ?> id="tri_div_end" <?php } ?>  ></div>   
</div>
<?php } else if(isset($_GET['page']) &&  $_GET['page']!=1) { ?>
  <div id="tab_bar_wrapper">	
    <div id="tri_div_start"></div>   
    
     <?php 
                    if(isset($_GET['page'])){ 
                    if( $_GET['page']==5 || $_GET['page']==7 || $_GET['page']==8 || $_GET['page']==9 || $_GET['page']==10 || $_GET['page']==11 || $_GET['page']==13){
                        ?>
     <div id="tab_wrapper">
        	<div  id="tri_div_back"   ></div>
            <div  id="tab_item"  >
                <div id="text_wrapper">
                  <?php  
                    switch ($_GET['page']){
                        case 5: 
                            echo 'Hosting';
                            break;
                        case 7: 
                             echo 'Services';
                            break;
                        case 8: 
                             echo 'Services';
                            break;
                        case 9: 
                             echo 'Services';
                            break;
                        case 10: 
                             echo 'Services';
                            break;
                         case 11: 
                             echo 'Hosting';
                            break;
                        case 13: 
                             echo 'Hosting';
                            break;
                        
                    }
                    ?>
                </div>
            </div>
        	<div  id="tri_div_front"  ></div>
        </div>
    
                    <?php } } ?>
        <div id="tab_wrapper">
        	<div id="tri_div_back_active"  ></div>
            <div  id="tab_item_active"   >
                
             <div id="text_wrapper">
                    <?php 
                    if(isset($_GET['page'])){
                    switch ($_GET['page']){
                        case 5: 
                            echo 'Virtual Private Servers';
                            break;
                        case 6: 
                            echo 'Testimonials';
                            break;
                        case 7: 
                             echo 'Corporate Email';
                            break;
                        case 8: 
                             echo 'Payment Gateway';
                            break;
                        case 9: 
                             echo 'Server Management';
                            break;
                        case 10: 
                             echo 'SSL Certificate';
                            break;
                         case 11: 
                             echo 'Dedicated Hosting';
                            break;
                        case 12: 
                             echo 'Contact Us';
                            break;
                        case 13: 
                             echo 'Shared Hosting';
                            break;
                        case 14: 
                             echo 'Downloads';
                            break;
                        default : echo 'Home';
                            break;
                    }
                    }  else {
                        echo 'Home';
                    }
                    ?>
                    
                    
                </div>
            </div>
        	
        </div>  
    <div  id="tri_div_front_active"  ></div>
    
    
    
    
   </div>
<?php } ?>