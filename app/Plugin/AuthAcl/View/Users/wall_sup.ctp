


<?php 
$this->html->meta ('description', 'ThunderBot WebTV - Admirez le skill ! ThunderBot TV c\'est les meilleurs joueurs League of Legends en live et accessibles depuis le chat', array('inline' =>false));
?>

<?php $this->set('title_for_layout', $image['Image']['title']) ?>





 <!-- ARTICLE -->
<div class="container">
  <div class="row">


<div class="col-xs-12 col-sm-8 col-sm-8 col-lg-8">
     
      <div class="list-group panel panel-primary">
          <div class="panel-body">
            <div class="thunderbox">
              <div class="caption">
                <div class="row"> 
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  	<h1>Le mur des supporters</h1>
                     <img class="img-responsive" alt="" src="http://www.thunderbot.gg/css/images/mur_supporter.png"></img>
                  </div>
                </div>
              </div>
            </div>
        </div> 
      </div>


</div>




<!-- SIDEBAR -->
<div class="col-xs-12 col-sm-4 col-sm-4 col-lg4">
    <div class="list-group panel panel-primary">
          <div class="panel-heading text-center hidden-xs">
            <h4>VIDEOS</h4>
            </div>
          <div class="panel-body">
                <div class="tab-pane fade in active" id="home">
                <div class="row">
                <?php foreach ($videos AS $video): ?>
                        <div class="col-xs-6 col-sm-12 col-lg-12">
                          <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          <div class="thumbnail" style="">
                          <a class="" href="http://www.thunderbot.gg/videos/<?php echo $video['Video']['id']; ?>-<?php echo $video['Video']['slug']; ?>">
                          <img class="img-responsive" alt="" src="http://www.thunderbot.gg/thumb.php?src=/files/video/photo/<?php echo $video['Video']['photo_dir']; ?>/<?php echo $video['Video']['photo']; ?>&w=150&h=100&zc=1"></img></a>
                          </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                          <a class="" href="http://www.thunderbot.gg/videos/<?php echo $video['Video']['id']; ?>-<?php echo $video['Video']['slug']; ?>"><h5><?php echo $video['Video']['video_title']; ?></h5></a>
                          </div>
                          </div>
                        </div>
                <?php endforeach; ?>

                </div>
                </div>
          </div>
    </div>
</div>


    </div>
</div>









         
