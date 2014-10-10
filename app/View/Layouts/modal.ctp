<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"> 
    <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/> 
    <title><?php echo $title_for_layout; ?></title> 
    <?php echo $this->Html->meta('favicon');?>

<link href="<?php echo $this->webroot; ?>css/template.css" rel="stylesheet">
<link href="<?php echo $this->webroot; ?>bootstrap-modal/css/animate.min.css" rel="stylesheet">
<link href="<?php echo $this->webroot; ?>css/admincalendar.css" rel="stylesheet">



<link href="<?php echo $this->webroot; ?>jquery/jquery-loadmask/jquery.loadmask.css" rel="stylesheet">





<script src="<?php echo $this->webroot; ?>jquery/jquery-1.8.2.min.js"></script>
<script src="<?php echo $this->webroot; ?>jquery/jquery-loadmask/jquery.loadmask.js"></script>

<script src="<?php echo $this->webroot; ?>jquery/jquery.cookie.js"></script>
<script src="<?php echo $this->webroot; ?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $this->webroot; ?>bootstrap-modal/js/bootstrap.modal.js"></script>
<script src="<?php echo $this->webroot; ?>bootstrap-modal/js/jquery.easing.1.3.js"></script>

    </head> 
    <body>       
      
 
 
        <div class="container-fluid">
          <?php echo $this->Session->flash(); ?>
        	<?php echo $content_for_layout; ?>
        </div> 
         
         <?php echo $this->element('sql_dump'); ?>

    </body> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <?php echo $this->Html->script('admin'); ?>
    <?php echo $scripts_for_layout;?>
</html>