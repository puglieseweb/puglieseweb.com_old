// ************************************************************
//		JavaScript code ued through out SimpleNews
// ************************************************************

function insertbbcodesnippet(bbcode) {
	if (document.form.snippet.createTextRange && document.form.snippet.caretPos) {
		var caretPos = document.form.snippet.caretPos;
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? bbcode + ' ' : bbcode;
		document.form.snippet.focus();
	} else {
		document.form.snippet.value+=bbcode;
		document.form.snippet.focus();
	}
}
		
function insertbbcodearticle(bbcode) {
	if (document.form.article.createTextRange && document.form.article.caretPos) {
		var caretPos = document.form.article.caretPos;
		caretPos.text = caretPos.text.charAt(caretPos.text.length - 1) == ' ' ? bbcode + ' ' : bbcode;
		document.form.article.focus();
	} else {
		document.form.article.value+=bbcode;
		document.form.article.focus();
	}
}
		
function openpopup(){
	var popurl="comments.php?news_id=$news_id"
	winpops=window.open(popurl,"","width=400,height=500,status,scrollbars,resizable,")
}

function ckeck_uncheck_all() {	
	var frm = document.editnews;
	for (var i=0;i<frm.elements.length;i++) {
		var elmnt = frm.elements[i];
		if (elmnt.type=='checkbox') {
			if(frm.master_box.checked == true){ 
				elmnt.checked=false; 
			} else {
				elmnt.checked=true; 
			}

		}

	}

	if(frm.master_box.checked == true){ 
		frm.master_box.checked = false; 
	} else {
		frm.master_box.checked = true; 
	}

}
	
function BanCheckAll() {
	var frm = document.banform;

	for (var i=0;i<frm.elements.length;i++) {
		var elmnt = frm.elements[i];

		if (elmnt.type=='checkbox') {

			if(frm.master_box.checked == true){ 
				elmnt.checked=false; 
			} else {
				elmnt.checked=true; 
			}

		}

	}

	if(frm.master_box.checked == true){
		frm.master_box.checked = false; 
	} else {
		frm.master_box.checked = true;
	}

}