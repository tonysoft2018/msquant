// ----------------------------------------------------------------------------------
// reportes_historial_class.ctrl.js
// ----------------------------------------------------------------------------------
// Autor. Ing. Antonio Barajas del Castillo
// ----------------------------------------------------------------------------------
// Fecha Ultima Modificación
// 18/09/2020
// ----------------------------------------------------------------------------------
 
 class cl_Reportes_Historial{
  //Propiedades 
  MODULO_OBJETO="reportes_historial";
  ID_OBJETO="";

  // Metodos
  Generar(datos){
 
      try{

          if(datos.length>0){
              $("#modal_espera").modal("show");
              var ob = JSON.stringify(datos);

              var xmlhttp = new XMLHttpRequest();
              var url = "control/consultar_todos.ctrl.php";

              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  var l_Resultado=this.responseText;  
                  console.log(l_Resultado);  

                  var obResultado=JSON.parse(l_Resultado);
                            
                  var contador=obResultado.length;
                  var i=0;
                  var l_Registros="";
                  var l_Linea="";
                  var l_Type="";
                  
                  // ----------------------------------------------------------------
                  // Construye la respuesta de la consulta
                  // Campos
             
                  // Verifica si fue exitoso
                  if(obResultado[0]["retorno"]=="TRUE"){ 
                      
                      var l_Linea="";   

                      l_Linea=l_Linea + "<div class='row align-item-end h-20 align-items-center'  style='border-bottom: #D9DADA 2px solid;cursor:pointer;padding-bottom:10px;'>";

                      l_Linea=l_Linea + "<div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>";
                      l_Linea=l_Linea + "<label id='campo_" + i + "'>";
                      l_Linea=l_Linea +  "ID";                       
                      l_Linea=l_Linea + "</label>";
                      l_Linea=l_Linea + "</div>";

                      l_Linea=l_Linea + "<div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>";
                      l_Linea=l_Linea + "<label id='campo_" + i + "'>";
                      l_Linea=l_Linea +  "DateTime";                       
                      l_Linea=l_Linea + "</label>";
                      l_Linea=l_Linea + "</div>";

                      l_Linea=l_Linea + "<div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>";
                      l_Linea=l_Linea + "<label id='campo_" + i + "'>";
                      l_Linea=l_Linea +  "Type";                       
                      l_Linea=l_Linea + "</label>";
                      l_Linea=l_Linea + "</div>";

                      l_Linea=l_Linea + "<div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>";
                      l_Linea=l_Linea + "<label id='campo_" + i + "'>";
                      l_Linea=l_Linea +  "Quantity";                       
                      l_Linea=l_Linea + "</label>";
                      l_Linea=l_Linea + "</div>";

                      l_Linea=l_Linea + "<div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>";
                      l_Linea=l_Linea + "<label id='campo_" + i + "'>";
                      l_Linea=l_Linea +  "Price";                       
                      l_Linea=l_Linea + "</label>";
                      l_Linea=l_Linea + "</div>";

                      l_Linea=l_Linea + "<div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>";
                      l_Linea=l_Linea + "<label id='campo_" + i + "'>";
                      l_Linea=l_Linea +  "Amount";                       
                      l_Linea=l_Linea + "</label>";
                      l_Linea=l_Linea + "</div>";

                      l_Linea=l_Linea + "<div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>";
                      l_Linea=l_Linea + "<label id='campo_" + i + "'>";
                      l_Linea=l_Linea +  "TradePL";                       
                      l_Linea=l_Linea + "</label>";
                      l_Linea=l_Linea + "</div>";

                      l_Linea=l_Linea + "<div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>";
                      l_Linea=l_Linea + "<label id='campo_" + i + "'>";
                      l_Linea=l_Linea +  "AccumulatePL";                       
                      l_Linea=l_Linea + "</label>";
                      l_Linea=l_Linea + "</div>";

                      l_Linea=l_Linea + "<div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>";
                      l_Linea=l_Linea + "<label id='campo_" + i + "'>";
                      l_Linea=l_Linea +  "Balance";                       
                      l_Linea=l_Linea + "</label>";
                      l_Linea=l_Linea + "</div>";

                      l_Linea=l_Linea + "<div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>";
                      l_Linea=l_Linea + "<label id='campo_" + i + "'>";
                      l_Linea=l_Linea +  "EMA1";                       
                      l_Linea=l_Linea + "</label>";
                      l_Linea=l_Linea + "</div>";

                      l_Linea=l_Linea + "<div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>";
                      l_Linea=l_Linea + "<label id='campo_" + i + "'>";
                      l_Linea=l_Linea +  "SlowEMS";                       
                      l_Linea=l_Linea + "</label>";
                      l_Linea=l_Linea + "</div>";

                      l_Linea=l_Linea + "<div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>";
                      l_Linea=l_Linea + "<label id='campo_" + i + "'>";
                      l_Linea=l_Linea +  "FastEMS";                       
                      l_Linea=l_Linea + "</label>";
                      l_Linea=l_Linea + "</div>";
  
 
                      l_Linea=l_Linea + "</div>"; 

                      for(i=0;i<contador;i++){               

                          l_Type=obResultado[i]["type"];

                          if(l_Type=="SELL"){
                            l_Linea=l_Linea + "<div id='id_r" + i +"' class='row align-item-end h-20 align-items-start ' style='border-bottom: #D9DADA 2px solid;cursor:pointer;font-size:12px;background-color:#3FF63A' onmouseover=\"fn_Encima("+i + ",'" + l_Type +"')\" onmouseout=\"fn_Dejar("+i+",'" + l_Type + "')\">";
                          } else {
                            l_Linea=l_Linea + "<div id='id_r" + i +"' class='row align-item-end h-20 align-items-start ' style='border-bottom: #D9DADA 2px solid;cursor:pointer;font-size:12px;' onmouseover=\"fn_Encima("+i + ",'" + l_Type +"')\" onmouseout=\"fn_Dejar("+i+",'" + l_Type + "')\">";
                          }
                          
                         

                         

                          l_Linea=l_Linea + "<div class='col-md-1 justify-content-start align-items-left w-3 d-inline-block  text-break' >";
                          l_Linea=l_Linea + "<label style='cursor:pointer;' >" +   obResultado[i]["id"] + "</label>";
                          l_Linea=l_Linea + "</div>";  

                          l_Linea=l_Linea + "<div class='col-md-1 justify-content-start align-items-left w-3 d-inline-block  text-break' >";
                          l_Linea=l_Linea + "<label style='cursor:pointer;' >" +   obResultado[i]["datetime"] + "</label>";
                          l_Linea=l_Linea + "</div>";  

                          l_Linea=l_Linea + "<div class='col-md-1 justify-content-start align-items-left w-3 d-inline-block  text-break' >";
                          l_Linea=l_Linea + "<label style='cursor:pointer;' >" +   obResultado[i]["type"] + "</label>";
                          l_Linea=l_Linea + "</div>";  

                          l_Linea=l_Linea + "<div class='col-md-1 justify-content-start align-items-left w-3 d-inline-block  text-break' >";
                          l_Linea=l_Linea + "<label style='cursor:pointer;' >" +   obResultado[i]["quantity"] + "</label>";
                          l_Linea=l_Linea + "</div>";  

                          l_Linea=l_Linea + "<div class='col-md-1 justify-content-start align-items-left w-3 d-inline-block  text-break' >";
                          l_Linea=l_Linea + "<label style='cursor:pointer;' >" +   obResultado[i]["price"] + "</label>";
                          l_Linea=l_Linea + "</div>";  

                          l_Linea=l_Linea + "<div class='col-md-1 justify-content-start align-items-left w-3 d-inline-block  text-break' >";
                          l_Linea=l_Linea + "<label style='cursor:pointer;' >" +   obResultado[i]["amount"] + "</label>";
                          l_Linea=l_Linea + "</div>";  

                          l_Linea=l_Linea + "<div class='col-md-1 justify-content-start align-items-left w-3 d-inline-block  text-break' >";
                          l_Linea=l_Linea + "<label style='cursor:pointer;' >" +   obResultado[i]["tradepl"] + "</label>";
                          l_Linea=l_Linea + "</div>";  

                          l_Linea=l_Linea + "<div class='col-md-1 justify-content-start align-items-left w-3 d-inline-block  text-break' >";
                          l_Linea=l_Linea + "<label style='cursor:pointer;' >" +   obResultado[i]["accumulatedpl"] + "</label>";
                          l_Linea=l_Linea + "</div>";  

                          l_Linea=l_Linea + "<div class='col-md-1 justify-content-start align-items-left w-3 d-inline-block  text-break' >";
                          l_Linea=l_Linea + "<label style='cursor:pointer;' >" +   obResultado[i]["balance"] + "</label>";
                          l_Linea=l_Linea + "</div>";  

                          l_Linea=l_Linea + "<div class='col-md-1 justify-content-start align-items-left w-3 d-inline-block  text-break' >";
                          l_Linea=l_Linea + "<label style='cursor:pointer;' >" +   obResultado[i]["ema1"] + "</label>";
                          l_Linea=l_Linea + "</div>";  

                          l_Linea=l_Linea + "<div class='col-md-1 justify-content-start align-items-left w-3 d-inline-block  text-break' >";
                          l_Linea=l_Linea + "<label style='cursor:pointer;' >" +   obResultado[i]["slowems"] + "</label>";
                          l_Linea=l_Linea + "</div>";  

                          l_Linea=l_Linea + "<div class='col-md-1 justify-content-start align-items-left w-3 d-inline-block  text-break' >";
                          l_Linea=l_Linea + "<label style='cursor:pointer;' >" +   obResultado[i]["fastems"] + "</label>";
                          l_Linea=l_Linea + "</div>";  

                          l_Linea=l_Linea + "</div>";
                      }
 


                  } else {
                 
                      // Carga los encabezados
                      // Verifica el numero de encabezados
                  
                      l_Linea=l_Linea + "<div class='table-responsive text-nowrap table-hover' style='margin-left:-10px; width:103%'>";
                      l_Linea=l_Linea + "<table class='table'>";
           
                      l_Linea=l_Linea + "<tbody>";
                      l_Linea=l_Linea + "<tr>";
                      l_Linea=l_Linea + "<th scope='col' colspan=12 style='background-color:#F4F5F5;font-size:10px; font-family:Arial Black'> ";
                      l_Linea=l_Linea + "<label style='cursor:pointer;'> NO TIENE REGISTROS </label>";
                      l_Linea=l_Linea + "</th>";
                      l_Linea=l_Linea + "</tr>";
                      l_Linea=l_Linea + "</tbody>"; 

                      l_Linea=l_Linea + "</table>";
                      l_Linea=l_Linea + "</div>";
                                    
                      document.getElementById("lbl_mensaje_falla").innerHTML=obResultado[0]["msg"];     
                      $("#modal_falla").modal("show");
                  }
                
                  document.getElementById("listado").innerHTML=l_Linea;  
                  $("#modal_espera").modal("hide");    

              
               
                  var obVerificar;
                  obVerificar=setInterval(function(){                      
                      $("#modal_espera").modal("hide");       
                      clearInterval(obVerificar);
                  },500);    
                  // ----------------------------------------------------------------                        
                }        
              };
  
              xmlhttp.open("POST", url, true);
              xmlhttp.send(ob);
          }   

          return true;
          
      } catch(ex){
          
          console.log(ex.message);                          
          document.getElementById("lbl_mensaje_falla").innerHTML="FALLA EN LA OPERACIÓN"
          $("#modal_falla").modal("show"); 
          $("#modal_espera").modal("hide");
          var obVerificar;
          obVerificar=setInterval(function(){                      
              $("#modal_espera").modal("hide");       
              clearInterval(obVerificar);
          },500);     
          
          return false;
      } 
     
  }    
 

 
}