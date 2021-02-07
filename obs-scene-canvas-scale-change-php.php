<?php

header('Content-Type: text/plain; charset=utf-8');

//change canvas from 1080p to 720p, so it's 1080/720, it's 1.5.
//if you want to change frome 720p to 1080p, try 0.666666, or change the function from division to multiplication.

$scale = 1.5;

$j = file_get_contents('your_scene_config.json');

$a = json_decode($j, true);

$sources = &$a['sources'];

foreach ($sources as &$source) {
    if (array_key_exists('settings',$source)) {

        if (array_key_exists('items', $source['settings'])) {
            $items = &$source['settings']['items'];

            foreach ($items as &$item) {
                if (array_key_exists('scale', $item)) {
                    $item['pos']['x'] = $item['pos']['x'] / $scale;
                    $item['pos']['y'] = $item['pos']['y'] / $scale;
                    $item['scale']['x'] = $item['scale']['x'] / $scale;
                    $item['scale']['y'] = $item['scale']['y'] / $scale;
                }
            }
        }
    }
}

$b = json_encode($a, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

print_r($b);
