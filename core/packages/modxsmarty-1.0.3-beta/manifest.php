<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'license' => '',
    'readme' => 'modxSmarty 0.0.4-beta.
=================================================

Using MODX-elements via Smarty


Snippet
=====================

{snippet name="SnippetName" params="var=`value`&var2=`value`" parse="true"}

parse - not necessary. If set \'true\', output will be parsed by MODX-parser. Default - false

params - not necessary. Can use String or Array.
Example 1

PHP: $modx->smarty->assign(\'params\', array("param1" => "value", "param2" => "value",))

Template: {snippet name="test" params=$params}
Example 2

{snippet name="test" assign=params}{snippet name="test2" params=$params nocache}


Chunk
===================

{chunk name="ChunkName" params="var=`value`&var2=`value`" noparse="true"}

noparse - not necessary. If set \'true\', output will not be parsed by MODX-parser. Default - false

params - not necessary. Can use String or Array.
System variable

{config name="configName"}
Example

{config name="site_name"}

return $modx->getOption(\'site_name\')


Placeholder
===================

{ph name="configName"}
Field

{field name="modResourceFieldName"}
Link

{link id="modResourceID"}
TV

{tv name="TvName" contentid="modResourceID" parse="true"}

contentid - not necessary. If not specified, will be used current modResource.

parse - not necessary. If set \'true\', output will be parsed by MODX-parser. Default - false


Parser
===================

{parser content="some content with MODX-tags"}


Processor
===================

{processor action="web/menu/getcatalogmenu" location=path ns="npghardwarestore" params="foo=`foo`"}
return $modx->runProcessor();

action - required.

ns (namespace) - optionaly. If set, path for namespace_core_path/processors/ will be created automaticly

location - optionaly. See MODx::runProcessor manual.

params - optionaly. $scriptPproperties.


Addition params
===================================================
You can set this params for all this tags


assign
===================

{chunk name=chunk_name assign=param}
Assign chunk result to var $param.


nocache
===================

{chunk name=chunk_name nocache}
If Smarty caching enabled, this tag will be no-cached.
',
    'changelog' => 'modxSmarty-1.0.3-beta
=============================================================
1. Added as_tag property in {snippet}


modxSmarty-1.0.2-beta
=============================================================
1. Fixed templates order


modxSmarty-1.0.1-beta
=============================================================
1. Added less plugin
2. Minor bugfix


modxSmarty-1.0.0-beta
=============================================================
1. Added Smarty lib v3.1.20
2. Multy templates support
3. Minor bugfix


modxSmarty-0.0.10-beta
=============================================================
1.  Added $template_url in modxSmarty plugin


modxSmarty-0.0.9-beta
=============================================================
1.  Added pagination function. Thanks for Sergey Shlyahov @Husband!
2.  Added snippet smarty.
3.  Minor bugfixes.


modxSmarty-0.0.8-beta
=============================================================
1.  Add empty Smarty compiled directory on SiteRefresh event.
2.  Add full $modx support in Smarty-templates via tag {$modx}


modxSmarty-0.0.7-beta
=============================================================
1.  Remove echo $num from spell modifier
2.  Bugfix $assign notices
3.  Minor processor-plugin code refactoring

modxSmarty-0.0.6-beta
=============================================================
1.  Added Smarty-plugin lang. Return $modx->lexicon();
2.  Added Smarty-modifier spell. Example {$var|spell:"year":"years":"years"}

modxSmarty-0.0.5-beta
=============================================================
1.  Remove print_r from processor-plugin

modxSmarty-0.0.4-beta
=============================================================
1.  Field-function refactored. Now return TV-values available
2.  Added Smarty-function processor return $modx->runProcessor()

modxSmarty-0.0.3-beta
=============================================================
1.  Added Smarty-param "assign" in all functions
2.  Smarty params "scriptProperties" for tags "snippet" and "chunk"
    renamed for "params"

modxSmarty-0.0.2-beta
=============================================================
1.  Added Smarty-function field. Return modResource field value
2.  Added Smarty-function tv. Return modTemplateVar value
3.  Added Smarty-function link. Return $modx->makeUrl();
4.  Fixed setting modxSmarty.caching


modxSmarty-0.0.1-beta
=============================================================
1. Created core
2. Created plugin Smarty initialization and clearing cache',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => 'ed32bec4e36cd7fdfbbf0cfd24e6d30a',
      'native_key' => 'modxsmarty',
      'filename' => 'modNamespace/b1275301fe4c69fa9063ca26ce256790.vehicle',
      'namespace' => 'modxsmarty',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => 'fe7ecddfb89375398c007d81238caaf2',
      'native_key' => 'modxsmarty',
      'filename' => 'modNamespace/e651a7f44c5e831dd11a10aa305c4961.vehicle',
      'namespace' => 'modxsmarty',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '0fa903a357b48809a8a12419563f9733',
      'native_key' => 'modxSmarty.template_dir',
      'filename' => 'modSystemSetting/9277bb739adaa42160d366fa02e888e4.vehicle',
      'namespace' => 'modxsmarty',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'd73a0e85111719f3acd0223c50921f63',
      'native_key' => 'modxSmarty.template',
      'filename' => 'modSystemSetting/b4eca9f505f30e3f842f8f2ca2bfd245.vehicle',
      'namespace' => 'modxsmarty',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '3b5018affdf7da2fe4fad35e329c17df',
      'native_key' => 'modxSmarty.pre_template',
      'filename' => 'modSystemSetting/84bd502ee8690873faef540ddc181ec6.vehicle',
      'namespace' => 'modxsmarty',
    ),
    5 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '7fa619c20e00dc779e117ac373aa5e55',
      'native_key' => 'modxSmarty.caching',
      'filename' => 'modSystemSetting/dde8e704327c1f33b6c9e9474970dbfc.vehicle',
      'namespace' => 'modxsmarty',
    ),
    6 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '42cc346707ed5d331630d3905a3d69e3',
      'native_key' => 'modxSmarty.cache_dir',
      'filename' => 'modSystemSetting/19f9a128eff8ccae57204eaf8641cdec.vehicle',
      'namespace' => 'modxsmarty',
    ),
    7 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '71385efa975969038162ce0904eb8882',
      'native_key' => 'modxSmarty.cache_lifetime',
      'filename' => 'modSystemSetting/a3c486b49cd2fdb52c70c06e34add237.vehicle',
      'namespace' => 'modxsmarty',
    ),
    8 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => '6aefdb2f743154716a8bfabfe28d9c04',
      'native_key' => 1,
      'filename' => 'modCategory/68e5e792aa5aa3480e4583b6c9d12953.vehicle',
      'namespace' => 'modxsmarty',
    ),
  ),
);