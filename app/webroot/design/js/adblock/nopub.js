
$('document').ready(function(){
    var classpubs = ['#pub-hp-haut','.pave-pub-carre','#pub-rg-haut'];

    classpubs.forEach(function(y){

        var currentPub = $(y);

        if(currentPub.height() == null)
        {
            //si taille est null correspond a pub large RG

        }else {
            console.log(currentPub.height());
            if (currentPub.height() < 10) {
                console.log("est inferieru")
                $('.noadblock').removeClass('hidden');
            }
        }

    });
        });

