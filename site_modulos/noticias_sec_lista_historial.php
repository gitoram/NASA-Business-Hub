<div style="overflow:hidden" class="ContenModulo">
    <div class="ContenHeadMod">
    	<div align="center" class="ModuloTit" style="padding-top:5px">M&Aacute;S PUBLICACIONES</div><br />
        <div style="overflow:hidden;">
        	<input type="hidden" id="textSeccion" name="textSeccion"  class="caja" maxlength="40"  value="<?=$KeySec;?>"  />
        	<input type="text" id="textBusca" name="textBusca"  class="caja" maxlength="40" style="width:65%; height:25px; font-size:15px"  />&nbsp;&nbsp;
            <input type="button" value="Fitrar Publicaciones" onclick="buscaPub(1);" style="width:25%" />
        </div>
        
         <div style="padding-top:10px; padding-bottom:10px;">
         	<div style="font-size:1px; height:1px; background-color:#FFF">&nbsp;</div>
         </div>
         
        <div>
        	<div id="noticiasHist" style="min-height:300px"><br /><br /><br /></div>
        </div>
    </div>
    
   
    
</div>    


<script language="javascript">

function buscaPub(pag){
  var strBusca  = escape($("#textBusca").attr("value"));
  var seccion = escape($("#textSeccion").attr("value"));	
  $.ajax({
  type: "POST",
  url:  "site_modulos/ajax/noticias_historial_seccion.php" ,
  data: "pagina="+pag +"&strBusca="+strBusca + "&seccion="+ seccion ,
  cache: false,
  beforeSend : function(objeto){
		  $("#noticiasHist").mask("Cargando...");
	  },
  success: function(datos){
		  $("#noticiasHist").unmask();
		  $("#noticiasHist").html(datos);
	  }
  });
		
}	

$(document).ready(function(){  
	buscaPub(1);
});
</script>