<?php

use Illuminate\Support\Str;

if (!function_exists('handle_get_image_from_db')) {
    function handle_get_image_from_db($image_link)
    {
        $dummy_word = 'https';
        $is_contain_word_from_dummy = Str::contains($image_link, $dummy_word);

        if ($is_contain_word_from_dummy) {
            return $image_link;
        } else {
            return asset('/storage/' . $image_link);
        }
    }
}
