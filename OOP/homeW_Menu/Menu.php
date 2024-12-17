<?php
require_once 'MenuItem.php';

class Menu {
    private $listItems = [];

    public function AddMenuItem($name, $url) {
        $menuItem = new MenuItem($name, $url);
        $this->listItems[] = $menuItem;      
    }

    public function PrintMenu($width, $height, $backgroundColor, $color) {
        echo '<ul style="list-style: none; padding: 0; margin: 0; display:flex; justify-content: center; background: lightblue;">';

        foreach ($this->listItems as $item) {
            echo sprintf(
                '<li style="display: inline-block; margin: 5px;">
                    <a href="%s" style="display: block; 
                    width: %s; 
                    height: %s; 
                    background-color: %s; 
                    color: %s; 
                    text-align: center; 
                    line-height: %s;
                    text-decoration: none;">
                        %s
                    </a>
                </li>',
                $item->getUrl(),
                $width,
                $height,
                $backgroundColor,
                $color,
                $height,
                $item->getName()
            );
        }

        echo '</ul>';
    }
}
?>
