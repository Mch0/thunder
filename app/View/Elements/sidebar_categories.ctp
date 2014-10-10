

<div class="span4">
	<h2>Sidebar</h2>
	<?php $categories = $this->requestAction(array('controller'=>'categories','action'=>'sidebar_categories', 'plugin' => 'article','admin'=>false)); ?>
	<ul> 
		<?php foreach($categories as $k=>$v): $v = current($v); ?>
			<li><?php echo $this->Html->link($v['category_name'] ,$v['link']); ?></li>
		<?php endforeach; ?>
	</ul>
</div>
