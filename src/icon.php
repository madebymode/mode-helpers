<?php

if (!function_exists('icon')) {

    /**
     * Render icons.
     * @param  string  $name
     * @param  array   $data
     * @return string
     */
    function icon($name, array $data = [])
    {
        $data['sprite'] = empty($data['sprite']) ? 'global' : $data['sprite'];
        $data['icon'] = $name;

        // Load the file's source when `$name` contains the full path of a file
        if (file_exists($name)) {
            $data['source'] = file_get_contents($name);
        }

        $sprite = empty($sprite) ? 'global' : $sprite;
        $sprite_path = empty($sprite_path) ? '/img/svg/sprites' : $sprite_path;
        $class = 'o-icon  o-icon--' . pathinfo($icon, PATHINFO_FILENAME) . (empty($class) ? '' : $class);

        // OPTIONS
        $attributes = empty($attributes) ? [] : $attributes;
        $attributes['class'] = empty($attributes['class']) ? $class : ($class . ' ' . $attributes['class']);

        // OUTPUT
        $output = '<span' . render_attributes($attributes) . '>';
        $output .= !empty($source) ?
            $source :
            '<svg><use xlink:href="' . $sprite_path . '/' . $sprite . '.svg#' . $icon . '"></use></svg>';
        $output .= '</span>';
    }
}
