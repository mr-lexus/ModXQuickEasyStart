{literal}{/literal}
<!doctype html>
<html lang="en">
<head>
	<title>[[*pagetitle]] - [[++site_name]]</title>
	<base href="[[!++site_url]]" />
	<meta charset="[[++modx_charset]]" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
</head>
<body>
<div class="container">
	<section>
		<h1>[[*longtitle:default=`[[*pagetitle]]`]]</h1>
		{$modx->resource->get('content')}
	
		
		
		{$image = $modx->runSnippet('phpthumbof', [
			"input" => $modx->resource->getTVValue('imageTV'),
			"options" => "w=800&h=600&zc=1"
		])}
		<img src="{$image}" alt="{$modx->resource->getTVValue('imageTV')}">

	
	</section>
</div>
<footer class="disclaimer">
	<p>&copy; 2005-2016 the <a href="http://www.modx.com/" target="_blank">MODX</a> Content Management Framework (CMF) project. All rights reserved. MODX is licensed under the GNU&nbsp;GPL.</p>
</footer>

</body>
</html>