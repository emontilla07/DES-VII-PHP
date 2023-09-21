<?php
    final class ClaseBase {
        public function test() {
            echo "ClaseBase::test() llamada\n";
        }

        // Aquí da igual si se declara el método como final o no
        final public function moreTest() {
            echo "ClaseBase::moreTest() llamada\n";
        }
    }

    class ClaseHijo extends ClaseBase {

    }
?>

<!-- No puede heredar la clase ClaseBase ya que es final -->