jQuery(function($){
	var portfolio = $('#portfolio');
	portfolio.masonry({
		isAnimated: true,
		itemSelector:'.bloc:not(.hidden)',
		isFitWidth:true,
		columnWidth:100
	});

	var bloc = portfolio.find('.bloc:first'); 
	var cssi = {width:bloc.width(),height:bloc.height()};
	var cssf = null; 

	portfolio.find('a.thumb').click(function(e){
		var elem = $(this);

		var fold = portfolio.find('.unfold').removeClass('unfold').css(cssi); 
		var unfold = elem.parent().addClass('unfold').css(cssf); 
		//portfolio.masonry('reload');
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
	})

	if(location.hash != ''){
		$('a[href="'+location.hash+'"]').trigger('click');
	}
})