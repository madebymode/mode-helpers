<?php

namespace Mode\Helpers\Support\Pages;

class Title
{

    protected $title = array();
    protected $delimiter = ' | ';

    /**
     * append a piece to the title
     *
     * @access public
     * @param string $title
     * @return void
     */
    public function append($title) {

        if (is_array($title)) {

            foreach($title as $entry) {
                $this->append($entry);
            }

            return $this;
        }

        array_push($this->title, $title);
        return $this;
    }

    /**
     * prepend a piece to the title
     *
     * @access public
     * @param string $title
     * @return void
     */
    public function prepend($title) {

        if (is_array($title)) {

            foreach($title as $entry) {
                $this->prepend($entry);
            }

            return $this;
        }

        array_unshift($this->title, $title);
        return $this;
    }

    public function setDelimiter($delimiter)
    {
        $this->delimiter = $delimiter;
        return $this;
    }

    /**
     * render the title with a delimiter
     *
     * @access public
     * @param boolean $reverse
     * @return string
     */
    public function render($reverse = false) {
        return implode($this->delimiter, $reverse ? array_reverse($this->title) : $this->title);
    }
}