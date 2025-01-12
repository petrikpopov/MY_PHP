<?php
    class MenuItem {
        private $name;
        private $url;

        public function __construct($name, $url) {
            $this->name = $name;
            $this->url = $url;
        }

        public function getName() {
            return $this->name;
        }

        public function getUrl() {
            return $this->url;
        }
    }
?>
