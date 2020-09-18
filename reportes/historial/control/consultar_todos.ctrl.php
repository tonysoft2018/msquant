<?php
// ----------------------------------------------------------------------------------
// consultar_todos.php
// ----------------------------------------------------------------------------------
// Autor. Ing. Antonio Barajas del Castillo
// ----------------------------------------------------------------------------------
// Fecha Ultima Modificación
// 18/09/2020
// ----------------------------------------------------------------------------------

class ArrayValue implements JsonSerializable {
    public function __construct(array $array) {
        $this->array = $array;
    }

    public function jsonSerialize() {
        return $this->array;
    }
}

$retorno= array();
$datos=array();

$lineas=array();


$arreglos=json_decode(stripslashes(file_get_contents("php://input")));
 
$l_NumeroDeRegistros=count($arreglos);

 
if($l_NumeroDeRegistros<=0){ 
    $datos=array();
    $datos=$datos + ["retorno"=>"FALSE"];
    $datos=$datos + ["msg"=>"NO TIENE DATOS DE CONSULTA"];
    array_push($retorno,$datos);    
    $retorno=json_encode($retorno);	 
    echo $retorno;    
    exit(1);
}

$l_IDFechaxMes=trim($arreglos[0]->{"idfechaaxomes"});
$l_Origen=trim($arreglos[0]->{"origen"});

if(strlen($l_IDFechaxMes)<=0){
    $datos=array();
    $datos=$datos + ["retorno"=>"FALSE"];
    $datos=$datos + ["msg"=>"NO TIENE FECHA X MES"];
    array_push($retorno,$datos);    
    $retorno=json_encode($retorno);	 
    echo $retorno;    
    exit(1);
}


$url="";
if($l_Origen=="TA"){
    $url="http://ta.msquant.ricohtelef.com/report/future/mes/" . $l_IDFechaxMes . "/report?format=json";
} else {
    $url="http://op.msquant.ricohtelef.com/report/future/mes/" . $l_IDFechaxMes . "/report?format=json";
}

 
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$retorno=curl_exec($ch);
curl_close($ch);
$resultado=json_decode($retorno);
 
try {

    if(is_array($resultado)){
        ExtraerJSON($resultado);
    } else {
        ExtraerCadena($l_IDFechaxMes, $l_Origen);
    }
 
} catch (Exception $e){    
   $datos=array();
   $datos=$datos + ["retorno"=>"FALSE"];
   $datos=$datos + ["msg"=>$e->getMessage()];
   array_push($retorno,$datos);    
   $retorno=json_encode($retorno);	 
   echo $retorno;    
   exit(1);
}
 
// --------------------------------------------------------


function ExtraerJSON($res_json){
    
    $retorno= array();
    $datos=array();
    $regresar=array();
    $lineas=array();

    $linea=$res_json[0];
 

    try {
      for($i=0;$i<count($res_json);$i=$i+1){
        $linea=$res_json[$i];

        // Extrae sus valores
        $datos=array();
        $datos=$datos + ["retorno"=>"TRUE"];
        $datos=$datos + ["msg"=>""]; 

        $datos=$datos + ["datetime"=>$linea->datetime];
        $datos=$datos + ["type"=>$linea->type];
        $datos=$datos + ["quantity"=>$linea->quantity];
        $datos=$datos + ["price"=>$linea->price];
        $datos=$datos + ["amount"=>$linea->amount];
        $datos=$datos + ["tradepl"=>$linea->tradePL];
        $datos=$datos + ["accumulatedpl"=>$linea->accumulatedPL];
        $datos=$datos + ["balance"=>$linea->balance];
        $datos=$datos + ["ema1"=>$linea->EMA1];
        $datos=$datos + ["ema2"=>$linea->EMA2];
        $datos=$datos + ["ema3"=>$linea->EMA3];
        $datos=$datos + ["ema4"=>$linea->EMA4];
        $datos=$datos + ["ema5"=>$linea->EMA5];
        $datos=$datos + ["slowems"=>$linea->SlowEMS];
        $datos=$datos + ["fastems"=>$linea->FastEMS];
        $datos=$datos + ["id"=>$linea->operationId];

        if(strlen($datos["datetime"])>0){
    
            if(strlen($datos["price"])>0){
                $datos["price"]=number_format($datos["price"], 2, '.', '');
            }

            if(strlen($datos["amount"])>0){
                $datos["amount"]=number_format($datos["amount"], 2, '.', '');
            }

            if(strlen($datos["tradepl"])>0){
                $datos["tradepl"]=number_format($datos["tradepl"], 2, '.', '');
            }

            if(strlen($datos["accumulatedpl"])>0){
                $datos["accumulatedpl"]=number_format($datos["accumulatedpl"], 2, '.', '');
            }

            if(strlen($datos["balance"])>0){
                $datos["balance"]=number_format($datos["balance"], 2, '.', '');
            }

            if(strlen($datos["ema1"])>0){
                $datos["ema1"]=number_format($datos["ema1"], 2, '.', '');
            }

            if(strlen($datos["slowems"])>0){
                $datos["slowems"]=number_format($datos["slowems"], 2, '.', '');
            }

            if(strlen($datos["fastems"])>0){
                $datos["fastems"]=number_format($datos["fastems"], 2, '.', '');
            }

            array_push($regresar,$datos);    
        }

       
        unset($datos);     

      }

      if(count($regresar)>0){
    
        $regresar=json_encode($regresar);	 
        echo $regresar;    
        exit(1);
      } else {
        $datos=array();
        $datos=$datos + ["retorno"=>"FALSE"];
        $datos=$datos + ["msg"=>"NO EXISTEN REGISTROS QUE CUMPLAN ESA CONDICION "];
        array_push($regresar,$datos);    
        $regresar=json_encode($regresar);	 
        echo $regresar;    
        exit(1);
     } 

  } catch (Exception $e){    
    $datos=array();
    $datos=$datos + ["retorno"=>"FALSE"];
    $datos=$datos + ["msg"=>$e->getMessage()];
    array_push($retorno,$datos);    
    $retorno=json_encode($retorno);	 
    echo $retorno;    
    exit(1);
  }
 
}

 
function ExtraerCadena($IDFechaxMes, $l_Origen){
     
    $retorno= array();
    $datos=array();
    $regresar=array();
    $lineas=array();

    $url="";
    if($l_Origen=="TA"){
        $url="http://ta.msquant.ricohtelef.com/report/future/mes/" . $IDFechaxMes;
    } else {
        $url="http://op.msquant.ricohtelef.com/report/future/mes/" . $IDFechaxMes;
    }
 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL,$url);
    
    $retorno=curl_exec($ch);
    
    curl_close($ch);
    
    $resultado=json_encode($retorno);	
       
    $pos=strpos($resultado,'"');
 
     
    if(strlen($resultado)>0){
    
        // Limpia la cadena
        $resultado=substr($resultado,1,strlen($resultado));
        
        // Separa las lineas
        while(1){
    
            $pos=strpos($resultado,'\n');
            $linea=substr($resultado,0,$pos);
            
            array_push($lineas,$linea);  
            $resto=substr($resultado,$pos+2,strlen($resultado));
            $resultado=$resto;
    
            if(strlen($resultado)<=0){
                break;
            }
        }
     
        // Separa los campos
        $l_Columna=0;    
        for($i=1;$i<count($lineas);$i=$i+1){
                 
            $bandFinal=0;
            $l_Columna=0; 
    
            $datos=array();
            $datos=$datos + ["retorno"=>"TRUE"];
            $datos=$datos + ["msg"=>""]; 
    
            $lineas[$i] = $lineas[$i] . ",";
    
            while(1){ 
                $pos=strpos($lineas[$i],",");
                $valor=substr($lineas[$i],0,$pos);        
                $resto=substr( $lineas[$i],$pos+1,strlen($lineas[$i]) );        
                $lineas[$i]=$resto;
     
                switch($l_Columna){
                    case 0:$datos=$datos + ["datetime"=>$valor];
                           $l_Columna++;
                           break;
                    case 1:$datos=$datos + ["type"=>$valor];
                           $l_Columna++;
                           break;                         
                    case 2:$datos=$datos + ["quantity"=>$valor];
                           $l_Columna++;
                           break;                
                    case 3:$datos=$datos + ["price"=>$valor];
                           $l_Columna++;
                           break; 
                    case 4:$datos=$datos + ["amount"=>$valor];
                           $l_Columna++;
                           break; 
                    case 5:$datos=$datos + ["tradepl"=>$valor];
                           $l_Columna++;
                           break; 
                    case 6:$datos=$datos + ["accumulatedpl"=>$valor];
                           $l_Columna++;
                           break; 
                    case 7:$datos=$datos + ["balance"=>$valor];
                           $l_Columna++;
                           break; 
                    case 8:$datos=$datos + ["ema1"=>$valor];
                           $l_Columna++;
                           break;
      
                    case 9:$datos=$datos + ["ema2"=>$valor];
                           $l_Columna++;
                           break; 
      
                    case 10:$datos=$datos + ["ema3"=>$valor];
                            $l_Columna++;
                            break;
      
                    case 11:$datos=$datos + ["ema4"=>$valor];
                            $l_Columna++;
                            break;
                  
                    case 12:$datos=$datos + ["ema5"=>$valor];
                            $l_Columna++;
                            break; 
      
                    case 13:$datos=$datos + ["slowems"=>$valor];
                            $l_Columna++;
                            break; 
                    
                    case 14:$datos=$datos + ["fastems"=>$valor];
                            $l_Columna++;
                            break; 
                  
                    case 15:$datos=$datos + ["id"=>$valor];
                            $l_Columna++;
                            break; 
                    case 16: $bandFinal=1;
                            break;
                }
    
                if($bandFinal==1){
                    $datos=$datos + ["id"=>$valor];
                     break;
                }
            }
    
            if(strlen($datos["datetime"])>0){
    
                if(strlen($datos["price"])>0){
                    $datos["price"]=number_format($datos["price"], 2, '.', '');
                }
    
                if(strlen($datos["amount"])>0){
                    $datos["amount"]=number_format($datos["amount"], 2, '.', '');
                }
    
                if(strlen($datos["tradepl"])>0){
                    $datos["tradepl"]=number_format($datos["tradepl"], 2, '.', '');
                }
    
                if(strlen($datos["accumulatedpl"])>0){
                    $datos["accumulatedpl"]=number_format($datos["accumulatedpl"], 2, '.', '');
                }
    
                if(strlen($datos["balance"])>0){
                    $datos["balance"]=number_format($datos["balance"], 2, '.', '');
                }
    
                if(strlen($datos["ema1"])>0){
                    $datos["ema1"]=number_format($datos["ema1"], 2, '.', '');
                }
    
                if(strlen($datos["slowems"])>0){
                    $datos["slowems"]=number_format($datos["slowems"], 2, '.', '');
                }
    
                if(strlen($datos["fastems"])>0){
                    $datos["fastems"]=number_format($datos["fastems"], 2, '.', '');
                }
    
                array_push($regresar,$datos);    
            }
    
           
            unset($datos);     
    
        } 

        if(count($regresar)>0){
    
            $regresar=json_encode($regresar);	 
            echo $regresar;    
            exit(1);
        } else {
            $datos=array();
            $datos=$datos + ["retorno"=>"FALSE"];
            $datos=$datos + ["msg"=>"NO EXISTEN REGISTROS QUE CUMPLAN ESA CONDICION "];
            array_push($regresar,$datos);    
            $regresar=json_encode($regresar);	 
            echo $regresar;    
            exit(1);
        } 
    } else {
        $datos=array();
            $datos=$datos + ["retorno"=>"FALSE"];
            $datos=$datos + ["msg"=>"NO EXISTEN REGISTROS QUE CUMPLAN ESA CONDICION "];
            array_push($regresar,$datos);    
            $regresar=json_encode($regresar);	 
            echo $regresar;    
            exit(1);
    }
     


}







?> 