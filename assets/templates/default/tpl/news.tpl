{extends file="layout.tpl"}
{block name=main}
	<h1>{$modx->resource->get('pagetitle')}</h1>
	{$modx->resource->get('content')}


	{assign var=params value=[
		"where" => [
			"publishedon:!=" => 0,
			"parent" => $modx->resource->get('id')
		],
		"limit" => 1,
		"sort" => "menuindex",
		"dir" => "ASC",
		"getPage" => true,
		"limit" => 2,
		"page" => ({getpageid params=""}) ? {getpageid params=""} : 0
	]}
	{processor action="site/web/getdata" ns="modxsite" params=$params assign=value}
	{foreach $value.object as $object}
		<p>{$object.pagetitle}</p>
		<p>{date("Y-m-d", $object.publishedon)}</p>
	{/foreach}


	[[+page.nav]]






{/block}