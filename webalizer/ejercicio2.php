<?
class PasswordAnalyzer {
    private $numeros =2;
    private $mayusculas = 2;
    private $longitudMinima = 8;

    // Getters
    public function getNumeros(){
        return $this->numeros;
    }
    public function getMayusculas(){
        return $this->mayusculas;
    }
    public function getLongitudMinima(){
        return $this->longitudMinima;
    }
    // setters
    public funtion setNumero($value){
        if(is_int($value) && $value >= 0){
            $this->numero = $value;
        }
    }
    public function setMayusculas($value){
        if(is_int($value) && $value>=0){
             $this->mayusculas = $value;
        }
    }
    public function setlongitudMinima($value){
          if(is_int($value)&& $value>=0){
              $this->longitudMinima = $value;
    
           }
        }
    
    // metodo para determinar si la clave es fuerte

    public function esClaveFuerte($clave){
    if(strlen($clave)<$this->longitudMinima){
        return false;
    }

    $numeroCount = preg_match_all('/[0-9]/',$clave);
    $mayusculaCount = preg_match_all('/[A-Z]/',$clave);

    return($numeroCount>=$this->numero && $mayusculaCount>=this->mayusculas);
}
   //Metodo para generar una clave aleatoria
    public function generarClave() {
        $clave="";
        $chars = `abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789`;
        while (true){
            $clave ="";
            for($i = 0; $i < $this->longitudMinima;$i++){
                $clave.=$chars[random_int(0,strlen($chars)-1)];
            }
        if ($this->esClaveFuerte($clave)){
            return $clave;
            }
        }
    }
}
function analizarClave($filePath, $numeros, $mayusculas, $longitudMinima){
    $analizador=new PasswordAnalyzer();
    $analizador->setNumeros($numeros);
    $analizador->setMayusculas($mayusculas);
    $analizador->setLongitudMinima($longitudMinima);

    $clavesDebiles=[];
    $lines=file($filePath,FILE_IGNORE_NEW_LINES/FILE_SKIP_EMPTY_LINES);

    foreach($lines as $clave){
        if(!$analizador->esClaveFuerte($clave)){
            $clavesDebiles[] = $clave;

        }
    }
    return $clavesDebiles;
}
//uso de la funcion
$filePath = 'clave.txt';

//Analizar clave con la primera configuracion
$claveDebiles1 = analizarClave($filePath,3,1,6);
echo"clave debiles(3 numeros, 1 mayusculas, longitud minima 6):\n";
print_r($clavesDebiles1);

//analizar clave con la segunda configuracion
$claveDebiles2 = analizarClave($filePath,4,3,12);
echo "clave debiles(4 numeros,3 mayuscula,longitud minima 12):\n";
print_r($claveDebiles2);

?>



