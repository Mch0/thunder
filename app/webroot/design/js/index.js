$(document).ready(function() {
    $(window).scroll(function(){
        var topDist = jQuery(this).scrollTop();
        if (topDist > 100){
            $('.navbar-brand-1').addClass('hidden');

            $('.navbar-brand-2').removeClass('hidden');
            $('.navbar-brand-2').addClass('visible-lg visible-md');
            //$('#recherche').addClass('hidden').fadeOut(3000);
        }
        else {
            $('.navbar-brand-1').removeClass('hidden');
            $('.navbar-brand-2').addClass('hidden');
            $('.navbar-brand-2').removeClass("visible-md visible-lg");
            //$('#recherche').removeClass('hidden').fadeIn(3000);
        }
    });
});


(function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-42387963-1', 'thunderbot.gg');
ga('send', 'pageview');