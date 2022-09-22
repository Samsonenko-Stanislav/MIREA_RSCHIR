<?php

class command
{
    public static function print($cmd) {
        $lines = array();
        exec($cmd, $lines);
        echo "<pre> > ".$cmd."</pre>";
        echo "<pre>".implode("\n", $lines)."</pre>";
    }
}