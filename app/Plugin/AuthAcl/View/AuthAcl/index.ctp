<div id="DIV_TO_PLACE_COUNTDOWN"></div>

<div id="content">
<div style="color: Orange;">Attention à ne pas te perdre !
<a href="<?php echo $this->Html->url(array('plugin' => 'auth_acl','controller' => 'users','action' => 'signup'), true); ?>" class="btn_wait">S'enregistrer</a> </div>
<?php echo $this->Html->image('/wait/logo.png'); ?>	
</div>



<script>
	jQuery(document).ready(function(){
		jQuery("#DIV_TO_PLACE_COUNTDOWN").jCountdown({
			timeText:"2013/07/24 19:00:00",
			timeZone:1,
			style:"flip",
			color:"black",
			width:0,
			textGroupSpace:15,
			textSpace:0,
			reflection:true,
			reflectionOpacity:10,
			reflectionBlur:0,
			dayTextNumber:4,
			displayDay:true,
			displayHour:true,
			displayMinute:true,
			displaySecond:true,
			displayLabel:true,
			onFinish:function(){
				alert("finish");
			}
		});
	});
</script>