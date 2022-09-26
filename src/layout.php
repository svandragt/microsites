<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $this->title ?></title>

	<style type="text/css">
		main {
			color:  #222;
			font: 16px/1.4em sans-serif;
			margin: auto;
			padding: 0 2em;
			max-width:  70ch;
		}
	</style>
</head>
<body>
	<main>
		<?= $this->contents ?>

		<p>Title is "<?= $this->title ?>"
	</main>
</body>
</html>