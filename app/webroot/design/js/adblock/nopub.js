
$('document').ready(function(){
    var classpubs = '#pub-hp-haut';
//On prend juste la mega ban en haut de la page

    var currentPub = $('.mega-ban');
    var idad = '#cg_728x90_atf';
    //on test si la div avec class mega-ban a un enfant div #cg_728x90_atf qui est la pub
    var child = currentPub.children(idad);
    //Si il y a un enfant pour la mega ban c'est que la pub est bien présente
    if(child.length > 0)
    {
        console.log('il y a bien une pub mega ban, adblock desactive');
    }
    //Sinon il n'y a pas d'enfant c'est qu'il n'y a pas de pub du coup adblock est activé
    else
    {
        console.log('il n\'y as pas de pub mega ban, adblock active');
        $('.noadblock').removeClass('hidden');
    }
        });

