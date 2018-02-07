<?php return array (
  'manifest-version' => '1.1',
  'manifest-attributes' => 
  array (
    'changelog' => 'Changelog for virtualpage.

2.0.5-beta (08.03.2017)
==============
- Fix "newResource"

2.0.4-beta (07.11.2016)
==============
- Add "cache_prefix" to "cacheKey"

2.0.3-beta (10.09.2016)
==============
- Fix "entry getlist"

2.0.2-beta (04.08.2016)
==============
- Fix "data"
- Fix "lexicon"

2.0.1-beta (01.08.2016)
==============
- Improvement "dispatch"

2.0.0-beta (01.08.2016)
==============
- Full refactoring

1.1.0-beta
==============
- update FastRoute

1.0.9-beta
==============
- added new event: "vpOnResourceAfterCreate"
- refactoring cache method

1.0.8-beta
==============
- add check site status
- refactoring js (grid, window, handler)

1.0.7-beta
==============
- update FastRoute

1.0.6-beta
==============
- add cache for "chunk, snippet"
- refactoring cache method

1.0.5-beta
==============
- add cache for "dinamic resource"
- small fix

1.0.4-beta
==============
- add option placeholder in route
- add "dinamic resource" in method handler

1.0.3-beta
==============
- small fix

1.0.2-beta
==============
- add method "GET,POST"
- add prefix pl

1.0.1-beta
==============
- add handler type "chunk"
- small fix

1.0.0-beta
==============
- Initial release.',
    'license' => 'The MIT License (MIT)

Copyright (c) 2014 Vladimir Grishin

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.',
    'readme' => '--------------------
virtualpage
--------------------
Author: Vgrish <vgrish@gmail.com>
--------------------

Virtual page for MODx Revolution.

Feel free to suggest ideas/improvements/bugs on GitHub:
https://github.com/vgrish/virtualpage/issues',
  ),
  'manifest-vehicles' => 
  array (
    0 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modNamespace',
      'guid' => '0cae4e8b6cd3fd70e96bc360192bb47a',
      'native_key' => 'virtualpage',
      'filename' => 'modNamespace/6b185128f73f7bdc0450e1b0b8787726.vehicle',
      'namespace' => 'virtualpage',
    ),
    1 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '4cd8cb1e205ebeac32edadceebab334e',
      'native_key' => 'virtualpage_active',
      'filename' => 'modSystemSetting/af7ceb5653cd8e52c2b782849a84d323.vehicle',
      'namespace' => 'virtualpage',
    ),
    2 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'd80fb57500f6e44772ea797856745dd0',
      'native_key' => 'virtualpage_exclude_event_groupname',
      'filename' => 'modSystemSetting/3c235ddf10f3497e4820da24b852f77f.vehicle',
      'namespace' => 'virtualpage',
    ),
    3 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => '683af3844393174b4ce1e4c608794af3',
      'native_key' => 'virtualpage_fastrouter_key',
      'filename' => 'modSystemSetting/33db4732207b73eaf9b95454a5fbe2b2.vehicle',
      'namespace' => 'virtualpage',
    ),
    4 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modSystemSetting',
      'guid' => 'ddfc36a7efbf9053b2ef9b521a9cb07a',
      'native_key' => 'virtualpage_prefix_placeholder',
      'filename' => 'modSystemSetting/b1d16920d60bde68ec88e1a92ab788c6.vehicle',
      'namespace' => 'virtualpage',
    ),
    5 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '3221ab057423c7e2ea16427f0fd5a437',
      'native_key' => 'vpOnResourceAfterCreate',
      'filename' => 'modEvent/283cfde0e4cbb599194a8b5f78e9c504.vehicle',
      'namespace' => 'virtualpage',
    ),
    6 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '1518b7ef3ac4254d1a06770df844348c',
      'native_key' => 'vpOnBeforeProcess',
      'filename' => 'modEvent/237f14df3325117538166d5bd456c73a.vehicle',
      'namespace' => 'virtualpage',
    ),
    7 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modEvent',
      'guid' => '00c8366be1641e393beac641804274b5',
      'native_key' => 'vpOnGetResource',
      'filename' => 'modEvent/673a765b138af7da677d258948d2f190.vehicle',
      'namespace' => 'virtualpage',
    ),
    8 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modMenu',
      'guid' => 'd088ec51d5cd3cf1cd5f0b5fbca514f7',
      'native_key' => 'virtualpage',
      'filename' => 'modMenu/3ed7307d5c03e025d56177c52172829a.vehicle',
      'namespace' => 'virtualpage',
    ),
    9 => 
    array (
      'vehicle_package' => 'transport',
      'vehicle_class' => 'xPDOObjectVehicle',
      'class' => 'modCategory',
      'guid' => 'd511296980485d93cf40d6d5515ce3a5',
      'native_key' => NULL,
      'filename' => 'modCategory/cd9525cfc8e9a5d8680b47fc57bc0916.vehicle',
      'namespace' => 'virtualpage',
    ),
  ),
);