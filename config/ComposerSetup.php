<?php

namespace CoDevelopers\WpSkeleton\Config;

use Composer\Script\Event;

class ComposerSetup {

    private static $output = 'Configuring Wordpress Skeleton...';

    public static function postUpdate(Event $event) {
        //self::setupProject();
    }

    public static function postInstall(Event $event) {
        //self::setupProject();
    }

    public static function postCreateProject(Event $event) {
        //self::setupProject();
    }
    
    public static function postRootPackageInstall(Event $event) {
        self::setupProject();
    }

    private static function setupProject() {
        // output the message
        echo self::$output;
        //self::removeWpContent();
        self::protectVendorFolder();
    }

    /**
     * Remove wp/wp-content folder
     */
    private static function removeWpContent() {
        if (file_exists(dirname(__FILE__) . '/../wp/wp-content')) {
            self::rrmdir(dirname(__FILE__) . '/../wp/wp-content');
        }
    }

    /**
     * Protect vendor folder with an .htaccess file
     */
    private static function protectVendorFolder() {
        if (!file_exists(dirname(__FILE__) . '/../vendor/.htaccess')) {
            copy(dirname(__FILE__) . '/.htaccess', dirname(__FILE__) . '/../vendor/.htaccess');
        }
    }

    /**
     * Recursively remove folders
     * 
     * @param type $dir - Folder to be removed
     */
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