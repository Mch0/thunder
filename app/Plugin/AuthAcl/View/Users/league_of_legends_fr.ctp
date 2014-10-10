


<?php 
$this->html->meta ('description', 'league_of_legends_fr', array('inline' =>false));
?>



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
                  	<h1>ThunderBot & League of Legends FR</h1>

                     <img class="img-responsive" alt="" src="http://www.thunderbot.gg/css/images/banniere_lol_fr.jpg"></img>
                     </br>
                    <p>Créé le 22 avril 2013 par Mo', le groupe a connu un succès immédiat et une progression continue. L'idée de départ était simple : partager sur sa passion de League of Legends ailleurs que sur le launcher du jeu, la plateforme Facebook était parfaite pour cela avec sa simplificité d'utilisation de photos ou de vidéos. Aujourd'hui, le groupe fournit un véritable service à ses adhérents qui retrouvent tout l'univers LoL en quelques clics de manière communautaire : astuces, infos, images, vidéos ; faisant de ce groupe une sorte de reddit fr en plus interactif.</p> 
                    <p>Ses objectifs à moyen terme sont de monter un site internet et de multiplier les partenariats, comme celui avec le Meltdown, mettant en avant sa force de frappe communautaire</p>
                  </br>


<p>

    <span style="color: #ff6600;">
        <a href="http://www.thunderbot.gg/article/1503-thunderbot-et-league-of-legends-fr-deviennent-partenaires">
            <span style="color: #ff6600;">

               ThunderBot et League of Legends FR deviennent partenaires

            </span>
        </a>
    </span>

</p>
<p>

    <span style="color: #ff6600;">
        <a href="https://www.facebook.com/pagelolfr">
            <span style="color: #ff6600;">

                Page League of Legends FR 

            </span>
        </a>
    </span>

</p>
<p>

    <span style="color: #ff6600;">
        <a href="https://www.facebook.com/groups/groupelolfr/">
            <span style="color: #ff6600;">

                Groupe League of Legends FR

            </span>
        </a>
    </span>

</p>



                     <img class="img-responsive" alt="" src="http://www.thunderbot.gg/css/images/logo_lol_fr.png"></img>

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









         
