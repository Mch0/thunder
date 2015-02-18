
$('document').ready(function(){
    var classpubs = '#pub-hp-haut';
//,'.pave-pub-carre','#pub-rg-haut'

    var currentPub = $('.mega-ban');
    var idad = '#cg_728x90_atf';
    var child = currentPub.children(idad);
    if(child.length > 0)
    {
        console.log('il y a bien une pub mega ban, adblock desactive');
    }
    else
    {
        console.log('il n\'y as pas de pub mega ban, adblock active');
        $('.noadblock').removeClass('hidden');
    }
        });

