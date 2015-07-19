// JavaScript Document

if( !supporto_javascript() ) alert('Javascript non è supportato!!');
	
function StartPage(){
	print_date();
	menu_current_item(); 
	//loading(); 
	//valida_form();

}
	// Validazione del form_login
// 	var form_login = document.getElementById("form_login");
// 	var lista_input = form_login.getElementsByTagName("input");
// 	form_login.onsubmit = form_valida(lista_input);
// 	alert(form_login.onsubmit);

	// Validazione del form_mail
	//......
	
	
	//var checkflag = "true";
	//check(field);	
	
// Gestione del focus campo "username" del form

// window.document.write('<div id="loading"><br \/><br \/>Loading...<\/div>');
// window.document.body.style.display="none";

//  ---------------------------------------

/* DEFINIZIONE DELLE FUNZIONI */

//  ---------------------------------------




function loading(){
	document.getElementById("loading").style.display="none";
	window.document.body.style.display="";

}

function check(field) {
	if (checkflag == "false") {
		for (i = 3; i < 50 ; i++) {
			field[i].checked = true;
		}
		checkflag = "true";
		return "Uncheck All";
	}

	else {
  		for (i = 3; i < 50 ; i++) {
			field[i].checked = false;
		}
		checkflag = "false";
		return "  Check All  ";
	}
}




function form_valida(lista_input)
{
   var checkUser = new RegExp(/^[\da-zA-Z]{6,}$/);
   var checkPass = new RegExp(/^.{8,}$/);

   if( ! checkUser.test( lista_input[0].value )  )
   {
      alert(lista_input[0].getAttribute('nome'));
      alert("Digitare l'user!");
      return false;
   }
   if( ! checkPass.test( lista_input[1].value )  )
   {
      alert("Digitare la password!");
      return false;
   }
   return true;
}
//  ---------------------------------------


//  ---------------------------------------

function print_date(){
var div_date = document.getElementById("date");
   var months = new Array(13);
   months[1] = "Jan";
   months[2] = "Feb";
   months[3] = "Mar";
   months[4] = "Apr";
   months[5] = "May";
   months[6] = "Jun";
   months[7] = "Jul";
   months[8] = "Aug";
   months[9] = "Sep";
   months[10] = "Oct";
   months[11] = "Nov";
   months[12] = "Dec";
   var time = new Date();
   var lmonth = months[time.getMonth() + 1];
   var date = time.getDate();
   var year = time.getYear();
   if (year < 2000)
   year = year + 1900;
   div_date.innerHTML = date + " " + lmonth + " " + year;
}

//  ---------------------------------------

function supporto_javascript()
{
   return true;
}

// ----------------------------------------



// ----------------------------------------
// funzioni seleziona/deseleziona tutto

function checkTutti() {
  with (document.modulo) {
    for (var i=0; i < elements.length; i++) {
        if (elements[i].type == 'checkbox')
           elements[i].checked = true;
    }
  }
}
function uncheckTutti() {
  with (document.modulo) {
    for (var i=0; i < elements.length; i++) {
        if (elements[i].type == 'checkbox')
           elements[i].checked = false;
    }
  }
}


// ----------------------------------------
// apri in una nuova finestra

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}


function f(myform){
	var valoreselect = myform.mac_list.options[myform.selectedIndex].value;
	alert(valoreselect);
}


//document.onmouseover = mOver ;
//document.onmouseout = mOut ;

//function mOver() {
//	var eSrc = window.event.srcElement ;
//	if (eSrc.className == "item") {
//		window.event.srcElement.className = "highlight";
//	}
//}

//function mOut() {
//	var eSrc = window.event.srcElement ;
//	if (eSrc.className == "highlight") {
//		window.event.srcElement.className = "item";
//	}
//}


function menu_current_item(){
	$(document).ready(
	function() {
		$('#master_menu ul li a').each(function(i){
			// assegna un id e l'evento onclick ad ogni linguetta
			$(this).attr('id','menu-item-' + i);
			$(this).click( function() {return CurrentItem(this.id);} );
			//$('#'+ this.id).blur() //toglie il focus dal tab cliccato  
			});
	});
	function CurrentItem(menuitemcurrent) {
		$('#master_menu ul li a').each(
		function(i){
			//console.log (this.id + ' ' + $('#'+this.id).attr('className'))
			if (this.id == menuitemcurrent){
			   $('#'+this.id).addClass('current');
			}
			else {
			   //$('#'+this.id).removeClass();
			}
		});
	} 
}

onload = StartPage;