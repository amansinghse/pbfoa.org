<div class="content-box"><!-- Start Content Box -->

<div class="content-box-header">

<h3>Upload Re Touched Images</h3>

<ul class="content-box-tabs">
<li><a href="#tab1" class="default-tab">Before After Image Uploader</a></li> <!-- href must be unique and match the id of target div -->
</ul>

<div class="clear"></div>

</div> <!-- End .content-box-header -->

<div class="content-box-content">

<div class="tab-content default-tab" id="tab1"> 
<form name="uploadImage" action="admin.php?mod=manageRetouch&token=<?php echo time(); ?>" method="post" enctype="multipart/form-data">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Browse Before Image:</label>
										<input class="medium-input" type="file" id="medium-input" name="image_file_before" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>		
								<p>
									<label>Browse After Image:</label>
										<input class="medium-input" type="file" id="medium-input" name="image_file_after" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>	
								<p>
									<label>Image Caption: <small>( A brief description of image )</small></label>
										<input class="text-input small-input" type="text" id="small-input" name="image_caption" /> <!--  <span class="input-notification success png_bg">Successful message</span>Classes for input-notification: success, error, information, attention -->
										<br />
										<!-- <small> small text </small> -->

								</p>
								
								<p>
									<label>Image Sequence: <small>( 0 for displaying image at first position )</small></label>
									<input class="text-input small-input" type="text" id="small-input" name="image_seq" value="1" /> 
							<!--	<p>
									<label>Description:</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="description" /> <span class="input-notification error png_bg"> Error message </span>
								</p>
								<p>
									<label>LINK URL </label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p> -->
											
								<!-- <p>
									<label>Image Type: </label>
									<input type="radio" name="image_type" value="hq"/> 
									H.Q.<br />
									<input type="radio" name="image_type" value="hd" />
									H.D. </p>
								
							<p> -->
																
							<!--	<p>
									<label>Image Caption:</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="image_caption" cols="79" rows="15"></textarea>
								</p> -->
								
								<p>
									<input class="button" type="submit" value="Submit" name="submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->     
					
						</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->