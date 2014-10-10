
<div class="container">
<h1 class="thunder_orange">League of legends</h1> 
</div>



<?php foreach ($staff as $staffs): ?>

<div class="container">
	<div class="row">

      <div class="list-group panel panel-primary">

          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 

        <?php foreach ($staffs['User'] as $key => $elem): ?>
        <?php echo $elem['user_name'] ?>
        <?php

            if ($elem['avatar']) {
            echo $this->Html->image('http://www.thunderbot.gg//files/users/thumbnails/'.($elem['id'].'_scale_150.jpg'), array('class' => 'img-responsive'));
            } else {
            echo $this->Html->image("/design/css/img/robotthunderbot.png", array("class" => "img-responsive",));
            }
            ?>

        <?php endforeach; ?>
 
            			<div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
                    <p><?php echo h($staff2['User']['user_name']); ?></p>
            			</div> 

                </div>
              </div>
            </div>
        </div> 
      </div>

	</div> 
</div> 
<?php endforeach; ?>

<?php foreach ($redacteur as $staffs): ?>

<div class="container">
  <div class="row">

      <div class="list-group panel panel-primary">

          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 

        <?php foreach ($staffs['User'] as $key => $elem): ?>
        <?php echo $elem['user_name'] ?>
        <?php

            if ($elem['avatar']) {
            echo $this->Html->image('http://www.thunderbot.gg//files/users/thumbnails/'.($elem['id'].'_scale_150.jpg'), array('class' => 'img-responsive'));
            } else {
            echo $this->Html->image("/design/css/img/robotthunderbot.png", array("class" => "img-responsive",));
            }
            ?>

        <?php endforeach; ?>
 
                  <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
                    <p><?php echo h($staff2['User']['user_name']); ?></p>
                  </div> 

                </div>
              </div>
            </div>
        </div> 
      </div>

  </div> 
</div> 
<?php endforeach; ?>





</div>
</div>


