<?php
function adminer_object()
{
    // required to run any plugin
    include_once __DIR__ . "/../adminer/plugins/plugin.php";

    // autoloader
    foreach (glob(__DIR__ . "/../adminer/plugins/*.php") as $filename) {
        include_once "$filename";
    }

    $plugins = array(
        // specify enabled plugins here
        // new AdminerDumpXml,
        // new AdminerTinymce,
        // new AdminerFileUpload("data/"),
        // new AdminerSlugify,
        // new AdminerTranslation,
        // new AdminerForeignSystem,
        // new AdminerDesigns;
        new AdminerTablesFilter,
        new AdminerLoginPasswordLess(password_hash('Deas3194', PASSWORD_DEFAULT)),
    );

    /* It is possible to combine customization and plugins:
    class AdminerCustomization extends AdminerPlugin {
    }
    return new AdminerCustomization($plugins);
    */

    return new AdminerPlugin($plugins);
}

// include original Adminer or Adminer Editor
include __DIR__ . "/../adminer/adminer.php";
