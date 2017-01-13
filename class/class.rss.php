<?php
require_once("constants.php");
require_once("class.mydb.php");
class RSS extends DBClass{
		function MakeXMLTag($val){
		$val = strip_tags($val);
		$val = str_replace("&nbsp;"," ",$val);
		$val = str_replace("&","and",$val);
		return $val;
	}
	function GenerateRss(){
		$xml = '<?xml version="1.0" encoding="utf-8"?>';
		$xml .= "\n".'<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:image="http://purl.org/rss/1.0/modules/image/">';
		$xml .= "\n\t".'<channel>';
		$xml .= "\n\t\t".'<title>'.COMPANY_NAME.'</title>';
		$xml .= "\n\t\t".'<description>'.COMPANY_NAME.'</description>';
		$xml .= "\n\t\t".'<link>'.WEBSITE_URL.'</link>';
		$xml .= "\n\t\t".'<atom:link href="'.WEBSITE_URL.'rss.php" rel="self" type="application/rss+xml" />';
		
		if($data = $this->SelectQuery("select * from news order by news_id desc limit 50")){
			foreach($data as $row){
				$val = str_replace("&nbsp;"," ",$val);
				$val = str_replace("&","and",$val);
				$xml .= "\n\t\t".'<item>';
				$xml .= "\n\t\t\t".'<title>'.$this->MakeXMLTag($row['news_title']).'</title>';
				$xml .= "\n\t\t\t".'<description><![CDATA[';
				if($row['news_image']!=''){
				$xml .= '<img align="left" hspace="5px" width="120px" src="'.WEBSITE_URL."news/".$row['news_image'].'" alt="'.$row['news_title'].'" />';
				}
				$xml .= substr($this->MakeXMLTag($row['news_description']),0,1000);
				$xml .= ']]></description>';
				$xml .= "\n\t\t\t".'<link>'.WEBSITE_URL.'blog-detail.php?post_id='.$row['news_id'].'</link>';
				$xml .= "\n\t\t\t".'<guid>'.WEBSITE_URL.'blog-detail.php?post_id='.$row['news_id'].'</guid>';
				$xml .= "\n\t\t\t".'<pubDate>'.date("D, d M Y H:i:s O",strtotime($row['news_date'])).'</pubDate>';
				$xml .= "\n\t\t".'</item>';	
			}
		}
		$xml .= "\n\t".'</channel>';
		$xml .= "\n".'</rss>';
		$fp = fopen("../rss.xml","w");
		fwrite($fp,$xml,strlen($xml));
		fclose($fp);
	}
}

?>