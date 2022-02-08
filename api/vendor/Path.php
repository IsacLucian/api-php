<?php

function public_path($path)
{
    return '/public/' . $path;
}

function route($path)
{
    return $path;
}

function redirect($route, $vars = null)
{
    header('Location: ' . $route);
    return $vars;
}
