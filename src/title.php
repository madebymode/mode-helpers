<?php
use Mode\Helpers\Pages\Title;

if (!function_exists('title')) {

    /**
     * helper function for getting an instance of the title helper
     * @return Mode\Helpers\Pages\Title
     */
    function title() {

        static $title;

        if (!$title) {
            $title = new Title();
        }

        return $title;
    }
}