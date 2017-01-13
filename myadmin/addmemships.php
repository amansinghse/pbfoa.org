<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<?php include_once("inc.head.php"); ?>
<link rel="stylesheet" href="datatables/dataTables.bootstrap.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<body>

<div class="full">


</div>

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
	
	
<?php include_once("footer.php");?>
</body>
</html>