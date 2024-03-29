<?php
namespace Svandragt\Microsites;

require '../vendor/autoload.php';

$filename = '../content' .  (empty($_SERVER['PATH_INFO']) ? '/index' : $_SERVER['PATH_INFO']) . '.md';

if (!realpath($filename)) {
	$header = "HTTP/1.0 404 Not Found";
	header($header);
	var_dump($_SERVER);
	die($header);
}

function md($filename) {
	$Parsedown = new \Parsedown();
	$text = explode('---',file_get_contents($filename));
	$fm = parse_ini_string($text[1]);
	$md = $Parsedown->text($text[2]);
	return array_merge($fm,['contents' => $md]);
}

$data = md($filename);
(new Template(
    'layout.php',
	$data
))->render();
