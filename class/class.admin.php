<?php
require_once("constants.php");
require_once("class.ImageResize.php");
require_once("class.mydb.php");
class Admin extends DBClass{
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
		$str = $this->HTMLSql($str);
		$str = str_replace("\n","<br>",$str);
		return $str;
	}
	function HTMLSql($str){
		$str = trim(stripslashes($str));
		$str = str_replace("\\","",$str);
		$str = str_replace("'","\'",$str);
		$str = str_replace("<","&lt;",$str);
		$str = str_replace(">","&gt;",$str);
		return $str;
	}
	function RemoveHTML($text){
		$text = strip_tags($text);
		return $text;
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
	function SetCurrentUrl(){
		$_SESSION['CURRENT_URL'] = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}
	function SetCurrentUrlAjaxPages(){
		$_SESSION['CURRENT_URL_AJAX'] = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	}
	function ReturnReferer(){
		header("Location:".$_SESSION['CURRENT_URL']);
	}
	
	function ReturnRefererAjaxPages(){
		header("Location:".$_SESSION['CURRENT_URL_AJAX']);
	}
	function AlreadyLogin(){
		if($_SESSION['ADMIN_LOGIN']==TRUE){ 
			header("Location:main.php");
		}	
	}
	function RequireLogin($s=TRUE){
		if($_SESSION['ADMIN_LOGIN']){ 
			if($s){
				$uri = explode("/",$_SERVER['REQUEST_URI']);
				if(strpos($uri[count($uri)-1],"?for=")!==FALSE){
					if(strpos($uri[count($uri)-1],"&")!==FALSE){
						$page = explode("&",$uri[count($uri)-1]);
						foreach($_SESSION['PAGE_NAME'] as $array){
							if(array_key_exists($page[0], $array)){
								return true;
							}
						}
					}else{
						foreach($_SESSION['PAGE_NAME'] as $array){
							if(array_key_exists($uri[count($uri)-1], $array)){
								return true;
							}
						}
					}
				}else{
					$arr = explode("/",$_SERVER['SCRIPT_NAME']);
					$page = $arr[count($arr)-1];
					foreach($_SESSION['PAGE_NAME'] as $array){
						if(array_key_exists($page, $array)){
							return true;
						}
					}
				}
				//header("Location:unauthorised.php");
				return true;
			}else{
				return true;
			}
		}else{
			$dat= $_SERVER['REQUEST_URI'];
			header("Location:index.php?id=$dat");
			
		}
	}
	function LogOut(){
		unset($_SESSION['ADMIN_LOGIN']);
		unset($_SESSION['ADMIN_USER']);
		unset($_SESSION['GROUP_ID']);
		unset($_SESSION['ADMIN_USER_ID']);
		unset($_SESSION['ADMIN_NAME']);
		unset($_SESSION['PAGE_NAME']);
		unset($_SESSION['CURRENT_URL']);
		unset($_SESSION['CURRENT_URL_AJAX']);
		header("Location:index.php");
	}
	function UploadImage($file,$table_name,$dbcolumn,$where_column,$id,$width,$height,$th_width=0,$th_height=0){
		$filename=str_replace(" ","-",trim($file['name']));
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
			$path = "../uploads/".$table_name."/";
			$newfilename = $table_name."-".$id."-".$filename;
			$IM = new ImageResize();
			$IM->resizeToWidthHeight($file['tmp_name'],$path.$newfilename,$width,$height);
			if($th_height!=0 && $th_width!=0){
				$IM->resizeToWidthHeight($file['tmp_name'],$path."th_".$newfilename,$th_width,$th_height);
			}
			$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
		}
	}
	function UploadPromoAudioFile($file,$table_name,$dbcolumn,$where_column,$id,$dirnm){
		$filename=$this->ImgReplace(trim($file['name']));
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="mp3" || $ext=="wma" || $ext=="ogg" || $ext=="wav"  || $ext=="mid"  || $ext=="wma"){
			$path = "../".$dirnm."/";
			$newfilename = time().rand(999,9999)."_".$id.uniqid().".".$ext;
			if(move_uploaded_file($file['tmp_name'],$path.$newfilename)){
				$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
			}
		}
	}
	function UploadTaxCreditFile($file,$table_name,$dbcolumn,$where_column,$id){
		$filename = strtolower(str_replace(" ","-",$this->ReplaceSql($file['name'])));
		$file_arr = explode(".",$filename);
		$ext = $file_arr[count($file_arr)-1];
		$dir = "../taxcredits/";
		$path = $dir;
		$newfilename = time().rand(2,98989).$filename;
		if(!file_exists($path)){mkdir($path);}
		move_uploaded_file($file['tmp_name'],$dir.$newfilename);
		$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
		
	}
	function UploadAdvFile($file,$table_name,$dbcolumn,$where_column,$id){
		$filename = strtolower(str_replace(" ","-",$this->ReplaceSql($file['name'])));
		$file_arr = explode(".",$filename);
		$ext = $file_arr[count($file_arr)-1];
		$dir = "../main_advertisements/";
		$path = $dir;
		$newfilename = time().rand(2,98989).$filename;
		if(!file_exists($path)){mkdir($path);}
		move_uploaded_file($file['tmp_name'],$dir.$newfilename);
		$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
		
	}
	function UploadFixImage($file,$table_name,$dbcolumn,$where_column,$id,$th_width,$th_height){
		$filename=str_replace(" ","-",trim($file['name']));
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
			$path = "../".$table_name."/";
			$newfilename = $table_name."-".$id."-".$filename;
			$IM = new ImageResize();
			$IM->FixresizeToWidthHeight($file['tmp_name'],$path."th_".$newfilename,$th_width,$th_height);
			$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
		}
	}
	function UploadAudioFile($file,$table_name,$dbcolumn,$where_column,$id,$track_id){
		$filename=$this->ImgReplace(trim($file['name']));
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="mp3" || $ext=="wma" || $ext=="ogg" || $ext=="wav"  || $ext=="mid"  || $ext=="wma"){
			$path = "../".$table_name."/track_".$track_id."/";
			if(!file_exists($path)){mkdir($path);}
			$newfilename = time().rand(99,999).uniqid().".".$ext;
			if(move_uploaded_file($file['tmp_name'],$path.$newfilename)){
				$this->UpdateQuery("update ".$table_name." set track_id='".$track_id."', ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
			}
		}
	}
	function DeleteTracks($filepath){
		if($filepath!=''){
			if(file_exists(UPLOAD_PATH_ORG.$filepath)===TRUE){
				unlink(UPLOAD_PATH_ORG.$filepath);
			}
		}
	}
	function UploadImageFile($file,$table_name,$dbcolumn,$where_column,$id,$th_width=150,$th_height=150){
		$filename=str_replace(" ","-",trim($file['name']));
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
		$path = "../".$table_name."/";
		$newfilename = strtolower($table_name."-".$id.time()."-".$filename);
		if ($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
			$IM = new ImageResize();
			$IM->resizeToWidthHeight($file['tmp_name'],$path."th_".$newfilename,$th_width,$th_height);
			$IM->resizeToWidthHeight($file['tmp_name'],$path.$newfilename,800,800);
		} else if ($ext=="pdf" || $ext=="xls" || $ext=="xlsx" || $ext=="doc" || $ext=="docx" || $ext=="ppt" || $ext=="pptx" || $ext=="csv" || $ext=="zip" || $ext=="rar"){
			move_uploaded_file($file['tmp_name'],$path.$newfilename);
		}
		$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
	}
	function FixedUploadImage($file,$table_name,$dbcolumn,$where_column,$id,$width,$height,$th_width=0,$th_height=0,$thumb=false){
		$filename=str_replace(" ","-",trim($file['name']));
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
			$path = "../images/".$table_name."/";
			$newfilename = time()."-".rand(99,999).uniqid().".".$ext;
			$IM = new ImageResize();
			$IM->fixToWidthHeight($file['tmp_name'],$path.$newfilename,$width,$height);
			if($thumb==true){
				$IM->fixToWidthHeight($file['tmp_name'],$path."th_".$newfilename,$th_width,$th_height);
			}
			$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
		}
	}
	function FUploadImage($file,$table_name,$dbcolumn,$where_column,$id,$width,$height,$th_width=0,$th_height=0,$thumb=false){
		$filename=str_replace(" ","-",trim($file['name']));
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
	
		
		if ($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
			$path = "../images/".$table_name."/";
			$newfilename = time()."-".rand(99,999).uniqid().".".$ext;
		    move_uploaded_file($file['tmp_name'],$path.$newfilename);
			
			$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
		}
	}
	
	
		function FixedUploadDoc($file,$table_name,$dbcolumn,$where_column,$id){
		$filename=str_replace(" ","-",trim($file['name']));
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="pdf" || $ext=="doc"){
			$path = "../images/".$table_name."/";
			$newfilename = time()."-".rand(99,999).uniqid().".".$ext;
			move_uploaded_file($file['tmp_name'],$path.$newfilename);
			$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
		}
	}
	function FixedUploadBanner($file,$table_name,$dbcolumn,$link,$where_column,$id,$width,$height,$th_width=0,$th_height=0,$thumb=false){
		$filename=str_replace(" ","-",trim($file['name']));
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
			$path = "../images/".$table_name."/";
			$newfilename = time()."-".rand(99,999).uniqid().".".$ext;
			$IM = new ImageResize();
			$IM->fixToWidthHeight($file['tmp_name'],$path.$newfilename,$width,$height);
			if($thumb==true){
				$IM->fixToWidthHeight($file['tmp_name'],$path."th_".$newfilename,$th_width,$th_height);
			}			echo "update ".$table_name." set ".$dbcolumn."='".$newfilename."', link='".$link."' where ".$where_column."='".$id."'";
			$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."', link='".$link."' where ".$where_column."='".$id."'");
		}
	}
	function NewFixedUploadImage($file,$folder,$table_name,$dbcolumn,$where_column,$id,$width,$height,$th_width=0,$th_height=0,$thumb=false){
		$filename=str_replace(" ","-",trim($file['name']));
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
			$path = "../".$folder."/";
			$newfilename = time()."-".rand(99,999).uniqid().".".$ext;
			$IM = new ImageResize();
			$IM->fixToWidthHeight($file['tmp_name'],$path.$newfilename,$width,$height);
			if($thumb==true){
				$IM->fixToWidthHeight($file['tmp_name'],$path."th_".$newfilename,$th_width,$th_height);
			}
			$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
		}
	}
	function FixedUploadThreeImage($file,$table_name,$dbcolumn,$where_column,$id,$width,$height,$th_width=0,$th_height=0,$tht_width=0,$tht_height=0,$thumb=false){
		$filename=str_replace(" ","-",trim($file['name']));
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
			$path = "../".$table_name."/";
			$newfilename = time()."-".rand(99,999).uniqid().".".$ext;
			$IM = new ImageResize();
			$IM->fixToWidthHeight($file['tmp_name'],$path.$newfilename,$width,$height);
			if($thumb==true){
				$IM->fixToWidthHeight($file['tmp_name'],$path."th_".$newfilename,$th_width,$th_height);
				$IM->fixToWidthHeight($file['tmp_name'],$path."tht_".$newfilename,$tht_width,$tht_height);
			}
			$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
		}
	}
	function NewFixedUploadThreeImage($file,$folder,$table_name,$dbcolumn,$where_column,$id,$width,$height,$th_width=0,$th_height=0,$tht_width=0,$tht_height=0,$thumb=false){
		$filename=str_replace(" ","-",trim($file['name']));
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
			$path = "../".$folder."/";
			$newfilename = time()."-".rand(99,999).uniqid().".".$ext;
			$IM = new ImageResize();
			$IM->fixToWidthHeight($file['tmp_name'],$path.$newfilename,$width,$height);
			if($thumb==true){
				$IM->fixToWidthHeight($file['tmp_name'],$path."th_".$newfilename,$th_width,$th_height);
				$IM->fixToWidthHeight($file['tmp_name'],$path."tht_".$newfilename,$tht_width,$tht_height);
			}
			$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
		}
	}
	function NewFixedUploadThreeImageProduct($file,$folder,$table_name,$dbcolumn,$where_column,$id,$width,$height,$th_width=0,$th_height=0,$tht_width=0,$tht_height=0,$thumb=false){
			$path = "../images/".$folder."/";
			$newfilename = $file['name'];
	
			$IM = new ImageResize();
			$IM->fixToWidthHeight($file['tmp_name'],$path.$newfilename,$width,$height);
			if($thumb==true){
				$IM->fixToWidthHeight($file['tmp_name'],$path."th_".$newfilename,$th_width,$th_height);
				$IM->fixToWidthHeight($file['tmp_name'],$path."tht_".$newfilename,$tht_width,$tht_height);
			}
			//$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
		
	}
	function NewFixedUploadThreeImagesection($file,$folder,$table_name,$dbcolumn,$where_column){
			$path = "../images/".$folder."/";
			
			$newfilename = $file['name'];
			move_uploaded_file($file['tmp_name'],$path.$newfilename);
			
			//$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
		
	}
	function NewFixedUploadThreeImageProduct_doc ($file,$folder,$table_name,$dbcolumn,$where_column,$id,$width,$height,$th_width=0,$th_height=0,$tht_width=0,$tht_height=0,$thumb=false){
		
		
		
		$filename=str_replace(" ","-",trim($file['name']));
		$file_arr = explode(".",$filename);
		
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="pdf" || $ext=="doc" || $ext=="xls" || $ext=="png" || $ext=="jpg"){
			$path = "../images/products/".$folder."/";
			$newfilename1 = $file['name'];
			move_uploaded_file($file['tmp_name'],$path.$newfilename1);
			} 
			else{
					$IM = new ImageResize();
			        $IM->fixToWidthHeight($file['tmp_name'],$path.$newfilename1,$width,$height);
			     if($thumb==true){
				$IM->fixToWidthHeight($file['tmp_name'],$path."th_".$newfilename1,$th_width,$th_height);
				$IM->fixToWidthHeight($file['tmp_name'],$path."tht_".$newfilename1,$tht_width,$tht_height);
			   }
			}
			  
			
	}
	function NewFixedUploadThreeImagesupply_doc ($file,$folder,$table_name,$dbcolumn,$where_column,$id,$width,$height,$th_width=0,$th_height=0,$tht_width=0,$tht_height=0,$thumb=false){
		
		$filename=str_replace(" ","-",trim($file['name']));
		$file_arr = explode(".",$filename);
		
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="pdf" || $ext=="doc" || $ext=="xls" || $ext=="png" || $ext=="jpg"){
			$path = "../images/supplies/".$folder."/";
			$newfilename1 = $file['name'];
			move_uploaded_file($file['tmp_name'],$path.$newfilename1);
			} 
			else{
					$IM = new ImageResize();
			        $IM->fixToWidthHeight($file['tmp_name'],$path.$newfilename1,$width,$height);
			     if($thumb==true){
				$IM->fixToWidthHeight($file['tmp_name'],$path."th_".$newfilename1,$th_width,$th_height);
				$IM->fixToWidthHeight($file['tmp_name'],$path."tht_".$newfilename1,$tht_width,$tht_height);
			   }
			}
	
		
	}
	function DeleteImage($dir,$img,$thumb=false){
		if($dir!='' && $img!=''){
			if(file_exists(UPLOAD_PATH_ORG.$dir."/".$img)===TRUE){
				unlink(UPLOAD_PATH_ORG.$dir."/".$img);
			}
			if($thumb==true){
				if(file_exists(UPLOAD_PATH_ORG.$dir."/".$img)===TRUE){
					unlink(UPLOAD_PATH_ORG.$dir."/th_".$img);
				}
			}
		}
	}
	function DeleteThreeImage($dir,$img,$thumb=false){
		if($dir!='' && $img!=''){
			if(file_exists(UPLOAD_PATH_ORG.$dir."/".$img)===TRUE){
				unlink(UPLOAD_PATH_ORG.$dir."/".$img);
			}
			if($thumb==true){
				if(file_exists(UPLOAD_PATH_ORG.$dir."/".$img)===TRUE){
					unlink(UPLOAD_PATH_ORG.$dir."/th_".$img);
					unlink(UPLOAD_PATH_ORG.$dir."/tht_".$img);
				}
			}
		}
	}
	function GetCategoryName($catid,$subid){
		if($catid!=''){
			$ret = array();
			$query = "select category_title from category where category_id in (".$catid.")";
			if($data = $this->SelectQuery($query)){foreach($data as $row){
				$ret[] = "&raquo; ".$row['category_title'];
			}}
			
			return implode("<br>",$ret);
		}
		return "";
	}
	function GetAboutFeatures($aboutid){
		if($aboutid!=''){
			$ret = array();
			$query = "select feature_title from aboutus_features where about_id in (".$aboutid.")";
			if($data = $this->SelectQuery($query)){foreach($data as $row){
				$ret[] = "&raquo; ".$row['feature_title'];
			}}
			return implode("<br>",$ret);
		}
		return "";
	}
	function UploadImageFix($file,$table_name,$dbcolumn,$where_column,$id,$width,$height=0,$th_width=0,$th_height=0){
		$filename=str_replace(" ","-",trim($file['name']));
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
			$path = "../".$table_name."/";
			$newfilename = $table_name."-".$id."-".$filename;
			$IM = new ImageResize();
			if($height==0){
				$IM->fixToWidthHeight($file['tmp_name'],$path.$newfilename,$width);
			}else{
				$IM->fixToWidthHeight($file['tmp_name'],$path.$newfilename,$width,$height);
			}
			if($th_height!=0 && $th_width!=0){
				$IM->fixToWidthHeight($file['tmp_name'],$path."th_".$newfilename,$th_width,$th_height);
			}
			$this->UpdateQuery("update ".$table_name." set ".$dbcolumn."='".$newfilename."' where ".$where_column."='".$id."'");
		}
	}
	function InsertUploadImage($file,$table_name,$img,$refcolumn,$refval,$W,$H,$arr=null){
		$filename=$this->ImgReplace($file['name']);
		$rand = date("YmdHis").rand(1000,9999);
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
			$path = "../".$table_name."/";
			$newfilename = $table_name."-".$refval."-".$rand."-".$filename;
			$IM = new ImageResize();
			$IM->resizeToWidthHeight($file['tmp_name'],$path.$newfilename,1600,1600);
			$IM->resizeToWidthHeight($file['tmp_name'],$path."th_".$newfilename,$W,$H);
			$str =''; 
			if($arr && is_array($arr)){
				foreach($arr as $k => $v){
					$str .= ",{$k}='{$v}'";
				}
			}
			$this->UpdateQuery("insert into ".$table_name." set ".$img."='".$newfilename."',".$refcolumn."='".$refval."' {$str}");
		}
	}
	function InsertUploadImageFix($file,$table_name,$img,$refcolumn,$refval,$W){
		$filename=$this->ImgReplace($file['name']);
		$rand = date("YmdHis").rand(1000,9999);
		$file_arr = explode(".",$filename);
		$ext = strtolower($file_arr[count($file_arr)-1]);
		if ($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
			$path = "../".$table_name."/";
			$newfilename = $table_name."-".$refval."-".$rand."-".$filename;
			$IM = new ImageResize();
			$IM->resizeToWidth($file['tmp_name'],$path.$newfilename,$W);
			$this->UpdateQuery("insert into ".$table_name." set ".$img."='".$newfilename."',".$refcolumn."='".$refval."'");
		}
	}
	function MakeXMLTag($val){
		$val = strip_tags($val);
		$val = str_replace("&nbsp;"," ",$val);
		$val = str_replace("&","and",$val);
		return $val;
	}
	function MultipleSessionImages($session_tmp,$dir_table,$field_nm,$table_id,$id,$options=""){
		$path = UPLOAD_PATH_ORG.$dir_table."/".$id;
		if(!file_exists($path)){mkdir($path);}
		if(count($_SESSION[$session_tmp])>0){
			foreach($_SESSION[$session_tmp] as $key => $val){
				$arr = explode("|",$val);
				$key = $this->ImgReplace($key);
				if(file_exists(UPLOAD_PATH_ORG.$arr[0]."/org_".$key)==true){
					@copy(UPLOAD_PATH_ORG.$arr[0]."/org_".$key, $path."/org_".$key);
					@unlink(UPLOAD_PATH_ORG.$arr[0]."/org_".$key);
				}
				if(file_exists(UPLOAD_PATH_ORG.$arr[0]."/".$key)==true){
					@copy(UPLOAD_PATH_ORG.$arr[0]."/".$key, $path."/".$key);
					@unlink(UPLOAD_PATH_ORG.$arr[0]."/".$key);
				}
				if(file_exists(UPLOAD_PATH_ORG.$arr[0]."/th_".$key)==true){
					@copy(UPLOAD_PATH_ORG.$arr[0]."/th_".$key, $path."/th_".$key);
					@unlink(UPLOAD_PATH_ORG.$arr[0]."/th_".$key);
				}
				$this->InsertQuery("insert into ".$dir_table." set ".$field_nm."='".$key."', ".$table_id."='".$id."' ".$options);
			}
		}
		unset($_SESSION[$session_tmp]);
	}
	function GenerateRss(){
		$xml = '<?xml version="1.0"?>';
		$xml .= "\n".'<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">';
		$xml .= "\n\t".'<channel>';
		$xml .= "\n\t\t".'<title>Hatunot Wedding Blog</title>';
		$xml .= "\n\t\t".'<description>The English Speaker’s Guide to Planning a Wedding in Israel</description>';
		$xml .= "\n\t\t".'<link>'.WEBSITE_URL.'</link>';
		$xml .= "\n\t\t".'<atom:link href="'.WEBSITE_URL.'rss.xml" rel="self" type="application/rss+xml" />';
		
		if($data = $this->SelectQuery("select blog_title,blog_date,blog_desc,blog_img from blog_blog order by blog_date desc limit 50")){
			foreach($data as $row){
				$val = str_replace("&nbsp;"," ",$val);
				$val = str_replace("&","and",$val);
				$xml .= "\n\t\t".'<item>';
				$xml .= "\n\t\t\t".'<title>'.$this->MakeXMLTag($row['blog_title']).'</title>';
				$xml .= "\n\t\t\t".'<description>'.substr($this->MakeXMLTag($row['blog_desc']),0,200).'</description>';
				$xml .= "\n\t\t\t".'<link>'.$this->MakeBlogUrl($row).'</link>';
				$xml .= "\n\t\t\t".'<guid>'.$this->MakeBlogUrl($row).'</guid>';
				$xml .= "\n\t\t\t".'<pubDate>'.date("D, d M Y",strtotime($row['blog_date'])).'</pubDate>';
				if($row['blog_img']!=''){
					$xml .= "\n\t\t\t".'<image>';
					$xml .= "\n\t\t\t\t".'<url>'.WEBSITE_URL.$row['blog_img'].'</url>';
					$xml .= "\n\t\t\t\t".'<title>'.$row['blog_title'].'</title>';
					$xml .= "\n\t\t\t\t".'<link>'.$this->MakeBlogUrl($row).'</link>';
					$xml .= "\n\t\t\t".'</image>';
				}
				$xml .= "\n\t\t".'</item>';	
			}
		}
		$xml .= "\n\t".'</channel>';
		$xml .= "\n".'</rss>';
		$fp = fopen("../rss.xml","w");
		fwrite($fp,$xml,strlen($xml));
		fclose($fp);
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
			}
			@mail($emailto,$subject,$body,$headers);			
		}else{
			echo $body;
		}
	}
	function PreCategoryValueExists($tablename,$column,$value,$columnid="",$requestid="",$precategory=""){
		if($value!=""){
			$query="select $column from $tablename where ".(($precategory!='') ? " pre_category_id=".$precategory." and ":'')." $column='".$value."'".(($columnid!='') ? " and " .  $columnid ."!='".$requestid."'":'');
			if($data = $this->SelectQuery($query)){
				return true;
			}else{
				return false;
			}
		} else {
			return false;
		}
	}
	function GenerateUrl(){
	$xml = 'RewriteEngine on'."\n";
	if($data = $this->SelectQuery("select news_id,news_title from news where news_title!=''"))
	{
		foreach($data as $row)
		{
			$xml .= 'RewriteRule ^'.$row['news_title'].'$ blog-detail.php?post_id='.$row['news_id']."\n";
		}
	}
	$fp = fopen("../.htaccess","w");
	fwrite($fp,$xml,strlen($xml));
	fclose($fp);
	}
}
?>