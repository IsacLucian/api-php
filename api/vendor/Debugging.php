<?php

/**
 * It works for vars only.
 */
function dd()
{
    array_map(function($x) {
        echo "<div 
          style='color: #90EE90; padding: 6px 8px; border-bottom: 1px solid #ddd; background-color: black;'>
            " . "<span style='color: #FFF'>[" . gettype($x) . "]&ensp;-&ensp;</span>" . $x . "
        </div>";
    }, func_get_args());
    die;
}
