<?php

namespace CoDevelopers\WpSkeleton\Config;

use Composer\Script\Event;
use Composer\Installer\PackageEvent;

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
        // remove wp/wp-content folder
        if (file_exists(dirname(__FILE__) . '/../wp/wp-content')) {
            self::rrmdir(dirname(__FILE__) . '/../wp/wp-content');
        }
        // protect vendor folder with an .htaccess file
        copy(dirname(__FILE__) . '/.htaccess', dirname(__FILE__) . '/../vendor/.htaccess');
    }

    private static function rrmdir($dir) {
        if (is_dir($dir)) {
            $files = scandir($dir);
            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                    self::rrmdir("{$dir}/{$file}");
                }
            }
            rmdir($dir);
        } elseif (file_exists($dir)) {
            unlink($dir);
        }
    }

}
