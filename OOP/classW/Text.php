<?php
require_once 'Input.php';

class Text extends Input {
    private $placeholder;

    public function __construct($background, $width, $height, $name, $value, $placeholder) {
        parent::setBackground($background);
        parent::setWidth($width);
        parent::setHeight($height);
        parent::setName($name);
        parent::setValue($value);
        $this->setPlaceholder($placeholder);
    }

    public function getPlaceholder() {
        return $this->placeholder;
    }

    public function setPlaceholder($placeholder) {
        $this->placeholder = $placeholder;
    }
}
