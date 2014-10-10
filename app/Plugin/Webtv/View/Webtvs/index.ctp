

<?php $this->html->meta ('description', 'ThunderBot WebTV - Admirez le skill ! ThunderBot TV c\'est les meilleurs joueurs League of Legends, Chaîne sur laquelle vous pouvez retrouver les meilleurs joueurs français en activité sur League of Legends ainsi que John \'HyrqBot\' Velly.', array('inline' =>false));
?>
<script src='http://www.thunderbot.gg/caster/cast.js'></script>



 <!-- CONTENT -->
<div class="container">
  <div class="row">



<div class="thunderbox2">
  <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">

                 <webtv> 
                  <div class="row"> 

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <div class="videocontainer">
                              <?php echo $webtvs[0]['Webtv']['iframe_video']; ?>
                          </div>
                    </div>

                   </div>
              </webtv> 

              <br>
                  <div class="row"> 

                     <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                           <!--  <iframe src="http://webchat.quakenet.org/?channels=thunderbot&uio=d4" width="100%" height="1000px"></iframe>-->
                             <iframe id="chattv" src="http://www.twitch.tv/ogaminglol/chat?popout=" frameborder="0" scrolling="no" height="1000px" width="100%"></iframe>

                    </div>
                  </div>

  </div>
</div>  





</div>
</div>
</div>



         
