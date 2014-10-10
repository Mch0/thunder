
$(document).ready(function() {

  // Maitrises - clic gauche
  $('.arbre a').bind('click', function(e) {
    e.preventDefault();    
    if($('input[name="data[Guide][count]"]').val() < 30)
    {
      var tmp       = $(this).attr('href').split('-');
      var id        = parseInt(tmp[0]);
      var line      = parseInt(tmp[1]);
      var col       = parseInt(tmp[2]);
      var parent    = parseInt(tmp[3]);
      var child     = parseInt(tmp[4]);
      var total     = parseInt($(this).parent().find('.total span').html());
      var countThis = parseInt($(this).find('span.rank').html()[0]);
      
      // Si parent non actif, return false
      if(parent != 0 && !$('#mastery' + parent).find('.relation.active').length != 0)
        return false;
      
      // Si pas nombre de point requis, return false;
      if(countThis < parseInt($(this).attr('rel')) && total >= (line * 4))
      {
        $(this).find('span.rank').html(parseInt(countThis + 1) + '/' + $(this).attr('rel'));
        $('input[name="data[Guide][count]"]').val(parseInt($('input[name="data[Guide][count]"]').val()) + 1);
        $(this).parent().find('.total span').html(parseInt($(this).parent().find('.total span').html()) + 1);
        
        // Changement etat actif ou non
        if(countThis == 0) $(this).addClass('active');
        if(parseInt(countThis + 1) == parseInt($(this).attr('rel')))
          $(this).find('.relation').addClass('active');
      }
    }

    return false;
  });

  // Maitrises - clic droit
  $('.arbre a').bind('contextmenu', function(e) {
    e.preventDefault();      

    var tmp       = $(this).attr('href').split('-');
    var id        = parseInt(tmp[0]);
    var line      = parseInt(tmp[1]);
    var col       = parseInt(tmp[2]);
    var parent    = parseInt(tmp[3]);
    var child     = parseInt(tmp[4]);
    var total     = parseInt($(this).parent().find('.total span').html());
    var countThis = parseInt($(this).find('span.rank').html()[0]);

    var lastLine = $(this).parent().find('a.active:last').attr('href').split('-')[1];
    
    if($('input[name="data[Guide][count]"]').val() > 0)
    {
      if(child == 0 || $('#mastery' + id).find('.relation.active').length == 0 || $('#mastery' + child + '.active').length == 0)
      {
        if(((lastLine)*4) < parseInt(total-1) || lastLine == line) 
        {
          if($(this).find('span.rank').length != 0 && countThis > 0) 
          {
            countThis--;

            if(countThis == 0) $(this).removeClass('active');
            $(this).find('span.rank').html(countThis + '/' + $(this).attr('rel'));   

            $('input[name="data[Guide][count]"]').val(parseInt($('input[name="data[Guide][count]"]').val()) - 1);
            $(this).parent().find('.total span').html(total - 1);
            $(this).find('.relation.active').removeClass('active');
          }
        }
      }
    }
    
    return false;
  });
  
  // Champions
  $('#champions a').click(function() {
    $('#champions li.selected').removeClass('selected');
    $(this).parent().addClass('selected');
    
    $('input[name="data[Guide][championn]"]').val($(this).parent().attr('rel'));

    $('#champions li').css('opacity', '0.6');
    $('#champions li.selected').css('opacity', '1');
  });
  
  // Runes - Menu
  $('#runes .runesType').click(function() {
    var menu = $('.' + $(this).attr('id'));
    if(menu.is(':visible'))
      menu.slideUp();
    else
      menu.slideDown();
  });
  
  // Runes - Clic gauche
  $('#runes #col li').click(function() {
    var type  = $(this).parent().attr('class');
    var img   = $(this).html();
    
    if($('.rune-' + type + ':empty:first').append(img)) {}
  });
  
  $('#rune-page span').bind('contextmenu', function(e) {
    e.preventDefault();
    
    $(this).empty();
    
    return false;
  });
  

  
  // Items - Clic gauche
  $('#items #items-list li').click(function() {
    $(this).clone().appendTo('#items #items-set ul');
  });
  




  // Au submit du formulaire
  $('form#GuideAdminAddForm').submit(function() {
    
    var runes = new Array();
    var masteries = new Array();
    var items = new Array();
    
    // RUNES
    $('#rune-page span img').each(function() {
      runes.push($(this).attr('rel'));
    });
    runes = runes.join('#');
    
    $('input[name="data[Guide][runee]"]').val(runes);
    
    // MASTERIES
    $('.arbre a.active').each(function() {
      masteries.push($(this).find('.rank').attr('id') + ':' + ($(this).find('.rank').html()[0]));
    });
    masteries = masteries.join('#');
    
    $('input[name="data[Guide][masteriess]"]').val(masteries);
    
    // ITEMS
    $('#items-set ul li').each(function() {
      items.push($(this).attr('rel'));
    });
    items = items.join('#');
    
    $('input[name="data[Guide][itemm]"]').val(items);
    
    return true;
  });
  
  // Filtres
  $('#filters select').change(function() {
    document.location = "list.php?champion=" + $('#filters select.champion').find('option:selected').val() + '&poste=' + $('#filters select.poste').find('option:selected').val();
  });
});



