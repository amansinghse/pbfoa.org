<?php
if(isset($_REQUEST['submit']) && isset($_REQUEST['token']))
{
$file=move_uploaded_file($_FILES['pdf_file']['tmp_name'], "../modules/priceList/pricelist.pdf");

 if($file)
 { 
	
?>
		<div class="notification success png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		File Uploaded !
		</div>
		</div>
		<?php
	
	}
	else
	{
		?>
		<div class="notification error png_bg">
		<a href="#" class="close"><img src="resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
		<div>
		Failed to Uploaded File!
		</div>
		</div>
		<?php
	
	
	}
	
}


?>
<div class="content-box"><!-- Start Content Box -->

<div class="content-box-header">

<h3>Update PriceList</h3>

<ul class="content-box-tabs">
<li><a href="#tab1" class="default-tab">Price List PDF</a></li> <!-- href must be unique and match the id of target div -->
</ul>

<div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

<div class="tab-content default-tab" id="tab1"> 
<p>
<label><a href="http://xrchivestudios/dev/xsuite/index.php?mod=priceList" target="_blank"> Click Here to See Current Price List </a> </label>

</p>

<form name="uploadImage" action="admin.php?mod=priceSheet&token=<?php echo time(); ?>" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Price List PDF:</label>
										<input class="medium-input" type="file" id="medium-input" name="pdf_file" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>		

								
								<p>
									<input class="button" type="submit" value="Submit" name="submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->     
					
						</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->