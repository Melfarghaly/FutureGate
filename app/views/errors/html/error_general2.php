<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>404 Page Not Found</title>
<style type="text/css">

body {
	background-color: #eae9e8;
}

#container {
	max-width: 700px;
	margin: auto;
	text-align: center;
}

#container img{
	width: 100%;
	display: inline-block;
}

</style>
</head>
<body>
	<div id="container">
		<a href="<?php echo strip_tags($base_url); ?>"><img src="<?php echo strip_tags($base_url); ?>assets/img/404.gif"></a>
	</div>
</body>
</html>