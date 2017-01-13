<?php 
require_once("../../class/class.admin.php");
$fn = new Admin();
$fn->RequireLogin();
if($_POST['type']=='order'){
	$fn->UpdateQuery("update orders set order_status='".$_POST['val']."' where order_id='".$_POST['order_id']."'");
	if($_POST['val']=="Y") {
		echo "<a href=\"javascript:;\" onclick=\"senddata('orders','type=order&val=P&order_id=".$_POST['order_id']."','orderstatus".$_POST['order_id']."');\">Pending</a>";
		echo " | <a href=\"javascript:;\" onclick=\"senddata('orders','type=order&val=C&order_id=".$_POST['order_id']."','orderstatus".$_POST['order_id']."');\">Canceled</a>";
		echo " | <a href=\"javascript:;\" onclick=\"senddata('orders','type=order&val=S&order_id=".$_POST['order_id']."','orderstatus".$_POST['order_id']."');\">Shipped</a>";
		echo " | <strong>Completed</strong>";
	}
	if($_POST['val']=="P") {
		echo "<strong>Pending</strong>";
		echo " | <a href=\"javascript:;\" onclick=\"senddata('orders','type=order&val=C&order_id=".$_POST['order_id']."','orderstatus".$_POST['order_id']."');\">Canceled</a>";
		echo " | <a href=\"javascript:;\" onclick=\"senddata('orders','type=order&val=S&order_id=".$_POST['order_id']."','orderstatus".$_POST['order_id']."');\">Shipped</a>";
		echo " | <a href=\"javascript:;\" onclick=\"senddata('orders','type=order&val=Y&order_id=".$_POST['order_id']."','orderstatus".$_POST['order_id']."');\">Completed</a>";
	}
	if($_POST['val']=="C") {
		echo "<a href=\"javascript:;\" onclick=\"senddata('orders','type=order&val=P&order_id=".$_POST['order_id']."','orderstatus".$_POST['order_id']."');\">Pending</a>";
		echo " | <strong>Canceled</strong>";				
		echo " | <a href=\"javascript:;\" onclick=\"senddata('orders','type=order&val=S&order_id=".$_POST['order_id']."','orderstatus".$_POST['order_id']."');\">Shipped</a>";
		echo " | <a href=\"javascript:;\" onclick=\"senddata('orders','type=order&val=Y&order_id=".$_POST['order_id']."','orderstatus".$_POST['order_id']."');\">Completed</a>";
	}
	if($_POST['val']=="S") {				
		echo "<a href=\"javascript:;\" onclick=\"senddata('orders','type=order&val=P&order_id=".$_POST['order_id']."','orderstatus".$_POST['order_id']."');\">Pending</a>";
		echo " | <a href=\"javascript:;\" onclick=\"senddata('orders','type=order&val=C&order_id=".$_POST['order_id']."','orderstatus".$_POST['order_id']."');\">Canceled</a>";
		echo " | <strong>Shipped</strong>";
		echo " | <a href=\"javascript:;\" onclick=\"senddata('orders','type=order&val=Y&order_id=".$_POST['order_id']."','orderstatus".$_POST['order_id']."');\">Completed</a>";
	}
}else if($_POST['type']=='payment'){
	$fn->UpdateQuery("update orders set payment_status='".$_POST['val']."' where order_id='".$_POST['order_id']."'");
	if($_POST['val']=="Y") { 
        echo "<a href=\"javascript:;\" onclick=\"senddata('orders','type=payment&val=N&order_id=".$_POST['order_id']."','paymentstatus".$_POST['order_id']."');\">Pending</a> | <strong>Paid</strong>";
	}elseif($_POST['val']=="N") {
		echo "<strong>Pending</strong> | <a href=\"javascript:;\" onclick=\"senddata('orders','type=payment&val=Y&order_id=".$_POST['order_id']."','paymentstatus".$_POST['order_id']."');\">Paid</a>";
    }
}
?>