<?php

namespace CoDevelopers\WpSkeleton\Config;

use Composer\Script\Event;
use Symfony\Component\Filesystem\Filesystem;

class ComposerSetup
{
    private static $output = 'Configuring Wordpress Skeleton...';
    private static $fileSystem = null;

    private static function createFileSystem()
    {
        if (self::$fileSystem === null) {
            self::$fileSystem = new Filesystem();
        }
    }

    /**
     * Composer Event: post-update-cmd
     * Occurs after the update command has been executed, or after the install command has been executed without a lock file present
     */
    public static function postUpdate(Event $event)
    {
        self::setupProject();
    }

    /**
     * Composer Event: post-install-cmd
     * Occurs after the install command has been executed with a lock file present.
     */
    public static function postInstall(Event $event)
    {
        self::setupProject();
    }

    /**
     * Composer Event: post-create-project-cmd
     * Occurs after the create-project command has been executed.
     */
    public static function postCreateProject(Event $event)
    {
        self::setupProject();
    }

    private static function setupProject()
    {
        // output the message
        echo self::$output;
        self::createFileSystem();
        self::protectVendorFolder();
        self::removeWpContent();
    }

    /**
     * Protect vendor folder with an .htaccess file
     */
    private static function protectVendorFolder()
    {
        if (!self::$fileSystem->exists(dirname(__FILE__) . '/../vendor/.htaccess')) {
            self::$fileSystem->copy(dirname(__FILE__) . '/.htaccess', dirname(__FILE__) . '/../vendor/.htaccess');
        }
    }

    /**
     * Remove wp/wp-content folder
     */
    private static function removeWpContent()
    {
        if (self::$fileSystem->exists(dirname(__FILE__) . '/../wp/wp-content')) {
            self::$fileSystem->remove(dirname(__FILE__) . '/../wp/wp-content');
        }
    }
}
