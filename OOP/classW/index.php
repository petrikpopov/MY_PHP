<?php
require_once 'Button.php';
require_once 'Text.php';
require_once 'Label.php';

function convertToHTML(Control $control) {
    if ($control instanceof Button) {
        return sprintf(
            '<button style="background:%s; width:%s; height:%s;" name="%s" value="%s">%s</button>',
            $control->getBackground(),
            $control->getWidth(),
            $control->getHeight(),
            $control->getName(),
            $control->getValue(),
            $control->getValue()
        );
    } elseif ($control instanceof Text) {
        return sprintf(
            '<input type="text" style="background:%s; width:%s; height:%s;" name="%s" value="%s" placeholder="%s">',
            $control->getBackground(),
            $control->getWidth(),
            $control->getHeight(),
            $control->getName(),
            $control->getValue(),
            $control->getPlaceholder()
        );
    } elseif ($control instanceof Label) {
        return sprintf(
            '<label style="background:%s; width:%s; height:%s;" for="%s">Label for %s</label>',
            $control->getBackground(),
            $control->getWidth(),
            $control->getHeight(),
            $control->getParentName(),
            $control->getParentName()
        );
    }
    return '';
}

$button = new Button('blue', '120px', '40px', 'submitButton', 'Submit', true);
$text = new Text('white', '200px', '30px', 'username', '', 'Enter your username');
$label = new Label('red', '100px', '20px', $text);

echo convertToHTML($button);
echo convertToHTML($text);
echo convertToHTML($label);
