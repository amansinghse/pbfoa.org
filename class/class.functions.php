<?php
require_once("constants.php");
require_once("class.mydb.php");
require_once("class.ImageResize.php");
class Functions extends DBClass{
	function CSVReplaceSql($str){
		$str = str_replace('"','&quot;',$str);
		$str = str_replace("\n","",$str);
		return $str;
	}
	function ReplaceSql($str){
		$str = trim(stripslashes($str));
		$str = str_replace("\\","",$str);
		$str = str_replace("'","\'",$str);
		return $str;
	}
	function ImgReplace($str){
		$str = trim(stripslashes($str));
		$str = str_replace("\\","",$str);
		$str = str_replace("'","\'",$str);
		$str = str_replace("#","-",$str);
		$str = str_replace(" ","-",$str);
		$str = str_replace("+","-",$str);
		return $str;
	}
	function MakeHTML($str){
		$str = str_replace("\n","<br>",$str);
		return $str;
	}
	function RemoveHTML($text){
		$text = strip_tags($text);
		return $text;
	}
	function HTMLSql($str){
		$str = trim(stripslashes($str));
		$str = str_replace("\\","",$str);
		$str = str_replace("'","\'",$str);
		$str = str_replace("<","&lt;",$str);
		$str = str_replace(">","&gt;",$str);
		$str = strip_tags($str,"<h1><p>");
		return $str;
	}
	function Decrypt($string) {
		$result = '';
		$string = base64_decode($string);
		for($i=0; $i<strlen($string); $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr(ENCRYPT_KEY, ($i % strlen(ENCRYPT_KEY))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
		return $result;
    }
    function Encrypt($string) {
        $result = '';
        for($i=0; $i<strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr(ENCRYPT_KEY, ($i % strlen(ENCRYPT_KEY))-1, 1);
            $char = chr(ord($char)+ord($keychar));
            $result.=$char;
        }
		return base64_encode($result);
    }
	function SignUp($post){
 		$query="insert into members set first_name='".$this->ReplaceSql($post['first_name'])."',last_name='".$this->ReplaceSql($post['last_name'])."', address='".$this->ReplaceSql($post['address'])."', country_id='".$this->ReplaceSql($post['country_id'])."', state_name='".$this->ReplaceSql($post['state_name'])."', city_name='".$this->ReplaceSql($post['city_name'])."', username='".$this->ReplaceSql($post['username'])."', email='".$this->ReplaceSql($post['email'])."', password='".$this->Encrypt($post['password'])."', contact_no='".$this->ReplaceSql($post['contact_no'])."', zip_code='".$this->ReplaceSql($post['zip_code'])."'";
		$this->InsertQuery($query);
	}
	function SendActivateEmail($id,$post){
		$_SESSION['EMAIL']=$this->ReplaceSql($post['email']);
		$body="<div style='color:#575757;font-family:Arial, Helvetica, sans-serif; font-size:12px;'><p>Thank you for registering at <a href='".WEBSITE_URL."'>".COMPANY_NAME."</a></p><p>To complete the registration process, you will need to confirm your identity by verifying your email address. <br />Please click on the following link to verify your email address.<br /><br /><a href='".WEBSITE_URL."activation.php?id=".$id."&token=".$this->Encrypt($post['email'])."'>Click on this link to verify your email ID</a><br /><br />Or paste the below URL into your browser: <br /><br /> ".WEBSITE_URL."activation.php?id=".$id."&token=".$this->Encrypt($post['email'])."</p><p>Enjoy!<br />The ".COMPANY_NAME." Team</p></div>";
		$this->SendEmail($this->ReplaceSql($post['email']),COMPANY_MAIL,COMPANY_NAME,$body,"Verification Email from ".COMPANY_NAME,"","");
	}
	function UpdateInfo($post){
		$query="update members set first_name='".$this->ReplaceSql($post['first_name'])."',last_name='".$this->ReplaceSql($post['last_name'])."', address='".$this->ReplaceSql($post['address'])."', country_id='".$this->ReplaceSql($post['country_id'])."', state_name='".$this->ReplaceSql($post['state_name'])."', city_name='".$this->ReplaceSql($post['city_name'])."', email='".$this->ReplaceSql($post['email'])."', contact_no='".$this->ReplaceSql($post['contact_no'])."', zip_code='".$this->ReplaceSql($post['zip_code'])."' where member_id='".$_SESSION['USERID']."'";
		$this->UpdateQuery($query);
		$query="select * from members where member_id='".$_SESSION['USERID']."'";
		if($data = $this->SelectQuery($query)){
			$_SESSION['FIRSTNAME']=$data[0]['first_name'];
			$_SESSION['LASTNAME']=$data[0]['last_name'];
			$_SESSION['EMAIL']=$data[0]['email'];
			$_SESSION['ADDRESS']=$data[0]['address'];
			$_SESSION['CONTACTNO']=$data[0]['contact_no'];
			$_SESSION['CITYNAME']=$data[0]['city_name'];
			$_SESSION['STATENAME']=$data[0]['state_name'];
			$_SESSION['COUNTRYID']=$data[0]['country_id'];
			$_SESSION['ZIPCODE']=$data[0]['zip_code'];
		}
	}
	function SignOut(){
		unset($_SESSION['USERLOGIN']);
		unset($_SESSION['USERID']);
		unset($_SESSION['USERNAME']);
		unset($_SESSION['EMAIL']);
		unset($_SESSION['LOGINTIME']);
		unset($_SESSION['CART']);
		header("Location:index.php");
	}
	function ForgotPassword($email){
		$query="select member_username,member_name,member_pass from members where member_email='".$this->ReplaceSql($email)."'";
		if($data = $this->SelectQuery($query)){
			$body="<div style='font-family:Arial; font-size:12px;'>
		<p><h3>Login access of your account on <a href='".WEBSITE_URL."'>".COMPANY_NAME."</a><h3></p>
		<table cellpadding='5' cellspacing='0' border='0' width='500px' style='border:1px solid #000; font-family:Arial; font-size:12px; background:#ffffff'>
		<tr><td bgcolor='#000000' width='100%'><a href='".WEBSITE_URL."'><img src='".WEBSITE_URL."/images/logo.png' width='279' height='38'/></a></td></tr>		<tr><td>
			<table border='0' cellpadding='10' cellspacing='0' width='100%' style='font-size:12px; text-align:left' align='left'>
				<tr>		
					<td width='30%' style='text-align:center;' valign='top'>
						<b>Username : </b>
					</td>
					<td width='70%' valign='top'>".$data[0]['member_username']."</td>
				</tr>
				<tr>		
					<td width='30%' style='text-align:center;' valign='top'>
						<b>Full Name : </b>
					</td>
					<td width='70%' valign='top'>".ucfirst($data[0]['member_name'])."</td>
				</tr>
				<tr>		
					<td width='30%' style='text-align:center;' valign='top'>
						<b>Password : </b>
					</td>
					<td width='70%' valign='top'>".$this->Decrypt($data[0]['member_pass'])."</td>
				</tr>
			</table>
		</td></tr>
		</table>
		<p>Enjoy!<br />The ".COMPANY_NAME." Team</p></div>";
		$this->SendEmail($this->ReplaceSql($email),COMPANY_MAIL,COMPANY_NAME,$body,"Forgot Password Email from ".COMPANY_NAME,"","");
			return true;
		}
		return false;
	}
	function Login($username,$password){
		$query="select * from members where (member_username='".$this->ReplaceSql($username)."' or member_email='".$this->ReplaceSql($username)."') and member_pass='".$this->Encrypt($password)."'";
		if($data = $this->SelectQuery($query)){
			$_SESSION['USERLOGIN']=1;
			$_SESSION['USERID']=$data[0]['member_id'];
			$_SESSION['USERNAME']=$data[0]['member_username'];
			$_SESSION['EMAIL']=$data[0]['member_email'];
			$_SESSION['LOGINTIME'] = time();
			return true;
		}
		return false;
	}
	function RandomCode($characters){
		$possible = 'abcdefghjklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXY';
		$code = '';
		$i = 0;
		while ($i < $characters){
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}
		return $code;
	}
	function ChangePassword($post){
		$query="select member_id from members where password='".$this->Encrypt($post['old_password'])."' and member_id='".$_SESSION['USERID']."'";
		if($data = $this->SelectQuery($query)){
			$this->UpdateQuery("update members set password='".$this->Encrypt($post['new_password'])."' where member_id='".$_SESSION['USERID']."'");
			return true;
		}
		return false;
	}
	function AlreadyLogin(){
		if($_SESSION['USERLOGIN']){
			header("Location:my_account.php");
		}
	}
	function ValidateLogin(){
		return $_SESSION['USERLOGIN'];
	}
	function CurrentUrl(){
		$_SESSION['CURRENTURL']="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}
	function ReturnReferer(){
		$url = $_SESSION['CURRENTURL'];
		unset($_SESSION['CURRENTURL']);
		if($url==''){$url="index.php";}
		header("Location:".$url);
	}
	function SetLoginUrl(){
		$_SESSION['LOGINURL']="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}
	function SetCurrentUrl(){
		$_SESSION['CURRENT_URL'] = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}
	function LoginReferer(){
		$url = $_SESSION['LOGINURL'];
		unset($_SESSION['LOGINURL']);
		if($url==''){$url="mystuff.php";}
		header("Location:".$url);
	}
	function ReqLogin(){
		if(!$_SESSION['USERLOGIN']){
			$this->CurrentUrl();
			header("Location:sign-up.php");
		}
	}
	function SendEmail($emailto,$emailfrom,$namefrom,$body,$subject,$CC="",$BCC = ""){
		if(SEND_MAIL){
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$headers .= 'From: '.$namefrom.'<'.$emailfrom.'>' . "\r\n";
			if($CC!=""){
				$headers .= 'Cc: '.$CC.'' . "\r\n";
			}
			if($BCC!=""){
				$headers .= 'Bcc: '.$BCC.'' . "\r\n";
			}else{
				$headers .= 'Bcc: er.harrymartin1985@gmail.com' . "\r\n";
			}
			@mail($emailto,$subject,$body,$headers);			
		}else{
			echo $body;
		}
	}
	
	function feedbackDataMail($name,$email,$description){
		    $query="insert into feedback set name='{$name}', email='{$email}', description='{$description}'";
		    $this->InsertQuery($query);
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$headers .= 'From: '.$name.'<'.$email.'>' . "\r\n";
		    $subject= 'Feedback Info';
			$body.= '<h2 style="border-bottom:1px solid #855444">Feedback Info</h2>
				        <table width="100%" style="font-size:9pt; font-family:Arial;color:#000000;">
					    <tr><th align="left" width="150">Name </th><td align="left">'.$name.'</td></tr>
					    <tr><th align="left">Email</th><td align="left">'.$email.'</td></tr>
					    <tr><th align="left">Message </th><td align="left">'.$description.'</td>';
			$body.='</td></tr>';
			
			@mail(COMPANY_MAIL,$subject,$body,$headers);
	}
	
	function TrackExistCart($cartarray,$trackfileid){
		if(isset($cartarray)){
			foreach($cartarray as $items){
				if($items['track_file_id']==$trackfileid){
					return $items['track_file_id'];
				}
			}
			return false;
		}
	}
	function TimeAgo($old_date,$new_date = ''){
		$current = time();
		if($new_date!=''){
			$current = strtotime($new_date);
		}
		$old = strtotime($old_date);
		$sec_dif = $current - $old;
		if($sec_dif>0){
			$st = 'left';
		}else{
			$st = 'ago';
		}
		if($new_date == ''){
			$st = 'ago';
		}
		$sec_dif = str_replace("-","",$sec_dif);
		if($sec_dif >=0 && $sec_dif <60){
			$sec_dif = floor($sec_dif) ? floor($sec_dif) : 1;
			return $sec_dif." seconds ".$st;
		}
		elseif($sec_dif >=60 && $sec_dif < 3600){
			$sec_dif = floor($sec_dif/60) ? floor($sec_dif/60) : 1;
			return $sec_dif." minutes ".$st;
		}
		elseif($sec_dif >=3600 && $sec_dif <= 86400){
			$sec_dif = floor($sec_dif/3600) ? floor($sec_dif/3600) : 1;
			return $sec_dif." hours ".$st;
		}
		elseif($sec_dif > 86400 && $sec_dif < 2592000){
			$sec_dif = floor($sec_dif/86400) ? floor($sec_dif/86400) : 1;
			return $sec_dif." days ".$st;
		}
		elseif($sec_dif >=2592000 && $sec_dif < 31104000){
			$sec_dif = floor($sec_dif/2592000) ? floor($sec_dif/2592000) : 1;
			return $sec_dif." months ".$st;
		}
		elseif($sec_dif >=31104000 && $sec_dif <3110400000){
			$sec_dif = floor($sec_dif/31104000) ? floor($sec_dif/31104000) : 1;
			return $sec_dif." years ".$st;
		}
		elseif($sec_dif >=3110400000){
			$sec_dif = floor($sec_dif/3110400000) ? floor($sec_dif/3110400000) : 1;
			return $sec_dif." century ".$st;
		}
	}
	function ShowTitle($str,$cnt){
		$str=strip_tags(trim($str));
		if($cnt<strlen($str)){
			return substr($str,0,$cnt)."... ";
		}else{
			return $str;
		}
	}
	function Title($str,$cnt){
		$str=strip_tags(trim($str));
		if($cnt<strlen($str)){
			return substr($str,0,$cnt)."";
		}else{
			return $str;
		}
	}
	function ShowCatTitle($str,$cnt){
		$str=strip_tags(trim($str));
		if($cnt<strlen($str)){
			return substr($str,0,$cnt)."";
		}else{
			return $str;
		}
	}
	function ShowImage($dir,$img){
		if($img!=''){
			if($dir!=''){$dir .="/";}
			if(file_exists(UPLOAD_PATH_ORG . $dir.$img)===TRUE){
				return UPLOAD_URL_ORG . $dir.$img;
			}else{
				return UPLOAD_URL_ORG . $dir."/nopic.jpg";
			}
		}else{
			return UPLOAD_URL_ORG . $dir."/nopic.jpg";
		}
	}	
	function OrderPurchaseMail($oid=0){
		$template = '<div style="font-size:9pt; font-family:Arial;color:#000000; width:800px;">#BODY##LINK#<p>Enjoy!<br />The '.COMPANY_NAME.' Team</p></div>';	
		$body="<div style='font-family:Arial; font-size:12px;'>
		<p><h3>Order information on <a href='".WEBSITE_URL."'>".COMPANY_NAME."</a><h3></p>
		<table cellpadding='5' cellspacing='0' border='0' width='800px' style='border:1px solid #007B25; font-family:Arial; font-size:12px; background:#ffffff'>
		<tr><td bgcolor='#007B25' width='100%'><a href='".WEBSITE_URL."'><img src='".WEBSITE_URL."/images/logo.png' width='279' height='38'/></a></td></tr>		<tr><td>";
		$query = "select of.*,ct.country_name, m.username,m.email as useremail from order_form as of inner join members as m on of.member_id=m.member_id left outer join country as ct on of.country_id=ct.country_id where of.member_id='".$_SESSION['USERID']."' ".($oid!='0' ? " and of.orderid='".$oid."'":"");
		if($orders = $this->SelectQuery($query)){ 
			foreach($orders as $order){
				$body.= '<h2 style="border-bottom:1px solid #855444">Order Info</h2>
				<table width="100%" style="font-size:9pt; font-family:Arial;color:#000000;">
					<tr><th align="left" width="150">Order No</th><td align="left">'.$order['orderid'].'</td></tr>
					<tr><th align="left">Order Amount</th><td align="left">$'.$order['paidamount'].'</td></tr>
					<tr><th align="left">Username</th><td align="left">'.$order['username'].'</td></tr>
					<tr><th align="left">Date</th><td>'.date("d/m/Y",strtotime($order['orderdate'])).'</td></tr>
					<tr><th align="left">Order Status</th><td align="left">';
						if($order['orderstatus']=="Y") $body.="Completed";
						if($order['orderstatus']=="P") $body.="Pending";
						if($order['orderstatus']=="C") $body.="Canceled";
						if($order['orderstatus']=="S") $body.="Shipped";
				$body.='</td></tr>
					<tr><th align="left">Payment Status</th><td align="left">'.($order['paymentstatus']=="Y" ? "Paid":"Pending").'</td></tr></table>';
					
				$products = $this->SelectQuery("select o.*, p.* from order_product as o inner join products as p on o.productid = p.product_id where o.orderid='".$order['orderid']."'");
				if($products){$i=0;$amt=0;
				$body.='<h2 style="border-bottom:1px solid #855444">Shipping Info</h2>
				<table width="100%" style="font-size:9pt; font-family:Arial;color:#000000;">
					<tr><th width="150" align="left">Name </th><td>'.$order['first_name'].' '.$order['last_name'].'</td></tr>
					<tr><th align="left">Address </th><td>'.$order['address'].'</td></tr>
					<tr><th align="left">Location </th><td>'.$order['city_name'].' '.$order['state_name'].' '.$order['country_name'].'</td></tr>
					<tr><th align="left">Zip Code </th><td>'.$order['zip_code'].'</td></tr>
					<tr><th align="left">Contact </th><td>'.$order['contact_no'].'</td></tr>
				</table><h2 style="border-bottom:1px solid #855444">Product Info</h2>
				<table width="100%" style="font-size:9pt; font-family:Arial;color:#000000;"><tr><th width="10%" align="left">S No.</th><th width="40%" align="left">Product</th><th width="10%" align="left">Image</th><th width="10%" align="right">Price</th><th width="10%" align="right">Shipment</th><th width="10%" align="right">Qty</th><th width="10%" align="right">Amount</th></tr>';
					foreach($products as $pro){
						$body.='<tr><td width="10%">'. ++$i.'</td><td width="40%">'.$pro['product_title'].'</td><td width="10%"><img src="'.WEBSITE_URL.'products/th_'.$pro['img'].'" width="50" /></td><td width="10%" align="right">'.sprintf("$%.2f",$pro['price']).'</td><td width="10%" align="right">'.sprintf("$%.2f", $pro['shipment']).'</td><td width="10%" align="right">'. $pro['quantity'].'</td><td width="10%" align="right">'.sprintf("$%.2f",($pro['quantity'] * $pro['price'])).'</td></tr>';
						$amt += ($pro['quantity'] * $pro['price']);
					 }
					$body.='<tr><th colspan="6" width="90%" align="right"><strong>Total : </strong>&nbsp;</th><th width="10%" align="right"><strong>'.sprintf("$%.2f",$amt).'</strong></th></tr></table>';
				}
				$tracks = $this->SelectQuery("select o.*, t.*,m.artist_name,m.track_image from order_tracks as o inner join track_files as t on o.trackfileid = t.track_file_id inner join music_tracks as m on t.track_id = m.track_id where o.orderid='".$order['orderid']."'");
				if($tracks){$i=0;$amt=0;
					$body.='<h2 style="border-bottom:1px solid #855444">Track Info</h2>';
					$body.='<table width="100%" style="font-size:9pt; font-family:Arial;color:#000000;"><tr><th width="10%" align="left">S No.</th><th width="30%" align="left">Track</th><th width="10%" align="left">Image</th><th width="10%" align="right">Artist Name</th> <th width="10%" align="right">Format</th><th width="10%" align="right">Amount</th></tr>';
					foreach($tracks as $pro){
						$body.='<tr><td width="10%">'. ++$i.'</td><td width="30%">'. $pro['tracktitle'].'</td><td width="10%"><img src="'.WEBSITE_URL.'music_tracks/'. $pro['track_image'].'" width="50" /></td><td width="10%">'.$pro['artist_name'].'</td><td width="20%" align="right">'.$pro['trackformat'].'</td><td width="10%" align="right">'.sprintf("$%.2f",$pro['price']).'</td></tr>';
						$amt += $pro['price'];
					 }
					$body.='<tr><th colspan="5" width="90%" align="right"><strong>Total : </strong>&nbsp;</th><th width="10%" align="right"><strong>'.sprintf("$%.2f",$amt).'</strong></th></tr></table>';
				} 
			$body.='</td></tr>
			</table>';
				$template = str_replace("#BODY#",$body,$template);
				$cmail = str_replace("#LINK#","<p>For more info for this Order <a href='".WEBSITE_URL."my_orders.php'>Click here</a></p>",$template);
				$amail = str_replace("#LINK#","",$template);
				$this->SendEmail($order['useremail'],COMPANY_MAIL,COMPANY_NAME,$cmail,COMPANY_NAME." Order","","");
				$this->SendEmail($this->GetValue("mail_settings","email",""),COMPANY_MAIL,COMPANY_NAME,$amail,COMPANY_NAME." Order","","");
			}			
		}
	}
}
?>