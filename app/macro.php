<?php
HTML::macro('clever_link', function($route, $text) {
	$active = null;
    if (Request::path() == $route) {
    	$active = 'active';
    }

    return HTML::link($route, $text, ['class' => 'list-group-item ' . $active]);
});



HTML::macro('admin_clever_link', function($route, $text, $icon) {
	$active = null;
    if (Request::path() == $route) {
    	$active = 'active';
    }
    return "<li class='" . $active . "'><a href='" . $route . "''><i class='fa " . $icon . "'></i> <span>" . $text . "</span></a></li>";
});

HTML::macro('admin_clever_dropdown', function($route, $text, $icon, $items) {
	$open = null;
	$active = null;
	$yoink = function($items) {
    	$open = false;
    	foreach ($items as $item) {
    		if (Request::path() == ltrim($item['route'], '/')) {
    			$open = true;
    		}
    	}
    	return $open;
    };
    if (Request::path() == ltrim($route, '/') || $yoink($items)) {
    	$open = 'active open';
    }
    $results = "<li class='submenu" . $open . "'><a href='" . $route . "''><i class='fa " . $icon . "'></i> <span>" . $text . "</span><i class='arrow fa fa-chevron-right'></i></a><ul>";
    foreach ($items as $item) {
    	$active = (Request::path() == ltrim($item['route'], '/')) ? 'active' : '';
    	$results .= '<li class="' . $active . '"><a href="' . $item['route'] . '">' . $item['text'] . '</a></li>';
    }

    $results .= "</ul></li>";
    return $results;
});
