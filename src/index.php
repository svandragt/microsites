<?php
namespace Svandragt\Microsites;

require '../vendor/autoload.php';

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\SmartPunct\SmartPunctExtension;
use League\CommonMark\Extension\FrontMatter\FrontMatterExtension;
use League\CommonMark\MarkdownConverter;

$filename = '../content' .  ($_SERVER['PATH_INFO'] ?? '/index') . '.md';

if (!realpath($filename)) {
	$header = "HTTP/1.0 404 Not Found";
	header($header);
	die($header);
}

function md($filename) {
	$env = new Environment();
	$env->addExtension(new CommonMarkCoreExtension());
	$env->addExtension(new FrontMatterExtension());
	$env->addExtension(new SmartPunctExtension());
	$conv =  new MarkdownConverter($env);
	return $conv->convert(file_get_contents($filename));
}

$c = md($filename);
$data = array_merge([
		'contents' => $c ,
	], $c->getFrontMatter());

(new Template(
    'layout.php',
	$data
))->render();
