<?php

class Control {
    private $background;
    private $width;
    private $height;

    public function __construct($background = null, $width = null, $height = null) {
        $this->background = $background;
        $this->width = $width;
        $this->height = $height;
    }

    public function getBackground() {
        return $this->background;
    }

    public function setBackground($background) {
        $this->background = $background;
    }

    public function getWidth() {
        return $this->width;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }
}
