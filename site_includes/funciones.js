
function crea_Cookie(name,value,tiempo) {
	//tiempo en segundos  
	if (tiempo) {
		var date = new Date();
		//date.setTime(date.getTime()+(days*24*60*60*1000));
		date.setTime(date.getTime()+(tiempo*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

//--------------------

function btnClikc(btnAct,btnDes,ClassAct,ClassDes){
  jQuery("#"+btnDes).removeClass();
  jQuery("#"+btnDes).addClass(ClassDes);	
  
  jQuery("#"+btnAct).removeClass();
  jQuery("#"+btnAct).addClass(ClassAct);	
}

function objFocus(IdObj){
	jQuery("#"+IdObj+"").focus();
}
function ismaxlength(obj){
	var mlength = obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
	if (obj.getAttribute && obj.value.length > mlength)
	obj.value = obj.value.substring(0,mlength)
}



function str_replace(cadena,busca,emplaza){
	return cadena.split(busca).join(emplaza);
}


function alfanumerico(obj){
	var tecla = window.event.keyCode;
	//alert(tecla);
	if( (65<=tecla && tecla<=90) || (97<=tecla && tecla<=122) || (48<=tecla && tecla<=57) ){
	
	}else{
		if(tecla != 32){
			window.event.keyCode=0;
		}	
	 }

}


function TrimLeft(str) {
	var resultStr = "";
	var i = len = 0;
	if (str+"" == "undefined" || str == null)	
		return null;
	str += "";

	if (str.length == 0) 
		resultStr = "";
	else {	
		len = str.length;
  		while ((i <= len) && (str.charAt(i) == " "))
			i++;
  		resultStr = str.substring(i, len);
  	}
  	return resultStr;
 }


function TrimRight(str) {
	var resultStr = "";
	var i = 0;
	if (str+"" == "undefined" || str == null)	
		return null;
	str += "";
	if (str.length == 0) 
		resultStr = "";
	else {
  		i = str.length - 1;
  		while ((i >= 0) && (str.charAt(i) == " "))
 			i--;
  		resultStr = str.substring(0, i + 1);
  	}
  	return resultStr;  	
}

function Trim(str) {
	var resultStr = "";
	
	resultStr = TrimLeft(str);
	resultStr = TrimRight(resultStr);
	
	return resultStr;
}



function valida_Email(valor) {

	if (/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/.test(valor)){
	   //alert("La dirección de email .." + valor + " es correcta.")
	   return (true)
	} else {
	  //alert("La dirección de email es incorrecta..."+valor);
	  return (false);
	}
}


//========================================================


/*:::::::::::::::::: funciones default :::::::::::::::::::::::::::::::::::::::*/
function CentrarAlto(valor){
	Medida = ((screen.height / 2) - (valor / 2));
	return Medida - 30;
}
function CentrarAncho(valor) {
	Medida = ((screen.width / 2) - (valor / 2));
	return Medida - 10;
}


function loadURL(tipo,url,tit,w,h){
	if(tipo=="self"){
	  document.location.href = url;	
	}
	if(tipo=="blank"){
	   window.open(url,tit);
	}
	if(tipo=="blank_wh"){
	  window.open(url,tit,'width='+w+', height='+h+', status=no, toolbar=no ,menubar=no, resizable=yes, left=' + CentrarAncho(w) + ' top=' + CentrarAlto(h));
	}
}

function loadAdd(url,tg){
  if (tg =="") {tg="_blank";}
	
   if(tg=="_blank"){
    var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1024, height=768, top=2, left=10";
	window.open(''+url+'','',opciones);
   }
   if(tg=="_self"){
	location.href=url;
   }
}


/*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
