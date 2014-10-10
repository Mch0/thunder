<?php 
$this->html->meta ('description', 'ThunderBot Programme - Ne loupez aucun programme de la TV ThunderBot, compétitons, guides, entrainements de joueurs pro, il y en a pour tous les goûts', array('inline' =>false));
?>

<div class="container">
<div class="actions">
	    <?php echo $this->Html->link(__('New Event', true), array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'admin_add'),array('class'=>'btn btn-mini btn-primary')); ?>
		<?php echo $this->Html->link(__('Manage Events', true), array('plugin' => 'full_calendar', 'controller' => 'events', 'action' => 'admin_index'),array('class'=>'btn btn-mini')); ?>
		<?php echo $this->Html->link(__('Manage Streamer', true), array('plugin' => 'full_calendar', 'controller' => 'event_types', 'action' => 'admin_index'),array('class'=>'btn btn-mini')); ?>
</div>

<?php
?>
<script type="text/javascript">
plgFcRoot = '<?php echo $this->Html->url('/'); ?>' + "full_calendar";
</script>
<?php
echo $this->Html->script(array('/full_calendar/js/jquery-1.5.min', '/full_calendar/js/jquery-ui-1.8.9.custom.min', '/full_calendar/js/fullcalendar.min', '/full_calendar/js/jquery.qtip-1.0.0-rc3.min', '/full_calendar/js/ready_admin'), array('inline' => 'false'));
echo $this->Html->css('calendrier', null, array('inline' => false));
?>
<div id="calendar"></div></div>







