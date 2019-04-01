<?php
    namespace App\Controllers;

    class Controller
    {
        public function __construct() {

        }
        protected function view($file, $data = array()) {
            extract($data);
            require(__DIR__ . '/../views/' . $file);
        }
    }