<!doctype html>
<html>
   
	<head>      
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta charset="utf-8">
		<title> MSQUANT Beta 1.0</title>      
	   <meta name="viewport" content="initial-scale=1, shrink-to-fit=no">
      <link rel="icon" type="image/png" href="../../iconos/favicon.ico"/>
	   <meta http-equiv="x-ua-compatible" content="ie-edge">

		<!-- *************************************************************** -->
		<!--FORMA -->
		<link rel="stylesheet" type="text/css" href="../../css/font-awesome.min.css" >		
		<link rel="stylesheet" type="text/css" href="../../css/app_new.css">
		<link rel="stylesheet" type="text/css" href="../../css/app.css">
      <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="../../css/estilos.css">
      <link rel="stylesheet" type="text/css" href="../../css/barramenus.css">
    
		<!-- *************************************************************** -->

		<!-- *************************************************************** -->
		<!--ACCIONES -->
		<script type="text/javascript" src="../../lib/jquery-1.11.3.min.js"></script>
      <script type="text/javascript" src="../../lib/jquery-3.3.1.slim.min.js"></script>
      <script type='text/javascript' src="../../lib/jquery-1.8.3.min.js"></script>     
      <script type='text/javascript' src="../../lib/jquery-1.12.2.min.js"></script>
		<script type='text/javascript' src="../../lib/wb.panel.min.js"></script>       
	   <script type="text/javascript" src="../../lib/popper.min.js"></script>
      <script type="text/javascript" src="../../lib/bootstrap.min.js"></script>
    
      <script type="text/javascript" src="../../actuadores/reportes_historial_class.ctrl.js"></script>
      <script type="text/javascript" src="../../vistas/reportes_historial.vista.js"></script>
      <script type="text/javascript" src="../../utilerias/utilerias.js"></script>      
      <!-- *************************************************************** -->

       
	</head>

	<body>
      <!-- MENSAJES -->    
      <div class="modal fade" id="modal_espera">
      <center>
     	<div class="modal-dialog">
            <div class="modal-content" style='background-color:#CCCCCC;width:50%;margin-top:100px;'>             
     	     				
	            <!-- CABEZERA -->
     	        <div class="modal-header">
     	     	    <h4 class="modal-title"></h4>
     	     	     
     	        </div>

     	        <!-- CUERPO -->
     	        <div class="modal-body justify-content-center align-items-center " style='color:#fff;'>
     	     	   <center><label id='lbl_mensaje_espera'> ESPERE UN MOMENTO  </label></center>
     	        </div>

     	        <!-- PIE DE PAGINA -->
     	        <div class="modal-footer">
     	     	     
     	        </div>
     	     </div>
         </div>   
         </center>  	 
       </div>   

       <div class="modal fade" id="modal_falla">
         <center>
     	      <div class="modal-dialog">
               <div class="modal-content" style='background-color:#FF0000;width:50%'>
     	     				
	               <!-- CABEZERA -->
     	            <div class="modal-header">
     	     	         <h4 class="modal-title"></h4>
     	     	         <button type="button" class="close" data-dismiss="modal" onclick="Ocultar_Espera()">&times;</button>
     	            </div>

     	            <!-- CUERPO -->
     	            <div class="modal-body justify-content-center align-items-center " style='color:#fff;'>
     	     	         <center><label id='lbl_mensaje_falla'> ERROR </label></center>
     	            </div>

     	            <!-- PIE DE PAGINA -->
     	            <div class="modal-footer">     	     	    
     	            </div>
     	         </div>
            </div> 
         </center>    	 
      </div>
      <!-- MENSAJES -->    

      <!-- MENU -->
      <div id="sideNavigation" class="sidenav" style='overflow:hidden'>
  
      </div>
      <!-- MENU -->
 
      <!-- ENCABEZADO -->
      <nav class="topnav">                 
         <img src="../../imagenes/logo_msquant.jpg" id="logo_app" alt="" style='width:60px;height:60px;text-align:right;margin-top:15px;margin-bottom:15px;margin-left:15px;'>      
      </nav>
      <!-- ENCABEZADO -->
      
      <!-- CONTENIDO -->
      <div id="main" class="container-fluid">
          
         <div id='contenido'>  
 

            <!-- BARRA BUSQUEDA -->
            <div class='row align-item-end h-20 align-items-center'  style='border-bottom: #D9DADA 2px solid;cursor:pointer;background-color:#e1e1e1;padding-top:5px;'>
            <form id='frm_Consultar' class="form-inline borderless" style='border-style: none;'> 
               <div class="col-12 align-middle d-flex align-items-center .hidden-md float-xs-right" style='vertical-aling:middle;display:block;font-size:10px; font-family:"Arial Black", Gadget, sans-serif'>
                 
					      <input id='idFechaAxoMes' name='FechaAxoMes' type="text" placeholder="aaaamm" class="form-control" style='height: 30px; font-size:10px; font-family:"Arial Black", Gadget, sans-serif;  '>	
                     <select name="Origen" id="cb_Origen" class="form-control-select border border-primary" style='height: 30px;width:100%; min-width:100px; max-width:500px;font-size:10px; font-family:"Arial Black", Gadget, sans-serif; margin-left:-10px; ' >
                                <option value="OP" selected >OP</option>                                                                               
                                <option value="TA" selected >TA</option>                                                                                                               
                           </select>				                    
                     <a class="nav-link" href="#" >
                        <button type="button" class="btn btn-warning" style='margin-left:-15px;font-size:12px; font-family:"Arial", Gadget, sans-serif;' onclick="fn_Generar_Clic('','reportes_historial')">Generar</button>							  							  				  
                     </a>    
                                          
                                                                             			  
               </div>
               </form> 
             </div>                  
 
             
            <!-- LISTADO -->
            <div id='listado'>       
               <br>
               <div class='row align-item-end h-20 align-items-center'  style='border-bottom: #D9DADA 2px solid;cursor:pointer;padding-bottom:10px;'>

               <div class='col-md-1 w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'> 
                     <label id='campo_5'>
                        ID                  
                     </label>
                  </div> 

                  <div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>
                     <label id='campo_1'>
                        DateTime                      
                     </label>
                  </div>

                  <div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>
                     <label id='campo_2'>
                        Type       
                     </label>
                  </div>

                  <div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>
                     <label id='campo_3'>
                        Quantity         
                     </label>
                  </div>

                  <div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'>
                     <label id='campo_4'>
                        Price       
                     </label>
                  </div>

                  <div class='col-md-1  w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'> 
                     <label id='campo_5'>
                        Amount                     
                     </label>
                  </div> 

                  <div class='col-md-1 w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'> 
                     <label id='campo_5'>
                        TradePL                     
                     </label>
                  </div> 

                  <div class='col-md-1 w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'> 
                     <label id='campo_5'>
                        accumulatePL                   
                     </label>
                  </div> 

                  <div class='col-md-1 w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'> 
                     <label id='campo_5'>
                       Balance           
                     </label>
                  </div> 

                  <div class='col-md-1 w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'> 
                     <label id='campo_5'>
                        EMA1               
                     </label>
                  </div> 

               
                  <div class='col-md-1 w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'> 
                     <label id='campo_5'>
                        SlowEMS           
                     </label>
                  </div> 

                  <div class='col-md-1 w-3 align-bottom align-self-center' style='height: 40px;text-align:left; font-size:12px; font-family:Arial black, Gadget, sans-serif;vertical-aling:middle;display:block; cursor:pointer;background-color:#F4F5F6;margin-top: auto;margin-bottom: auto;'> 
                     <label id='campo_5'>
                        FastEMS
                     </label>
                  </div> 

              
 
               </div>

            </div>

            
            
         </div>
   
      </div>
       <!-- CONTENIDO -->

     

</body>
</html>
