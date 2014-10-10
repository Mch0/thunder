<?php
/*
$current_plugin = $this->params['plugin'];
$current_page = $this->params['action'];
$current_controller = $this->params['controller'];



<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="brand" href="#">CakePHP Poll Plugin</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li class="<?php if($current_plugin == 'polls'){ echo 'active';} ?>">
						<a href="<?php echo $this->Html->url('/admin/polls/');?>">Poll <b class="caret"></b></a>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>
*/
?>


<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container-fluid">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php echo $this->Html->link(__('admin'), array('plugin' => 'article','controller' => 'articles','action' => 'admin_index')); ?>
			<div class="nav-collapse collapse">
				<ul class="nav">

				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>