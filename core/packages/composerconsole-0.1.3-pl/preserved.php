<?php return array (
  'bf87274b39ff50c04ef6d1a94409328d' => 
  array (
    'criteria' => 
    array (
      'name' => 'composerconsole',
    ),
    'object' => 
    array (
      'name' => 'composerconsole',
      'path' => '{core_path}components/composerconsole/',
      'assets_path' => '',
    ),
  ),
  'ae2017eee689ae938ef5a64de7f9b755' => 
  array (
    'criteria' => 
    array (
      'category' => 'ComposerConsole',
    ),
    'object' => 
    array (
      'id' => 15,
      'parent' => 0,
      'category' => 'ComposerConsole',
      'rank' => 0,
    ),
  ),
  '25af365a4dad9942dba67fff6aaa6499' => 
  array (
    'criteria' => 
    array (
      'name' => 'autoload',
    ),
    'object' => 
    array (
      'id' => 17,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'autoload',
      'description' => '',
      'editor_type' => 0,
      'category' => 15,
      'cache_type' => 0,
      'plugincode' => '$autoloader = $modx->getOption(\'composerconsole.composer_dir\').\'/vendor/autoload.php\';
if(is_file($autoloader)) {
    require_once $autoloader;
}',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/composerconsole/elements/plugins/plugin.autoload.php',
      'content' => '$autoloader = $modx->getOption(\'composerconsole.composer_dir\').\'/vendor/autoload.php\';
if(is_file($autoloader)) {
    require_once $autoloader;
}',
    ),
  ),
  '3f3a68c0f653021895277c7ec218a4cc' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 17,
      'event' => 'OnMODXInit',
    ),
    'object' => 
    array (
      'pluginid' => 17,
      'event' => 'OnMODXInit',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'f2de2673eb6814f9a9e2e7bd27389668' => 
  array (
    'criteria' => 
    array (
      'key' => 'composerconsole.composer_dir',
    ),
    'object' => 
    array (
      'key' => 'composerconsole.composer_dir',
      'value' => '{core_path}',
      'xtype' => 'textfield',
      'namespace' => 'composerconsole',
      'area' => '',
      'editedon' => NULL,
    ),
  ),
  'c46fda61153cb2a9e2882d70f7f0b096' => 
  array (
    'criteria' => 
    array (
      'key' => 'composerconsole.verbose',
    ),
    'object' => 
    array (
      'key' => 'composerconsole.verbose',
      'value' => '0',
      'xtype' => 'textfield',
      'namespace' => 'composerconsole',
      'area' => '',
      'editedon' => NULL,
    ),
  ),
  'ab5ac84009cd53d6f9ee5cda3e632729' => 
  array (
    'criteria' => 
    array (
      'namespace' => 'composerconsole',
      'controller' => 'index',
    ),
    'object' => 
    array (
      'id' => 7,
      'namespace' => 'composerconsole',
      'controller' => 'index',
      'haslayout' => 1,
      'lang_topics' => 'composerconsole:default',
      'assets' => '',
      'help_url' => '',
    ),
  ),
  '655e789aca14aab0dde0c18ce0f7d3d5' => 
  array (
    'criteria' => 
    array (
      'text' => 'composerconsole',
    ),
    'object' => 
    array (
      'text' => 'composerconsole',
      'parent' => 'components',
      'action' => '7',
      'description' => '',
      'icon' => 'images/icons/plugin.gif',
      'menuindex' => 0,
      'params' => '',
      'handler' => '',
      'permissions' => '',
      'namespace' => 'core',
    ),
  ),
);