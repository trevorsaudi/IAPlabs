<?php
    interface crud{

        //all these methods have to  be implemented by any class that implements these interfaces
        public function save($target_file);
        public function readAll();
        public function readUnique();
        public function search();
        public function update();
        public function removeOne();
        public function removeAll();
        public function validateForm();
        public function createFormErrorSession();
    }


?>