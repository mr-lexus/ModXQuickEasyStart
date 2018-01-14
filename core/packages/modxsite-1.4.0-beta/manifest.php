<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'license' => '',
    'readme' => 'modxSite
=====================================================

This MODX Extra automatically installing most popular MODX-packages on your MODX-site
',
    'changelog' => 'modxSite-1.4.0
=============================================================
1. Remove packages autoinstall
2. #2 replace $this->classKey with $alias


modxSite-1.3.1
=============================================================
1. Changed check captcha order 
2. Force Smarty compiling on non-cached templates (in controller)
3. Minor bugfix


modxSite-1.3.0
=============================================================
1. Queries new order
2. SQL errors loging


modxSite-1.2.3
=============================================================
1. prepareResponse bugfix


modxSite-1.2.2
=============================================================
1. Code refactoring
2. Added default connector


modxSite-1.2.1
=============================================================
1.  Custom MODX core directory and tables prefix supporting


modxSite-1.2.0
=============================================================
1.  Added form processor


modxSite-1.1.1
=============================================================
1.  Added auto-installing packages:
        - Console
        - Ace


modxSite-1.1.0
=============================================================
1.  Added method modxsite::loadProcessor()
2.  Create mediaSources:
        - Controllers
        - Smarty templates
        - Public templates
        - Images
        - Files
3.  Install packages:
        - phpTemplates
        - modxSmarty
4.  Added getlist/getdata processors from shopModx
5.  Added plugin Debug
6.  Added plugin memory_get_usage
7.  Added modxclub.ru transport provider
        

modxSite-1.0.0-rc
=============================================================
1.  Removed operator GOTO in package resolver for support php lower than 5.3
2.  Minor bugfix in package resolver


modxSite-0.0.2-beta
=============================================================
1.  Added MediaSource Controllers for site controllers (modTemplate`s)
2.  Added MediaSource Templates for site templates (site skins)
3.  Added system setting modxSite.template_url


modxSite-0.0.1-beta
=============================================================
1.  Created core
2.  Created packages installation resolver',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => '87f45893490b67c4bd38e0e67cb60f06',
      'native_key' => 'modxsite',
      'filename' => 'modNamespace/ef2779c2f58391f109b6539e3a2e35ec.vehicle',
      'namespace' => 'modxsite',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '5353c8867ce83d929629750570c97d55',
      'native_key' => 'modxSite.template_url',
      'filename' => 'modSystemSetting/d867575482351e702163a15a56d4ce08.vehicle',
      'namespace' => 'modxsite',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMediaSource',
      'guid' => '357c65d2947c457e8d85aeb07b0c9e07',
      'native_key' => 0,
      'filename' => 'modMediaSource/1103cf66564f686ace390d9554b93536.vehicle',
      'namespace' => 'modxsite',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMediaSource',
      'guid' => 'ddfd92c2039cd29e1957d2c1d671eb1d',
      'native_key' => 0,
      'filename' => 'modMediaSource/a1bf2b63f4126925079d58e8ce8a0f2c.vehicle',
      'namespace' => 'modxsite',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMediaSource',
      'guid' => 'daa8e6900eb1bbe17263fb05b94066d3',
      'native_key' => 0,
      'filename' => 'modMediaSource/8d3971b6c8b645d8cb43cd453abff4f0.vehicle',
      'namespace' => 'modxsite',
    ),
    5 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMediaSource',
      'guid' => '77358978c2a62433f42e8856f98ba678',
      'native_key' => 0,
      'filename' => 'modMediaSource/2e10ead4360c3faf707dfe1a66fa4464.vehicle',
      'namespace' => 'modxsite',
    ),
    6 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMediaSource',
      'guid' => '517d673c101dc035827311a2938f22c6',
      'native_key' => 0,
      'filename' => 'modMediaSource/997a10bcb8261641c1e9d5697e9d3a10.vehicle',
      'namespace' => 'modxsite',
    ),
    7 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modTransportProvider',
      'guid' => '0b1618068e797e4ac91181dcc613e9bb',
      'native_key' => 0,
      'filename' => 'modTransportProvider/48761870b93ca20b8d9e336af2d966fc.vehicle',
      'namespace' => 'modxsite',
    ),
    8 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => 'c86f1c9d75e57ac325a1ae8364029c58',
      'native_key' => 1,
      'filename' => 'modCategory/88e7468410f1265fb14893a3f7da98bb.vehicle',
      'namespace' => 'modxsite',
    ),
  ),
);