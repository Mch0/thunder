<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Thunderbot</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <?php  echo $this->Html->css('/design/css/main5'); ?>

    <!--guide -->
      <?php  echo $this->Html->script('/guide/js/jquery-1.10.2.min');?>

    <!--login -->
      <?php  echo $this->Html->css('/design/loginjs/css/template.css');?>
      <?php  echo $this->Html->script('/design/loginjs/js/bootstrap.modal.js');?>

  </head>

  <body>



<div class="container">
  <div class="row">



              <div class="span4">
              <div id="header_logo">
                  <a href="<?php echo $this->Html->url(array('controller' => 'articles', 'action' => 'index','plugin' => 'article'), true); ?>"><img class="ThunderBot" src="http://www.thunderbot.gg/thumb.php?src=/css/images/thunder_logo.png&w=300&zc=1" alt=""></img> </a>
              </div>
            </div>
            </div>



      </div>
  </div>



<div class="thunderbot">
<?php
    if (method_exists($this, 'fetch')){
    echo $this->fetch('content'); 
    }else{
    echo $content_for_layout;
    } 
 ?>
</div>


  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-42387963-1', 'thunderbot.gg');
    ga('send', 'pageview');
  </script>



    <?php  echo $this->Html->script('/design/js/bootstrap.min'); ?>
    <script src="offcanvas.js"></script>
  </body>
</html>
