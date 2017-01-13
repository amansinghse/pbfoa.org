<?php /*include("message.php");*/
$social = $fn->SelectQuery("select * from social_links"); 
$header_banner = $fn->SelectQuery("select * from header_banner"); 
$quick = $fn->SelectQuery("select * from mail_settings"); 

?>
<div class="headerbg">
  <div class="fixed">
   <div class="header">
      <div class="logo"> 
         <a href="index.php" class="logo"><img src="<?php echo WEBSITE_URL; ?>images/social_links/<?php echo $social[0]['site_logo']; ?>" alt="Logo Image" width="208" height="145"></a>
      </div>
       
        <a href="<?php echo $header_banner[0]['link']; ?>" class="adspace"><img src="<?php echo WEBSITE_URL; ?>images/header_banner/<?php echo $header_banner[0]['site_logo']; ?>" alt="Image"></a>
       
         <div class="header-right">
            <h1><?php echo $quick[0]['quick_contact_title']; ?></h1>
            <h2><span><?php echo $quick[0]['quick_contact']; ?></span></h2>
         </div>
   </div>
      <div class="menus">
         <ul class="menu">
              <li><a href="product.php">Products</a></li>
              <li><a href="typical.php">Typical Properties & Info</a></li>
              <li><a href="location.php">Locations</a></li>
              <li><a href="faq.php">Faq</a></li>
              <li><a href="news.php">News</a></li>
              <li><a href="contact.php">Contact Us</a></li>
             
          </ul>
       </div>
   </div> 
  </div>
