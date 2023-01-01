<?php

function base_path($path) {
    return BASE_PATH . $path;
}

function view($path) {
    require base_path("views/{$path}");
}