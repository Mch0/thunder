jQuery(function($){
    var portfolio = $('#content-champions');
    portfolio.masonry({
        isAnimated: true,
        itemSelector:'.bloc:not(.hidden)',
        isFitWidth:true,
        columnWidth:50,
        filtersGroupSelector: '.filters'
    });


    var bloc = portfolio.find('.bloc:first');
    var cssi = {width:bloc.width(),height:bloc.height()};
    var cssf = {width:270,height:bloc.height()};

    portfolio.find('a.thumb').click(function(e){
        var elem = $(this);
        console.log(cssf);
        console.log(cssi);
        var fold = portfolio.find('.unfold').removeClass('unfold').css(cssi);
        var unfold = elem.parent().addClass('unfold').css(cssf);
        portfolio.masonry("reloadItems");
        portfolio.masonry();
        if(cssf == null){
            cssf = {
                width : unfold.width(),
                height: unfold.height()
            };
        }
        unfold.css(cssi).animate(cssf);
        e.preventDefault();
    });

    if(location.hash != ''){
        $('a[href="'+location.hash+'"]').trigger('click');
    }

    $('#search-champ').change(function(){
        var search = $(this).val();
        var champions = $('#content-champions');
        if(search == '')
        {
            champions.find('.bloc').removeClass('hidden');
            portfolio.masonry("reloadItems");
            portfolio.masonry();
        }
        var chaine = '.bloc:not(.'+search+')';
        console.log(chaine);
        champions.find(chaine).addClass('hidden');
        portfolio.masonry("reloadItems");
        portfolio.masonry();
    });
    $('.lane-filter').click(function(){
        var champions = $('#content-champions');
        var poste = $(this).val();
        if(poste == "reset")
        {
            champions.find('.bloc').removeClass('hidden');
            console.log(champions.find('.unfold'));
            champions.find('.unfold').removeClass('unfold').css(cssi);
            portfolio.masonry("reloadItems");
            portfolio.masonry();
            return;
        }
        var chaine = '.bloc:not(.'+poste+')';
        champions.find(chaine).addClass('hidden');
        portfolio.masonry("reloadItems");
        portfolio.masonry();
    });

})