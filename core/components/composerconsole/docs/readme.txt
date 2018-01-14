--------------------
ComposerConsole
--------------------
This package can help you run composer even if you don't have SSH access to your server.
Based on https://github.com/CurosMJ/NoConsoleComposer

Example:
$modx->getService('composer');
$modx->composer->command('require vendor/package');

// adding repository and installing package:
$modx->composer->command('require vendor/package', 'https://github.com/vendor/package');
// default 'type': 'vcs'

// or
$modx->composer->command(
    'require vendor/package',
    array(
        'type' => 'vcs',
        'url' => 'https://github.com/vendor/package'
    )
);

// or
$modx->composer->addRepository(array(
   'type' => 'vcs',
   'url' => 'https://github.com/vendor/package'
));
$modx->composer->command('require vendor/package');
