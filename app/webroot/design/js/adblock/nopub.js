
$('document').ready(function(){
    var classpubs = ['#pub-hp-haut','.pave-pub-carre','#pub-rg-haut'];

    classpubs.forEach(function(y){

        var currentPub = $(y);
        console.log(currentPub.height());
        if(currentPub.height() < 10 )
        {
            $('.noadblock').removeClass('hidden');
        }

    });
        });

