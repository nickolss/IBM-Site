<?php

if ($_SERVER['HTTP_HOST'] == "127.0.0.1" || $_SERVER['HTTP_HOST'] == 'localhost') {
    $root = $_SERVER['HTTP_HOST'];
    $path = "$root/IBM-Site";
} else {
    $path = $_SERVER['HTTP_HOST'];
}