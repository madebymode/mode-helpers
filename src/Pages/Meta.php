<?php

namespace Mode\Helpers\Support\Pages;

class Meta
{
    protected $entries = array();

    /**
     * add a meta data entry
     * @param string  $name       name attribute for the meta tag
     * @param string  $content    content attribute for the meta tag
     * @param boolean $http_equiv boolean for the http-equiv attribute
     * @param boolean $override   true to override a previously set meta data item
     * @param array   $attrs      additional attrs to be placed on the meta tag
     */
    public function add($name, $content, $http_equiv = false, $override = false, $attrs = array()) {

        if (!empty($this->entries[$name]) && !$override) {
            return $this;
        }

        $this->entries[$name] = array('content' => $content, 'http-equiv' => $http_equiv);
        return $this;
    }

    public function render($default = array()) {

        $entries = array_merge((array) $default, (array) $this->entries);

        $html = "";
        foreach($entries as $name => $entry) {
            $key = 'name';
            if (stripos($name, "og:") === 0) {
                $key = 'property';
            } else if (!empty($data['http-equiv'])) {
                $key = 'http-equiv';
            }

            $html .= sprintf('<meta %s="%s" content="%s">', $key, $name, $entry['content']) . "\n";
        }

        return $html;
    }
}