<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'preexisting_mode' => '-1',
    'license' => '',
    'readme' => 'modxSite
=====================================================

This MODX Extra automatically installing most popular MODX-packages on your MODX-site
',
    'changelog' => 'modxSite-1.8.2
=============================================================
1. Release fix


modxSite-1.8.1
=============================================================
1. Minor bufgix


modxSite-1.8.0
=============================================================
1. Added public-processors
2. Code refactoring


modxSite-1.7.2
=============================================================
1. Added method modSiteWebObjectProcessor::prepareQueryBeforeCount()


modxSite-1.7.1
=============================================================
1. Switched off archiving existsing files on installing


modxSite-1.7.0
=============================================================
1. Added searching via modSearch extra


modxSite-1.6.0
=============================================================
1. Added thumb processors
2. Added thumb connector


modxSite-1.5.0
=============================================================
1. Added object-processor
2. Added service modxsite
3. Code refactoring


modxSite-1.4.0
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
      'guid' => '5c9bd0dc77b979b3c4403fc7a85050f8',
      'native_key' => 'modxsite',
      'filename' => 'modNamespace/b2520a447412faf0baaf088d5cb8b65c.vehicle',
      'namespace' => 'modxsite',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'b644bab430d41bbed3d2c01dc682493c',
      'native_key' => 'modxSite.template_url',
      'filename' => 'modSystemSetting/8923c9de7bd9cc28b6e98ec02ce0127b.vehicle',
      'namespace' => 'modxsite',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'a4b10baa5e53c6345392f448afbef6ec',
      'native_key' => 'modxsite.thumb_snippet',
      'filename' => 'modSystemSetting/2f136fd470d2bd87d70a39047cb34ee5.vehicle',
      'namespace' => 'modxsite',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '87c08d16e8c499f6d77e3c7e02a149dc',
      'native_key' => 'modxsite.thumb_types',
      'filename' => 'modSystemSetting/b89f7fd1f2f51601aa88abc768f9cafa.vehicle',
      'namespace' => 'modxsite',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMediaSource',
      'guid' => '98d2067e23652aaa8523c5b7d45d59ec',
      'native_key' => 0,
      'filename' => 'modMediaSource/f79d5b3f3a6f175e47db9bcd622e475f.vehicle',
      'namespace' => 'modxsite',
    ),
    5 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMediaSource',
      'guid' => 'da3500a05a8cbd6e75e53b5785ead60e',
      'native_key' => 0,
      'filename' => 'modMediaSource/2ea9fa140d56613081bae7d7454532bd.vehicle',
      'namespace' => 'modxsite',
    ),
    6 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMediaSource',
      'guid' => '0e038cda2fee50008166dcf5fd9af5e4',
      'native_key' => 0,
      'filename' => 'modMediaSource/325373b817430cb2619632882d5d5850.vehicle',
      'namespace' => 'modxsite',
    ),
    7 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMediaSource',
      'guid' => 'cc530399f9928a9dc05c1f99fe0d5087',
      'native_key' => 0,
      'filename' => 'modMediaSource/47aae3cd354e496aa1e1857030431d52.vehicle',
      'namespace' => 'modxsite',
    ),
    8 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMediaSource',
      'guid' => 'b94533c338521470a726d12f30d65f00',
      'native_key' => 0,
      'filename' => 'modMediaSource/08fcff38add6c62b6471d90987581d31.vehicle',
      'namespace' => 'modxsite',
    ),
    9 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modTransportProvider',
      'guid' => 'e1882ee901684da8833178b215907e7b',
      'native_key' => 0,
      'filename' => 'modTransportProvider/a663b7f8bf36a85105dfc2433f86ed16.vehicle',
      'namespace' => 'modxsite',
    ),
    10 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => '428d056e38ff648afb438843472fb30d',
      'native_key' => 1,
      'filename' => 'modCategory/87cfa004d51e391bebf2cf42f9a5867c.vehicle',
      'namespace' => 'modxsite',
    ),
  ),
);