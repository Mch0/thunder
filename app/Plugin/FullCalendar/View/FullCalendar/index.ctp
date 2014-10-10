<?php 
$this->html->meta ('description', 'ThunderBot Programme - Ne loupez aucun programme de la TV ThunderBot, compétitons, guides, entrainements de joueurs pro, il y en a pour tous les goûts', array('inline' =>false));
?>



<?php
?>
<script type="text/javascript">
plgFcRoot = '<?php echo $this->Html->url('/'); ?>' + "full_calendar";
</script>
<?php
echo $this->Html->script(array('/full_calendar/js/jquery-1.5.min', '/full_calendar/js/jquery-ui-1.8.9.custom.min', '/full_calendar/js/fullcalendar.min', '/full_calendar/js/jquery.qtip-1.0.0-rc3.min', '/full_calendar/js/ready'), array('inline' => 'false'));
echo $this->Html->css('calendrier', null, array('inline' => false));
?>
<div id="calendar"></div>

