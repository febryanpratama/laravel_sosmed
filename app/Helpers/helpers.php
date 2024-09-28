<?php

function postType($type)
{
    switch ($type) {
        case '1':
            $value = 'Posting Tunggal';
            break;
        case '2':
            $value = 'Carousel';
            break;
        case '3':
            $value = 'Reels';
            break;

        default:
            $value = 'Posting Tunggal';
            break;
    }

    return $value;
}
