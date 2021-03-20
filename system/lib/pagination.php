<?php

class Pagination 
{
    private $current;
    private $finish;

    public function __construct($current, $finish) {
        $this->current = $current;
        $this->finish = $finish;
    }

    public function render($link) {
        $result = "";

        //first
        if ($this->current > 1) {
            $result .= " <a href=" . $link->render(['page' => 1]) .">1</a> ";
        }
        //more
        if ($this->current > 3) {
            $result .= " <span>...</span> ";       
        }
        //prev
        if ($this->current > 2) {
            $i = $this->current - 1;
            $result .= " <a href=" . $link->render(['page' => $i]) .">". $i . "</a> ";
        }
        //current
        $result .= "<strong>" . $this->current . "</strong>";
        //next
        if ($this->current < $this->finish - 1) {
            $i = $this->current + 1;
            $result .= " <a href=" . $link->render(['page' => $i]) .">". $i . "</a> ";
        }
        //more
        if ($this->current < $this->finish - 2) {
            $result .= " <span>...</span> ";       
        }
        //last
        if ($this->current != $this->finish) {
            $i = $this->finish;
            $result .= " <a href=" . $link->render(['page' => $i]) .">". $i . "</a> ";
        }
        return $result;
    }
}