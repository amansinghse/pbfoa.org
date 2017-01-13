<?php 
require_once("../class/class.admin.php");
	$obj = new Admin();
	$obj->RequireLogin(false);
	if(isset($_REQUEST['signout'])){
		$obj = new Admin();
		$obj->LogOut();
	}
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="datatables/jquery.dataTables.min.js"></script>
<script src="datatables/dataTables.bootstrap.min.js"></script>

 
<script>
  $(function () {
	  
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
  

</script>
  <style>
@import url("css/fonts.css");
*{outline:none;font-family:"Droid Sans";}
body{ margin:0px; padding:0px 5px 0px 0px;font-family:"Droid Sans"; font-size:10pt; background:#fff; color:#0B5FAE;}
.navi ul{ width:200px; margin:0px; padding:0px; border:1px dashed #0064BB; list-style:none; float:left;}
.navi ul ul{ border:none;border-top:1px dashed #0064BB; display:none}
.navi ul li{ width:100%; margin:0px; padding:0px; list-style:none; float:left;border-bottom:1px dashed #0064BB; }
.navi ul li a{ color:#0064BB; width:90%; height: auto; margin:0px; float:left; padding:10px 5%; text-decoration:none; text-transform:uppercase;font-size:12px;}
.navi ul li ul li a{ color:#0064BB; width:90%; margin:0px; float:left; padding:10px 5%; text-decoration:none; text-transform:capitalize}
.navi ul li a:hover, ul li a.active, ul li a:active{color:#fff; background:#0064BB;}
.navi ul li ul li a:hover, ul li ul li a.active, ul li ul li a:active{color:#fff; background:#0064BB;}
.navi ul li:last-child{ border-bottom:none;}

</style>
</head>
<body>
<div class="container-fluid" >

<!-- header section-->
	<div class="row" style="background:#000; color:white;">
		<div class="col-md-4">
		<h3>Palm Beach</h3></div>
		<div class="col-md-8 " style="text-align:right" >
			<h3>Welcome to <?php echo COMPANY_NAME;?> Admin Panel</h3>
			<big>Welcome <?php echo $_SESSION['ADMIN_NAME'];?>! <a href="?signout" title="<?php echo COMPANY_NAME;?>" target="_parent">Logout</a></big>
		</div>
	</div>
	<!-- header section-->
	<!--center section--> 
	
	<div class="row">
	<!--menu section--> 
		<div class="col-md-2 navi ">
			<ul>
			<?php foreach($_SESSION['PAGE_NAME'] as $k => $v){ ?>
				<li <?php if(($_SESSION['ADMIN_NAME'] == 'Editor' && $k == 'Manage Members') || ($_SESSION['ADMIN_NAME'] == 'Editor' && $k == 'Manage Users') || ($_SESSION['ADMIN_NAME'] == 'Editor' && $k == 'Website Settings') || ($_SESSION['ADMIN_NAME'] == 'Editor' && $k == 'Manage Membership')) { ?> style="display:none;<?php } ?>"><a href="javascript:;" onclick="$(this).next('ul').slideToggle(500); $(this).toggleClass('active');" class="arrow"><?php echo $k;?></a>
					<ul><?php foreach($v as $code => $page){ ++$i; ?>
						<li <?php if($_SESSION['ADMIN_NAME'] == 'Admin' && $page == 'Change Your Password') { ?> style="display:none;<?php } ?>><a href="<?php echo $code;?>" onclick="$('[rel=sublink]').removeClass('active');$(this).addClass('active');" rel="sublink">&raquo; <?php echo $page;?></a></li>
					<?php }?>
					</ul>
				</li>
			<?php }?>
			</ul>
		</div>
		<!--menu section--> 
		
		<!--main section--> 
		<div class="col-md-10">
			<?php require_once("message.php");
				?>
				<div class="container-fluid">
				<h1 style="float: left; width: 100%; margin-top: 15px;">Add Memberships</h1>

				
					<form action="" method="POST" enctype="multipart/form-data">
						<table width="100%" cellspacing="1" cellpadding="10" class="table  table-bordered table-striped" id="tbl">
						
							<tr>
							  <th colspan="2">Add Membership</th>
							</tr>
							<tr>
								<td width="40%"> <label id="err_page_title">First Name</label></td>
								<td>
									<input type="text" title="First Name" class="col-md-8" placeholder="Your Answer"  name="fname" id="fname"  size="50"/>
								</td>
							</tr>
							<tr>
								<td width="40%"> <label id="err_page_title">Last Name</label></td>
								<td>
									<input type="text" title="Last Name" class="col-md-8" placeholder="Your Answer"   name="lname" id="lname" size="50"/>
								</td>
							</tr>
							<tr>
								<td width="40%"> <label id="err_page_title">Email Address</label></td>
								<td>
									<input type="text" title="Email" class="col-md-8" placeholder="Your Answer"   name="email" id="email"  size="50"/>
								</td>
							</tr>
							<tr>
								<td width="40%"> <label id="err_page_title">Phone Number</label></td>
								<td>
									<input type="text" title="Phone" class="col-md-8" placeholder="Your Answer"   name="phone" id="phone"  size="50"/>
								</td>
							</tr>
							<tr>
								<td width="40%"> <label id="err_page_title">Address</label></td>
								<td>
									<TextArea type="text" title="Address" class="col-md-8" placeholder="Your Answer"  name="address" id="address" cols="20" rows="5"></TextArea>
								</td>
							</tr>
							<tr>
								<td width="40%"> <label id="err_page_title">Company</label></td>
								<td>
									<input type="text" title="Company" placeholder="Your Answer" class="col-md-8"  name="company" id="company"   size="50"/>
								</td>
							</tr>
							
							
							<tr>
								<td width="40%"> <label id="err_page_title">No of Employees</label></td>
								<td>
									<label class="radio-inline">
										<input type="radio" name="optradio" value="1-5">1-5
									</label>
									<label class="radio-inline">
										<input type="radio" name="optradio"  value="5-20">5-20
									</label>
									<label class="radio-inline">
										<input type="radio" name="optradio" value="20-50">20-50
									</label>
									<label class="radio-inline">
										<input type="radio" name="optradio" value="50+">50+
									</label>
								</td>
							</tr>
							<tr>
								<td width="40%"> <label id="err_page_title">Current AUM</label></td>
								<td>
									<label class="radio-inline">
										<input type="radio" name="optradio1" value="$1M-$50M">$1M-$50M
									</label>
									<label class="radio-inline">
										<input type="radio" name="optradio1"  value="$50M - $200M">$50M - $200M
									</label>
									<label class="radio-inline">
										<input type="radio" name="optradio1" value="$200M - $1B">$200M - $1B
									</label>
									<label class="radio-inline">
										<input type="radio" name="optradio1" value="$1B+">$1B+
									</label>
											
								</td>
							</tr>
							<tr>
							<td width="40%"> <label id="err_page_title">Area of Interest</label></td>
								<td>
									<label class="checkbox-inline"><input type="checkbox" value="">Family Offices</label>
									<label class="checkbox-inline"><input type="checkbox" value="">Real Estate</label>
									<label class="checkbox-inline"><input type="checkbox" value="">Private Equity Funds</label>
									<label class="checkbox-inline"><input type="checkbox" value="">Hedge Funds</label>
									<label class="checkbox-inline"><input type="checkbox" value="">Equities</label>
									<label class="checkbox-inline"><input type="checkbox" value="">Bonds</label>
									<label class="checkbox-inline"><input type="checkbox" value="">Fixed Income</label>
									<label class="checkbox-inline"><input type="checkbox" value="">Luxury Goods</label>
									<label class="checkbox-inline"><input type="checkbox" value="">Other:
									<input type="text">
									</label>
												
								</td>
							</tr>
							<tr>
								<td width="40%"> <label id="err_page_title">Category</label></td>
								<td>
									<select class="col-md-8" name="category">
									<option value="">Select Category</option>
									<option value="Family Office">Family Office</option>
									<option value="Asset Manager">Asset Manager</option>
									<option value="Service Providers">Service Providers</option>
									<option value="Other Memberships">Other Memberships</option>
									
									</select>
											
								</td>
							</tr>
							
					<tr>
				  
				  
				  <td colspan=2> <div class="text-center"> <input type="submit" value="Add Member" name="addition" class="btn btn-primary "  /></div></td>
				</tr>
				
				
			  </table>
					</form>
				</div>
	
		
		</div>
		<!--main section--> 
		
	</div>
	<!--center section--> 
	<!--footer section--> 
	<div class="row">
		<?php include_once("footer.php");?>
	</div>
	<!--footer section--> 
	
</div>

 <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
  <script src="menu/sidebar-menu.js"></script>
  <script>
    $.sidebarMenu($('.sidebar-menu'))
  </script>

</body>
</html>