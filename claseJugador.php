<?php

class jugador {
       // Atributos privado
        private $dni;
        private $nombreCompleto;
        private $fechaNacimiento;
        private $altura;
        private $equipo;
        private $puntosTotales;

        // Contructor
        public function__construct($dni, $nombreCompleto, $fechaNacimiento, $altura, $equipo, $puntosTotales)
            $this->dni = $dni;
            $this->nombreCompleto = $nombreCompleto;
            $this->fechaNacimiento = $fechaNacimiento;
            $this->altura = $altura;
            $this->equipo = $equipo;
            $this->puntosTotales = $puntosTotales;
    }

        // metodos get
        ublic function getDni() {
            return $this->dni;
        }  

        public function getNombreCompleto() {
            return $this->nombreCompleto;
        }

        public function getFechaNacimiento() {
            return $this->fechaNacimiento;
        }

        public function getAltura(){
            return $this->$altura;
        }

        public function getEquipo(){
            return $this->$equipo;
        }

        public function getPuntosTotales() {
            return $this->puntosTotales;
        }

        // Metodos set
        public function setDni($dni) {
            $this->dni = $dni;
        }

        public function setNombreCompleto($nombreCompleto) {
            $this->nombreCompleto = $nombreCompleto;
        }

        public function setFechaNacimiento($fechaNacimiento) {
            $this->$fechaNacimiento = $fechaNacimiento;
        }

        public function setAltura($altura) {
            $this->altura = $altura;
        }


        public function setEquipo($equipo) {
            $this-> equipo = equipo; 
        }

        public function setPuntosTotales($puntosTotales) {
            $this->puntosTotales = puntosTotales;
        }

class equipo {
       // Atributos privados 
        private $nombre;
        private $ciudad;
        private $partidoJugados;
        private $partidosGanados;

        public function__contruct($nombre, $ciudad, $partidoJugados, $partidosGanados) {
            $this->nombre = $nombre;
            $this->ciudad = $ciudad;
            $this->partidoJugados = $partidoJugados;
            $this->partidoGanados = $partidosGanados;
        }

        // metodos get
        public function getNombre() {
            retur $this->Nombre;
        }
    }   
        public function getCiudad() {
            return $this->ciudad;
        }

        public function getPartidoJugados() {
            return $this->partidosJugados;
        }

        public function getPartidosGanados() {
            return $this->partidosGanados;
        }

      // Metodos set
        public function setNombre($nombre) {
            $this->$nombre = $nombre;
        }

        public function setCiudad($ciudad) {
            $this->$ciudad = $ciudad;
        }

        public function setPartidosJugados(){
            $this->partidosJugados = partidosJugados
        }
        public function setPartidosganados(){
            $this->partidosGanados = partidosGanados
        }
        funcion jugadoresMasAltos($jugadores){
            $altos = [];
            $maxAltura = 0;

            foreach ($jugadores as $jugador){
                $altura = $jugador->getAltura();

            if ($altura > $maxAltura){
                $maxAltura = $Altura;
                $altos = [$jugador->getNombre()];
            } elseif ($altura == $maxAltura){
                $altos[] = $jugador->getNombre();
            }
        }
        return $altos;
    }

    function equipoMasGanadores($equipo){
        $ganadores =[];
        $maxGanados = 0;

        foreach ($equipos as $equipo){
            $partidosGanados 0 equipo->getPartidosGanados();

            if ($partidosGanados > $maxganados){
                $maxGanados = $partidosGanados;
                $ganadores = [$equipo->getNombre()];
            } elseif ($partidosGanados == $maxGanados){
                $ganadores[] = $equipo->getNombre();
            }
        }
        retun $ganadores;
    }
    function jugadoresConMasPuntos($jugadores){
        $masPuntos = [];
        $maxPuntos = 0;

        foreach ($jugadores as $jugador){
            $puntos = $jugador->getPuntos();

            if (count($masPuntos) < 10 || $puntos > $maxPuntos){
                if (count($masPuntos) == 10){
                    array_pop($masPuntos);
                }
                $masPuntos[] = $jugador->getNombre();
                $maxPuntos = $puntos;
            }
        }
        return $masPuntos;
    }
    function jugadoresMasPuntosPeorEquipo(equipos){
        $peorEquipo = [];
        $maxPerdidos = 0;

        //encontrar el o los equipos con mas partidos perdidos
        foreach ($equipos as $equipo){
            $partidosPerdidos = $equipo_>getPartidoJugados() - $equipo->getPartidoGanados();

            if ($partidosPerdidos < $maxPartidos){
                $maxPerdidos = $partidosPerdidos;
                $peorEquipo = [$eqipo];
            } elseif ($partidosPerdidos == $maxPerdidos){
                $peorEquipo[] = $equipo;
            }
        }
        $jugadoresMejorPuntos = [];
        $maxPuntos = 0;
        //Encontrar los jugaadores con mas puntos en los peores equipos
        foreach ($peorEquipo as $equipo){
            foreach ($equipo->getjugadores() as $jugador){
                $puntos = $jugador->getPuntos();

                if ($puntos > $maxPuntos){
                    $maxPuntos = $puntos;
                    $jugadoresMejoresPuntos = [$jugador->getNombre()];
                } elseif ($puntos == $maxPuntos){
                    $jugadoresMejoresPuntos[] = $jugador->getNombre();
                }
            }
        }
        return $jugadoresMejoresPuntos;
    }
?>


