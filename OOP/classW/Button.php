<?php
require_once 'Input.php';

class Button extends Input {
    private $isSubmit;

    public function __construct($background, $width, $height, $name, $value, $isSubmit = false) {
        parent::setBackground($background);
        parent::setWidth($width);
        parent::setHeight($height);
        parent::setName($name);
        parent::setValue($value);
        $this->setSubmitState($isSubmit);
    }

    public function getSubmitState() {
        return $this->isSubmit;
    }

    public function setSubmitState($isSubmit) {
        $this->isSubmit = $isSubmit;
    }
}
