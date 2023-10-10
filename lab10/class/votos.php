<?php
    require_once('modelo.php');

    class Votos extends ModeloCredencialesDB {
        public function __construct() {
            parent::__construct();
        }

        public function listarVotos() {
            $instrucciones = "CALL sp_listar_votos()";
            $consulta = $this->_db->query($instrucciones);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if ($resultado) {
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }

        public function actualizarVotos($voto1, $voto2) {
            $instrucciones = "CALL sp_actualizar_votos('".$voto1."', '".$voto2."')";
            $actualiza = $this->_db->query($instrucciones);

            if ($actualiza) {
                return $actualiza;
                $actualiza->close();
                $this->_db->close();
            }
        }
    }
?>