<?php
require_once(__DIR__.'/board.php');
    /**
     *
     */
    class ImageBoard extends Board
    {
        function __construct($type) {
            parent::setTable($type);
        }
    }

?>
