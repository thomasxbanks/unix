<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bulk Unix Converter for Woo</title>
	<meta name='viewport' content='width=device-width, initial-scale=1, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0'>
	<link rel="stylesheet" href="../../style.css">
	<style>
		body {
			padding: 1vw;
		}

		textarea {
			display: block;
			width: 100%;
			margin: 20px 0;
			padding: 20px;
			border: 2px solid #ccc;
		}

		table {
			display: block;
			width: 100%;
			margin: 20px 0;
		}

		tr {
			border-bottom: 1px solid #ccc;
		}

		tr:first-child {
			border-bottom: 4px solid #ccc;
		}

		td, th {
			font-family: monospace;
			padding: .5em 1em;
		}

		.col {
			vertical-align: top;
		}

		@media screen and (max-width: 767px) {
			.col {
				width: 100%;
				float: none;
				clear: both;
				display: block;
			}
		}

		.grid {
			display: block;
			float: none;
			clear: both;
			width: 100%;
		}

		h1, h2 {
			line-height: 30px;
		}

		small {
			display: block;
			margin: 20px 0;
		}
	</style>
</head>
<body class="grid">
<div class="col col-1-3 grid-pad">
	<h1>
		Woo's mega epic UNIX timestamp converter!
	</h1>
	<small>
		Paste as many timestamps as you want in the box.<br/>
		<strong>Each one <em>must</em> be on a new line.</strong><br/>
		It doesn't matter if you leave the <em>ns_ts=</em> in it or not.
	</small>
	<form action="" method="GET">
		<textarea name="unix_input" id="unix_input" cols="30" rows="10"></textarea>
		<button type="submit">Smash me, babes!</button>
	</form>
</div>
<?php if (isset($_GET['unix_input'])) { ?>
	<div class="col col-2-3 grid-pad">
		<h2>
			teh rezultz!
		</h2>
		<small>
			<strong>Please note:</strong> Index 0 is the control value.
		</small>
		<?php
		// Debug Array
		//echo "<pre>".print_r(explode(PHP_EOL, $_GET['unix_input']), true)."</pre>";
		$index = 1;
		echo "<table>";
		echo "<tr><th>Index</th></td><th>Timestamp</th><th>Formatted Date</th></tr>";
		$timestamp = 'ns_ts=539267400198';
		$converted = preg_replace("/[^0-9,.]/", "", $timestamp);
		(strlen($converted) > 10) ? $converted = gmdate('d-m-Y h:i:s', substr($converted, 0, -3)) : $converted = gmdate('d-m-Y H:i:s', $converted);
		echo "<tr><td>0</td></td><td>" . $timestamp . "</td><td>" . $converted . "</td></tr>";
		$timestamps = explode(PHP_EOL, $_GET['unix_input']);
		foreach ($timestamps as $timestamp) {
			$converted = preg_replace("/[^0-9,.]/", "", $timestamp);
			(strlen($converted) > 10) ? $converted = gmdate('d-m-Y h:i:s', substr($converted, 0, 10)) : $converted = gmdate('d-m-Y H:i:s', $converted);
			echo "<tr><td>" . $index . "</td></td><td>" . $timestamp . "</td><td>" . $converted . "</td></tr>";
			$index++;
		}
		echo "</table>";
		?>
	</div>
<?php } ?>
<div class="grid">
	<div class="col col-1-2 grid-pad">
		<h3>
			<br/>
			So, what is a UNIX timestamp?!
		</h3>
		<p>
			The unix time stamp is a way to track time as a running total of seconds. This count starts at the Unix Epoch on January 1st, 1970 at UTC. Therefore, the unix time stamp is merely the number of seconds between a particular date and the Unix Epoch.
		</p>
		<p>
			PS: If you want to get to your usual (honestly, inferior) converter, you can find it <a href="http://www.unixtimestamp.com/">here</a> :p
		</p>
	</div>
</div>
</body>
</html>