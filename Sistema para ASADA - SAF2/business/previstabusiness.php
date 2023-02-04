<?php 

    include '../data/previstadata.php';

    class BusinessPrevista{

        private $previstaData;

        public function BusinessPrevista(){
            $this->previstaData = new PrevistaData();
        }

        public function insertarPrevista($prevista) {
            return $this->previstaData-> insertarPrevista($prevista);
        }
        public function eliminarPrevista($id) {
            return $this->previstaData->eliminarPrevista($id);
        }
        public function modificarPrevista($id, $prevista) {
            return $this->previstaData->modificarPrevista($id,$prevista);
        }

    }

?>