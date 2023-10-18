<?php
    require_once('modelo.php');

    class Usuarios extends ModeloCredencialesDB {
        public function __construct() {
            parent::__construct();
        }

        public function validarUsuario($usr, $pwd) {
            $instruccion = "CALL sp_validar_usuario('".$usr."', '".$pwd."')";
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