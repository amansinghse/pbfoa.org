<?php $socialmedia = $fn->SelectQuery("SELECT * FROM socialmedia ORDER BY id ASC");

$counter = $fn->SelectQuery("SELECT * FROM counter");
$date_today =$counter[0]['date'];
$days= $counter[0]['days'];
$select_by= $counter[0]['select_by'];
$counter_date=$counter[0]['counter_date'];
$time=$counter[0]['time'];
$hours_2=0;
$mint_2=0;
$sec2=0;




if($time!='' && $select_by=='date'){
$time_2=explode(' ',$time);
$time_2_1=explode(':',$time_2[0]);
$hours_2=$time_2_1[0];
$mint_2=$time_2_1[1];
$sec2=$time_2[1];
}


$nxt_date=date('Y-m-d', strtotime($date_today. ' + '.$days.'days' ));


$cur=explode('-',$nxt_date);


?>

<script type="text/javascript" src="js/jquery.countdown.js"></script>
<script type="text/javascript">
$(function () {
	
	//var austDay = new Date();
	//var = austDay.getFullYear();
	//new Date(year, month, day, hours, minutes, seconds, milliseconds)
	//var austDay = new Date();
	//austDay = new Date(austDay.getFullYear(),austDay.getMonth(),austDay.getDate(),austDay.getHours(),austDay.getMinutes()+5);
	
 //austDay = new Date(2013,5,8,15,0);

 austDay = new Date(<? echo $cur[0];?>,<? echo $cur[1]-1;?>,<? echo $cur[2];?>,<?php echo $hours_2.','.$mint_2.','.$sec2; ?>);
 
	$('#defaultCountdown').countdown({until: austDay});

});


</script>

<div class="left-panel"> 
    <div class=" lefttrade"> 
        <h1>UPCOMING TRADE SHOWS</h1>
    </div>
    <div class="leftdays">
		<img src="images/counter/<?php echo $counter[0]['image']; ?>" alt="img">
        <div id="defaultCountdown"></div>
    </div>
    <div class="leftmember">
        <h1>MEMBERSHIP & SOCIAL NETWORKING</h1>
    </div>
    <div class="minibg">
		<?php foreach($socialmedia as $social_media) { ?>
			<div class="minileft">
				<a href="<?php echo $social_media['url']; ?>" target="_blank"><img src="images/socialmedia/<?php echo $social_media['image']; ?>" alt="<?php echo $social_media['title']; ?>" title="<?php echo $social_media['title']; ?>"></a>
			</div>
		<?php } ?>
                           
    </div>
</div>
