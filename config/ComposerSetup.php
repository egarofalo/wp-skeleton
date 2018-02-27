<?php

namespace CoDevelopers\WpSkeleton\Config;

use Composer\Script\Event;

class ComposerSetup {

    private static $output = 'Configuring Wordpress Skeleton...';

    public static function postUpdate(Event $event) {
        self::setupProject();
    }

    public static function postInstall(Event $event) {
        self::setupProject();
    }

    public static function postCreateProject(Event $event) {
        self::setupProject();
    }

    private static function setupProject() {
        // output the message
        echo self::$output;
        self::protectVendorFolder();
    }

    /**
     * Protect vendor folder with an .htaccess file
     */
    private static function protectVendorFolder() {
        if (!file_exists(dirname(__FILE__) . '/../vendor/.htaccess')) {
            copy(dirname(__FILE__) . '/.htaccess', dirname(__FILE__) . '/../vendor/.htaccess');
        }
    }

}