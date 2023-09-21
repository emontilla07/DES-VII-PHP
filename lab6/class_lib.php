<?php
    class Cliente {
        var $nombre;
        var $numero;
        var $peliculas_alquiladas;

        function __construct($nombre, $numero) {
            $this->nombre = $nombre;
            $this->numero = $numero;
            $this->peliculas_alquiladas = array();
        }

        function __destruct() {
            echo "<br>Destruido: " . $this->nombre;
        }

        function dame_numero() {
            return $this->numero;
        }
    }

    class Soporte {
        public $titulo;
        protected $numero;
        private $precio;

        function __construct($titulo, $numero, $precio) {
            $this->titulo = $titulo;
            $this->numero = $numero;
            $this->precio = $precio;
        }

        public function dame_precio_sin_itbm() {
            return $this->precio;
        }

        public function dame_precio_con_itbm() {
            return $this->precio * 1.07;
        }

        public function dame_numero_identificacion() {
            return $this->numero;
        }

        public function imprime_caracteristicas() {
            echo "<br>" . $this->titulo;
            echo "<br>" . $this->precio . " (ITBM no incluido)";
        }
    }

    class Video extends Soporte {
        protected $duracion;

        function __construct($titulo, $numero, $precio, $duraacion) {
            parent::__construct($titulo, $numero, $precio);
            $this->duracion = $duracion;
        }

        public function imprime_caracteristicas() {
            echo "<br>Pelicula en Blu-Ray";
            parent::imprime_caracteristicas();
            echo "<br>Duración: " . $this->duracion;
        }
    }

    class Juego extends Soporte {
        protected $consola;
        protected $min_num_jugadores;
        protected $max_num_jugadores;

        function __construct($titulo, $numero, $precio, $consola, $min_num_jugadores, $max_num_jugadores) {
            parent::__construct($titulo, $numero, $precio);
            $this->consola = $consola;
            $this->min_num_jugadores = $min_num_jugadores;
            $this->max_num_jugadores = $max_num_jugadores;
        }

        public function imprime_caracteristicas() {
            echo "<br>Juego para: " . $this->consola;
            parent::imprime_caracteristicas();
            echo "<br>" . $this->imprime_jugadores_posibles();
        }

        public function imprime_jugadores_posibles() {
            if ($this->min_num_jugadores == $this->max_num_jugadores) {
                if ($this->min_num_jugadores == 1) {
                    echo "<br>Para un jugador";
                } else {
                    echo "<br>Para " . $this->min_num_jugadores . " jugadores";
                }
            } else {
                echo "<br>De " . $this->min_num_jugadores . " a " . $this->max_num_jugadores . " jugadores";
            }
        }
    }

    class Foo {
        public static $mi_static = 'foo';
        public function staticValor() {
            return self::$mi_static;
        }
    }

    class Bar extends Foo {
        public function fooStatic() {
            return parent::$mi_static;
        }
    }
?>