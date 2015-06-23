// script per realizzare un'interfaccia tabbed-menu
// Author: Emanuele Pugliese

$(document).ready(function() {
	$('li.ajmenu a').each(function(i){
		$(this).attr('id','menu-item-' + i);
			$(this).click(  function(){ 
				var idmenu = $(this).attr('id');
				var divcontent = $('#content-page');
				AttivaTab(idmenu); 
				MostraContenuto(idmenu, divcontent);
				$('#'+idmenu).blur();
				return false
			});
		});
});

function MostraContenuto(idmenu, divcontent){
	var  UrlContent = $('#'+idmenu).attr('href');
	
	if ( (UrlContent == undefined) || (UrlContent == '') || (UrlContent == '#') ) {
		$(divcontent).html('Attributo <i>UrlContent</i> non definito'); 
		return false;
	}
	if (UrlContent.substr(0,1) == '#') {
		$(divcontent).html( $(UrlContent).html() );
	}
	else { 
		$(divcontent).html('<div id="loading"> <img src="../../css/img/loadingMoto.gif" border="0" alt="Loading... "><br /><p>Loading in progression...</p></div>');
		$.get(UrlContent, function(msg){   //prendi il contenuto a quel link
			$(divcontent).html(msg);
		});
	}
}

function AttivaTab(idmenu) {
	$('.ajmenu a').each(function(i){
		if (this.id==idmenu)
		   $('#'+this.id).addClass('tab-attivo')
		else
		   $('#'+this.id).removeClass()
		});
}
