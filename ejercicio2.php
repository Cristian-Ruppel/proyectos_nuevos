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
public function setNumero($value){
    if(is_int($numeros) && $value >= 0){
       $this->numero = $value;
    }
}
public function setMayusculas($mayusculas){
    if(is_int($mayusculas) && $value>=0){
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

    $numeroCount = preg_match_all(`/[0-9]/`,$clave);
    $mayusculaCount = preg_match_all(`/[A-Z]/`,$clave);

    return($numeroCount>=$this->numero && $mayusculaCount>=this->mayusculas);
}
//Metodo para generar una clave aleatoria
public function generarClave(){
    $clave ="";
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    while (true){
       $clave ="";
       for($i = 0; $i<$this->longitudMinima;$i++){
           $clave.= $chars[random_int(0,strlen($chars)-1)];
       }
       if ($this->esClaveFuerte($clave)){
           return $clave;
        }
    }
}
function analizarClave($filePath){
    $claveDebiles=[];
    $lines=file($filePath,FILE_IGNORE_NEW_LINES/FILE_SKIP_EMPTY_LINES);

foreach($lines as $clave){
    if(!$analizador->esClaveFuerte($clave)){
        $claveDebiles[] = $clave;

    }
}
return $clavesDebiles;
}
//uso de la funcion
$filePath = `clave.txt`;

//Analizar claves con la primera configuracion
$analizador = new PasswordAnalyzer();
$analizador->setNumero(3);
$analizador->setMayusculas(1);
$analizador->setLongitudMinima(6);
$clavesDebiles1 = analizarClaves($filePath);
echo"clave debiles(3 numeros, 1 mayusculas, longitud minima 6):\n";
print_r($clavesDebiles1);

//analizar clave con la segunda configuracion
$analizador->setNumero(4);
$analizador->setMayusculas(3);
$analizador->setLongitudMinima(12);
$claveDebiles2 = $analizador-> $analizarClave($filePath);
echo "claves debiles(4 numeros,3 mayuscula,longitud minima 12):\n";
print_r($clavesDebiles2);

?>



