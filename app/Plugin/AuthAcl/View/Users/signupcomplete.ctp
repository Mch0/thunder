<div class="container">
    <div class="row" id="signup-complete">
        <div class="col-xs-12 col-sm-12 col-sm-12 col-lg-12">
            <div class="page-header" >
                <h2>ThunderBot</h2>
            </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <article>
                            <h3>Merci !</h3> Vous êtes maintenant inscrit,
                            <?php if (isset($general['Setting']) && (int)$general['Setting']['require_email_activation'] == 1){?>
                            vous allez recevoir un e-mail de confirmation à l'adresse que vous avez spécifié
                            précédemment.
                            <br/>
                            Consultez vos e-mails pour activer votre compte.
                            <?php } ?>
                            <br/>
                            <br/>
                            <?php echo $this->Html->link(__('Se connecter'), array('plugin' => 'auth_acl','controller'
                            => 'users','action' => 'login')); ?>.
                        </article>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>




