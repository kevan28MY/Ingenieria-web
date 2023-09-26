<?php

interface encendible{
    public function encender();
    public function apagar();
}


class bombilla implements encendible{
    public function encender(){
        echo "<br> Y la luz se hizo...";
    }
    public function apagar (){
        echo "<br>Estamos a oscuras...";
    }
}

class coche implements encendible{
    private $gasolina;
    private $bateria;
    private $estado="apagado";

    function __construct(){
        $this->gasolina = 0;
        $this -> bateria=10;
    }


    public function encender(){
        if($this-> estado=="apagado"){
            if ($this-> bateria >0) {
                if ($this->gasolina>0) {
                    $this->estado="encendido";
                    $this ->bateria --;
                    echo "<br><b>Encendido....</b> estoy encendido!";
                }else {
                    echo "<br>No tengo gasolina";
                }
            }else {
                echo "<br>No tengo gasolina";
            }
        }else {
            echo "<br>Ya estaba encendido";
        }
    }

    public function apagar(){
        if($this->estado=="encendido"){
            $this-> estado="apagado";
            echo "<br><b>Apagado....</b> estoy apagado!";

        }else {
            echo "<br>Ya estaba apagado";
        }
    }
    public function cargar_gasolina($litros){
        $this->gasolina +=$litros;
        echo "<br>Cargados $litros litros";
    }

}

function enciende_algo(encendible $algo){
    $algo->encender();
}

$mibombilla = new bombilla();
$micoche= new coche();
enciende_algo($mibombilla);
enciende_algo($micoche);


?>