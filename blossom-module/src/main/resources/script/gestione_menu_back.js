// script per realizzare un'interfaccia tabbed-menu

$(document).ready(function() {
	$('#checkview a').each(function(i){
		$(this).attr('id','menu-item-' + i);
		$(this).click( function() {return GestioneClickMemu(this.id);} );
		});
});

function GestioneClickMenu(menulink){
	var divcontent = $('#content');
	AttivaTab(menulink);
	MostraContenuto(menulink, divcontent);
	$('#'+menulink).blur();
	return false
}

function MostraContenuto(menulink, divcontent){
	var  UrlContent = $('#'+menulink).attr('href');
	if ( (UrlContent == undefined) || (UrlContent == '') || (UrlContent == '#') ) {
		$(divcontent).html('Attributo <i>UrlContent</i> non definito');
		return false;
	}
	if (UrlContent.substr(0,1) == '#') {
		$(divcontent).html( $(UrlContent).html() );
	}
	else {
		$(divcontent).html('<div id="loading"> <img src="../../../../css/img/loadingMoto.gif" border="0" alt="Loading... "><br /><p>Loading in progression...</p></div>');
		$.get(UrlContent, function(msg){
			$(divcontent).html(msg);
		});
	}
}

function AttivaTab(menulink) {
	$('#tab-menu ul li a').each(function(i){
		if (this.id==menulink)
		   $('#'+this.id).addClass('tab-attivo')
		else
		   $('#'+this.id).removeClass()
		});
}
