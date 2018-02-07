<?php
/**
 * @var xPDOTransport $transport
 */
$xpdo = &$transport->xpdo;
// File for storing old settings
$settings_file = MODX_CORE_PATH . 'components/ytranslit.json';
if (file_exists($settings_file) && $tmp = file_get_contents($settings_file)) {
    $old_settings = $xpdo->fromJSON($tmp);
}
if (empty($old_settings) || !is_array($old_settings)) {
    $old_settings = array();
}
/** @var array $options */
switch ($options[xPDOTransport::PACKAGE_ACTION]) {
    case xPDOTransport::ACTION_INSTALL:
    case xPDOTransport::ACTION_UPGRADE:
        /** @var modSystemSetting $object */
        if ($classPath = $xpdo->getObject('modSystemSetting', 'friendly_alias_translit_class_path')) {
            $old_value = $classPath->get('value');
            $value = '{core_path}components/ytranslit/model/';
            if ($old_value != $value) {
                $old_settings['friendly_alias_translit_class_path'] = $old_value;
            }
            $classPath->set('value', $value);
            $classPath->save();
        }
        /** @var modSystemSetting $translitClass */
        if ($className = $xpdo->getObject('modSystemSetting', 'friendly_alias_translit_class')) {
            $old_value = $className->get('value');
            $value = 'modx.ytranslit.modTransliterate';
            if ($old_value != $value) {
                $old_settings['friendly_alias_translit_class'] = $old_value;
            }
            $className->set('value', $value);
            $className->save();
        }

        // Save old settings
        if (!empty($old_settings)) {
            file_put_contents($settings_file, $xpdo->toJSON($old_settings));
        }
        break;

    case xPDOTransport::ACTION_UNINSTALL:
        // Restore old settings
        if ($classPath = $xpdo->getObject('modSystemSetting', 'friendly_alias_translit_class_path')) {
            $value = !empty($old_settings['friendly_alias_translit_class_path'])
                ? $old_settings['friendly_alias_translit_class_path']
                : '{core_path}components/';
            $classPath->set('value', $value);
            $classPath->save();
        }
        if ($className = $xpdo->getObject('modSystemSetting', 'friendly_alias_translit_class')) {
            $value = !empty($old_settings['friendly_alias_translit_class'])
                ? $old_settings['friendly_alias_translit_class']
                : 'translit.modTransliterate';
            $className->set('value', $value);
            $className->save();
        }
        // Clean yTranslit settings
        $settings = array(
            'friendly_alias_ytranslit_url',
            'friendly_alias_ytranslit_key',
            'friendly_alias_ytranslit_timeout',
            'friendly_alias_ytranslit_exclude',
        );
        foreach ($settings as $setting) {
            /** @var modSystemSetting $tmp */
            if ($tmp = $xpdo->getObject('modSystemSetting', $setting)) {
                $tmp->remove();
            }
        }
        @unlink($settings_file);
        break;
}
unset($tmp);

return true;