// ----------------------------------------------------------------------------------
// relatxu.vista.js
// ----------------------------------------------------------------------------------
// Autor. Ing. Antonio Barajas del Castillo
// ----------------------------------------------------------------------------------
// Fecha Ultima Modificación
// 18/09/2020
// ----------------------------------------------------------------------------------
class cl_Reportes_Historial_Vista{

    MODULO_OBJETO="reportes_historial";
    OBJETO = new cl_Reportes_Historial(); 
  
    Generar_Clic(l_CondicionExtra){
                     
        var l_idFechaAxoMes=document.getElementById("idFechaAxoMes").value;
        var l_Origen=document.getElementById("cb_Origen").value;
        

        // Limpia la información       
        l_idFechaAxoMes=l_idFechaAxoMes.trim();
       
        // Procesar
        var arreglo=new Array();
        arreglo.push( { "idfechaaxomes":l_idFechaAxoMes, "origen":l_Origen, "condicion":l_CondicionExtra } );     

        if(arreglo.length>0){       
            // Enviar para procesdar                                
           var resultado=this.OBJETO.Generar(arreglo); 
        } else {
            console.log("ERROR NO SE CARGO LA INFORMACIÓN");
        }
    }  

}
