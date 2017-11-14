<?php
use Mode\Helpers\Pages\Meta;

if (!function_exists('meta')) {

    /**
     * helper function for getting an instance of the meta helper
     * @return Mode\Helpers\Pages\Meta
     */
    function meta() {

        static $meta;

        if (!$meta) {
            $meta = new Meta();
        }

        return $meta;
    }
}