   	  
	  <?php include('header.php')?>	  	  			
	   	  
        <div id="main_data_div">
       	  <div id="lft_data">
           	<?php 
			if($id!='')
			{
				$query ="Select * from `cms_pages` WHERE page_parent=$id";
			}else{$query ="Select * from `cms_pages` WHERE page_parent=23";}
			
			/* $subpages=mysql_query($query); 
			//$sub_pages  = mysql_fetch_array($subpages);
			
			if(mysql_num_rows($subpages)>0)
			{
				echo '<div id="side_nav"><ul>';
				while($qrow=mysql_fetch_array($subpages,MYSQL_ASSOC))
				{
					echo '<li class="h18"><a href="index.php?page_id='.$qrow['page_id'].'">-'.$qrow['page_title'].'</a></li>';
				}
				echo '</ul></div><br /><br />';
				
			} */
			?>
			<?php //echo stripslashes($resutl['left_content']);
			//echo htmlspecialchars_decode($resutl['left_content'], ENT_NOQUOTES);

			?>
        
			<?php if($resutl['page_type']=='locations'){ 
				include('location.php');
			}elseif($resutl['page_type']=='faq'){
				include('faq.php');
			}elseif($resutl['page_type']=='team'){
				include('team.php');
			}elseif($resutl['page_type']=='news'){
				include('news.php');
			}else
			?>
            <?php echo $resutl['page_content']; ?>
          
            
            
            
			<div class="clr"></div>
        </div>
		<?php include('footer.php')?>
		<?php include('footer.php')?>