<?php
    require_once('modelo.php');

    class Noticias extends ModeloCredencialesDB {
        protected $categoria;
        protected $fecha;
        protected $imagen;
        protected $texto;
        protected $titulo;

        public function __construct() {
            parent::__construct();
        }

        public function consultarNoticias() {
            $instruccion = "CALL sp_listar_noticias()";
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if (!$resultado) {
                echo "Fallo al consultar las noticias";
            } else {
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function consultarNoticiasFiltro($campo, $valor) {
            $instruccion = "CALL sp_listar_noticias_filtro('".$campo."', '".$valor."')";
            $consulta = $this->_db->query($instruccion);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if ($resultado) {
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }
    }
?>