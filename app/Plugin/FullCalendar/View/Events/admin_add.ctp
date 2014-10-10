<?php
?>


<div class="container">
	<div class="row-fluid show-grid" id="tab_user_manager">
		<div class="span12">
			<ul class="nav nav-tabs">

					<li><?php echo $this->Html->link(__('View Calendar'), array('plugin' => 'full_calendar','controller' => 'full_calendar','action' => 'admin_index')); ?></li>

			</ul>
		</div>
	</div>




<div class="row-fluid ">
<div class="span12">
<div class="events form">
<?php echo $this->Form->create('Event');?>
	<fieldset>
 		<legend><?php __('Add Event'); ?></legend>
	<?php
		echo $this->Form->input('event_type_id');
		echo $this->Form->input('title');
		echo $this->Form->input('details');


	    echo $this->Form->input('start', array(
	        'label' => 'start',
	        'dateFormat' => 'DMY',
			'timeFormat' => '24'
	    ));



	    echo $this->Form->input('end', array(
	        'label' => 'start',
	        'dateFormat' => 'DMY',
			'timeFormat' => '24'
	    ));




		echo $this->Form->input('all_day');



		echo $this->Form->input('status', array('options' => array(
					'Confirmed' => 'Confirmed','Scheduled' => 'Scheduled','In Progress' => 'In Progress',
					'Rescheduled' => 'Rescheduled','Completed' => 'Completed'
					)
				)
			);
	?>
	</fieldset>
			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Save'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_add();" />
			</div>
		</div>
</div>

</div>




		<div class="row-fluid ">
		<div class="span12">

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

		</div>
		</div>
</div>








