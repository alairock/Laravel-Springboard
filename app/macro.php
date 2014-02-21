<?php
HTML::macro('clever_link', function($route, $text) {
	$active = null;
    if (Request::path() == $route) {
    	$active = 'active';
    }

    return HTML::link($route, $text, ['class' => 'list-group-item ' . $active]);
});
