<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'license' => '',
    'readme' => '--------------------
ComposerConsole
--------------------
This package can help you run composer even if you don\'t have SSH access to your server.
Based on https://github.com/CurosMJ/NoConsoleComposer

Example:
$modx->getService(\'composer\');
$modx->composer->command(\'require vendor/package\');

// adding repository and installing package:
$modx->composer->command(\'require vendor/package\', \'https://github.com/vendor/package\');
// default \'type\': \'vcs\'

// or
$modx->composer->command(
    \'require vendor/package\',
    array(
        \'type\' => \'vcs\',
        \'url\' => \'https://github.com/vendor/package\'
    )
);

// or
$modx->composer->addRepository(array(
   \'type\' => \'vcs\',
   \'url\' => \'https://github.com/vendor/package\'
));
$modx->composer->command(\'require vendor/package\');
',
    'changelog' => 'Changelog for ComposerConsole.

ComposerConsole 0.1.3-pl
==============
- addExtensionPackage
- add CA certificate file

ComposerConsole 0.1.2-pl
==============
- fix BaseManagerController

ComposerConsole 0.1.1
==============
- Initial release.',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => 'bf87274b39ff50c04ef6d1a94409328d',
      'native_key' => 'composerconsole',
      'filename' => 'modNamespace/29833ed12ea8469687a0f91c0c12dfb7.vehicle',
      'namespace' => 'composerconsole',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => 'ae2017eee689ae938ef5a64de7f9b755',
      'native_key' => 1,
      'filename' => 'modCategory/0b3334376c225c6723ab9c609b317d3d.vehicle',
      'namespace' => 'composerconsole',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'f2de2673eb6814f9a9e2e7bd27389668',
      'native_key' => 'composerconsole.composer_dir',
      'filename' => 'modSystemSetting/042df89807bd9eab4c70360e2fac5317.vehicle',
      'namespace' => 'composerconsole',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'c46fda61153cb2a9e2882d70f7f0b096',
      'native_key' => 'composerconsole.verbose',
      'filename' => 'modSystemSetting/28268d1e372ff4d6da0005467e109228.vehicle',
      'namespace' => 'composerconsole',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMenu',
      'guid' => '655e789aca14aab0dde0c18ce0f7d3d5',
      'native_key' => 'composerconsole',
      'filename' => 'modMenu/41ca9c8a8b30336871543a5ee9594402.vehicle',
      'namespace' => 'composerconsole',
    ),
  ),
);