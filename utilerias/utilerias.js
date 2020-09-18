// ----------------------------------------------------------------------------------
// utilerias.js
// ----------------------------------------------------------------------------------
// Autor. Ing. Antonio Barajas del Castillo
// ----------------------------------------------------------------------------------
// Fecha Ultima Modificación
// 18/09/2020
// ----------------------------------------------------------------------------------

// ----------------------------------------------------------------------------------
// GENERALES

function fn_Ocultar_Error(){
	 $("#modal_falla").modal("hide");
}

function Ocultar_Espera(){
      $("#modal_espera").modal("hide");
}

   
function fn_Encima(i,tipo){    
    document.getElementById("id_r"+i).style.background="#DEE0E2";
}

function fn_Dejar(i,tipo){
    if(tipo=="SELL"){
        document.getElementById("id_r"+i).style.background="#3FF63A";
    } else {
        document.getElementById("id_r"+i).style.background="#FFF";
    }     
    
}
// ----------------------------------------------------------------------------------
 
// ---------------------------------------------------------------------------------- 
function fn_Generar_Clic(l_CondicionExtra,l_Modulo){
      var obj;
      var bandEncontrado=0;9

      switch(l_Modulo){
		 	 
	      // Reportesw
	      
	      case "reportes_historial":
			obj = new cl_Reportes_Historial_Vista();    
			bandEncontrado=1;  
                  break;
			  
    }

    if(bandEncontrado==1){
        obj.Generar_Clic(l_CondicionExtra);
    }     
}
// ---------------------------------------------------------------------------------- 