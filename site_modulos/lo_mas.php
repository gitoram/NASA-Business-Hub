<link href='http://fonts.googleapis.com/css?family=Sniglet' rel='stylesheet' type='text/css'>
<div class="headColumna">TOP:   </div>
<a href="javascript:Visto()"><div id="visto" name="visto"  class="headLoMas">Visto</div></a>
<a href="javascript:Comentado()"><div id="comentado" name="comentado"  class="headLoMas">Comentado</div></a>
<div id="contenidoLoMas" name="contenidoLoMas" style=" width:100%; height:300px; float:left;"></div>


<script language="javascript">

function Visto(){	
  $.ajax({
  type: "POST",
  url:  "site_modulos/ajax/lo_mas_visto.php" ,
  data: "",
  cache: false,
  beforeSend : function(objeto){
		  $("#contenidoLoMas").mask("Cargando...");
	  },
  success: function(datos){
		  $("#contenidoLoMas").unmask();
		  $("#contenidoLoMas").html(datos);
	  }
  });
	var come = document.getElementById('comentado');
	var vist = document.getElementById('visto');
	come.style.color = '#cccccc';
	vist.style.color = '#000';
}	
function Comentado(){	
  $.ajax({
  type: "POST",
  url:  "site_modulos/ajax/lo_mas_comentado.php" ,
  data: "",
  cache: false,
  beforeSend : function(objeto){
		 // $("#contenidoLoMas").mask("Cargando...");
	  },
  success: function(datos){
		  //$("#contenidoLoMas").unmask();
		  $("#contenidoLoMas").html(datos);
	  }
  });
	var vist = document.getElementById('visto');
	var come = document.getElementById('comentado');
	vist.style.color = '#cccccc';	
	come.style.color = '#000';
}	

$(document).ready(function(){  
Visto();
});
</script>