<?php
require_once("../class/constants.php");
mysql_connect(DB_SERVER_NAME,DB_USER_NAME,DB_USER_PASSWORD) or die("connection Could not connect");
mysql_select_db(DB_DATABASE_NAME);

if(isset($_POST['id'])){
$sql="select * from categories where `sectiontitle`='".$_POST['id']."'";
$query=mysql_query($sql);?>
<select name="category" class="Rcategory" id="category" onchange="catevalue(this.value);">
<option>Select Cateory</option>
<?php 
if(mysql_num_rows($query)>0){
   while($row=mysql_fetch_array($query)){
     echo '<option value="'.$row['category_id'].'">'.$row['category_title'].'</option>';
    }
  }
  ?> </select>
<?php  } 
if(isset($_POST['cateid'])){
$sql="select parent_id,category_id from categories";
$query=mysql_query($sql);
$cateId=array();
    while($row=mysql_fetch_array($query)){
     $newCount=explode(',',$row['parent_id']);
	 $total=count($newCount);
	  for($i=0;$i<=$total;$i++){
	    if($newCount[$i]==$_POST['cateid']){
		   $cateId[]=$row['category_id'];
        }
	  }
    }
?>
<select name="subcategory" class="Rsubcategory" id="subcategory" onchange="cateSubValue(this.value);">
<option>Select SubCateory</option>
<?php 

       
    if(count($cateId)>0){
    foreach($cateId as $catid){
        $sql21="select * from categories where `category_id`='".$catid."'";
        $query21=mysql_query($sql21);
        $row21=mysql_fetch_array($query21);
        echo '<option value="'.$row21['category_id'].'">'.$row21['category_title'].'</option>';
    }
	}
?> 
</select>
<?php  }
if(isset($_POST['product_id'])){
$sql="select * from products where `category_id`='".$_POST['product_id']."'";
$query=mysql_query($sql);?>
<select name="product" class="Rproduct" id="product_id" >
<?php 
if(mysql_num_rows($query)>0){
   while($row=mysql_fetch_array($query)){
     echo '<option value="'.$row['product_id'].'">'.$row['product_title'].'</option>';
    }
  }
  ?> </select>
<?php  }
 ?>