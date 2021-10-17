<?php
namespace Svandragt\Microsites;

require '../vendor/autoload.php';

use League\CommonMark\CommonMarkConverter;

$filename = '../content' .  ($_SERVER['PATH_INFO'] ?? '/index') . '.md';

if (!realpath($filename)) {
	$header = "HTTP/1.0 404 Not Found";
	header($header);
	die($header);
}

(new Template(
    'layout.php',
	[
		'contents' => (new CommonMarkConverter(
			[
				'html_input' => 'strip',
    				'allow_unsafe_links' => false,
			]))->convertToHtml(
			file_get_contents($filename)
		),
		'title' => 'this is a test',
	]
))->render();
