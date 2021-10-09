<?php

function change_title_placeholder($title, $post)
{
    if ('wft' == $post->post_type) {
        $title = 'Enter member name';
    }
 
    return $title;
}
