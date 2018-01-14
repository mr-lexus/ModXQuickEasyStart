<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'license' => '',
    'readme' => 'shopModx
========================================

Shop Extra for MODX Revolution
Project on GitHub: https://github.com/Fi1osof/shopModx',
    'changelog' => 'shopModx-0.2.0-beta
========================================
- Added param includeTVs in ShopmodxWebGetDataProcessor. Default true.
- ShopmodxWebGetDataProcessor::getData optimization.
- Added caching in ShopmodxWebGetlistProcessor

shopModx-0.1.1-beta
========================================
- [#8] Set modWebResourceproductGetlistProcessor::setSelection() to protected
- [#6] Renamed PrepareUniqObjectsQuery to prepareUniqObjectsQuery
- Minor bugfix

shopModx-0.1.0-beta
========================================
- Added method ShopmodxResourceProduct::duplicate
- Minor bugfix

shopModx-0.0.9-beta
========================================
- Removed ShopmodxTemplate class
- Added method ShopmodxWebGetlistProcessor::countTotal

shopModx-0.0.8-beta
========================================
- ShopmodxWebGetListProcessor code refactoring
- ShopmodxWebGetDataProcessor code refactoring


shopModx-0.0.7-beta
========================================
- ShopmodxWebGetListProcessor code refactoring
- ShopmodxWebGetDataProcessor code refactoring


shopModx-0.0.6-beta
========================================
- [#2] Exclude unpublished currencies
- Added shopResource data controllers
- Added ShopmodxWebGetlistProcessor
- Added ShopmodxWebGetDataProcessor
- Added ShopmodxWebGetCollectionProcessor
- Added modWebResourceproductGetlistProcessor
- Added modWebResourceproductGetDataProcessor
- Added modWebResourceproductGetcollectionProcessor


shopModx-0.0.5-beta
========================================
- ShopmodxTemplate code refactored

shopModx-0.0.4-beta
========================================
- Added method shopModx::makeUrl(). Return url if aliasMap disabled
- Added method ShopmodxResource::_process();
- Added ShopmodxTemplate extends modTemplate with supporting third-party templates system.
  modxSmarty using recomended http://modx.com/extras/package/modxsmarty
- Updated class ShopmodxRequest
- Added ShopmodxResource in create context menu
- Changed ShopmodxResource related object modTemplate on ShopmodxTemplate
- Added parser-class ShopmodxParser extends modParser for correct processing link-tags
  [[~id]] when aliasMap disabled via cacheOptimizer.
  To anable this class create system setting parser_class=classes.ShopmodxParser

shopModx-0.0.3-beta
========================================
- Added abstract class ShopmodxObjectGetListProcessor to fix getCount() bug.
  Bug details: [#9543] http://tracker.modx.com/issues/9543
- Added request-class shopmodxRequest. 
  Use optionaly only with fast memory cache-providers like Memcached and disabled
  context aliasMap-cache via cacheOptimizer. http://modx.com/extras/package/cacheoptimizer
  Requires only on large shops (10000+ documents).
  To anable this class create system setting modRequest.class=classes.ShopmodxRequest
  Details: http://community.modx-cms.ru/blog/research/9927.html
- Remove controllers and processors file for some CRC:
    ShopmodxResourceWarehouse,
    ShopmodxResourceProductModel,
    ShopmodxResourceLegalForm,
    ShopmodxResourceCurrency
    

shopModx-0.0.2-beta
========================================
- [#1] Merged CRC tables
- Remove CRC:
    ShopmodxCategory,
    ShopmodxProducer,
    ShopmodxVendor


shopModx-0.0.1-beta
========================================
- Added plugin shopModx
- Added system event OnShopModxSetResourcesCreateRules
- Added shopModx service
- Added CRC:
    ShopmodxCategory,
    ShopmodxClient,
    ShopmodxLegalForm,
    ShopmodxProducer,
    ShopmodxProduct,
    ShopmodxVendor,
    ShopmodxWarehouse,
',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => 'd0c0ce2e40cd69405f6bf628f9217da0',
      'native_key' => 'shopmodx',
      'filename' => 'modNamespace/660f8bb9518175bc7d7aa9aced4e7aa5.vehicle',
      'namespace' => 'shopmodx',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '548fd903df44f09f6dbd081b7eab0add',
      'native_key' => 'shopmodx.default_currency',
      'filename' => 'modSystemSetting/e844a76600e7a74f501f95e2c8f98eb5.vehicle',
      'namespace' => 'shopmodx',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '6abce9e2237fb11aeaed38516919cf66',
      'native_key' => 'shopmodx.product_default_template',
      'filename' => 'modSystemSetting/40009545d4db5bbc3257478cc7f7a6c1.vehicle',
      'namespace' => 'shopmodx',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '6a91452b1fdad97d4df75f0b04ba7f0e',
      'native_key' => 'OnShopModxSetResourcesCreateRules',
      'filename' => 'modEvent/f296a53c8934a41ee773b1ac7acddec6.vehicle',
      'namespace' => 'shopmodx',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => '0a2f804a53772d3f70bfdbd6ba360db2',
      'native_key' => 1,
      'filename' => 'modCategory/44eaff3c713c26b74793c820bf9205a1.vehicle',
      'namespace' => 'shopmodx',
    ),
  ),
);