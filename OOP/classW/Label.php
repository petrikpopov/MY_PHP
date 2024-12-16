<?php
require_once 'Control.php';
require_once 'Button.php';
require_once 'Text.php';

class Label extends Control {
    private $for;

    public function __construct($background, $width, $height, $forObject) {
        parent::setBackground($background);
        parent::setWidth($width);
        parent::setHeight($height);
        $this->setParentName($forObject);
    }

    public function getParentName() {
        return $this->for;
    }

    public function setParentName($forObject) {
        if ($forObject instanceof Button || $forObject instanceof Text) {
            $this->for = $forObject->getName();
        } else {
            throw new InvalidArgumentException("Object must be of type Button or Text.");
        }
    }
}
