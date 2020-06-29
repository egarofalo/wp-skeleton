# Project

WordPress skeleton developed with symfony packages and integrated with Composer.

## Description

Wordpress Skeleton has greater security and a better structure folder. The WordPress core files are located in a subfolder, called <code>public/wp</code>. The old and well-known <code>wp-content</code> folder is replaced by <code>public/content</code>. On the other hand, Composer is used to install PHP dependencies, WordPress themes and plugins. Finally, a <code>config/.env.example</code> configuration file is located outside the public folder for security reasons and contains the environment information like database credentials, proxy server settings, etc. You must copy the content of <code>.env.example</code> into <code>.env</code> file in the local environment. In production environment, if you not set the environment variables in the server, the <code>.env.dist</code> file is loaded. This files is loaded into <code>wp-config.php</code> file.

## Requirements

<ul>
    <li>php ^7.1.3</li>
    <li>Composer</li>
</ul>

## Instalation with Github

Download the project from github or using the <code>git clone</code> command, and then run the <code>composer install</code> command inside the project root (location of the <code>composer.json</code> file).

## Instalation with Composer

Install [Composer](https://getcomposer.org/download/) on your computer and once installed run in the cli <code>composer create-project co-developers/wp-skeleton</code>. If you want to install the project in a different folder, specify the name of the destination folder <code>composer create-project co-developers/wp-skeleton dest</code>.

## Install plugins

Search Wordpress plugins in the repository [WordPress Packagist](https://wpackagist.org/) and then run (in the cli) into the project root <code>composer require wpackagist-plugin/plugin-name</code> to install the plugin wich you choosed. You can also install the plugins from the WordPress dashboard.

## Install themes

Find Wordpress themes in the repository [WordPress Packagist](https://wpackagist.org/) and then run (in the same location as the <code>composer.json</code>, ie project root) <code>composer require wpackagist-theme/theme-name</code> to install themes. You can also install the themes from the dashboard.

## Install PHP dependencies

Search PHP packages in [Packagist](https://packagist.org/) and then run (in the project root) <code>composer require vendor/package-name</code> to install PHP dependencies.

## WordPress configuration file

The <code>.env.example</code> file is an environment configuration sample file. For set up the developement or local environment you must create a <code>.env</code> file with the same content as the sample file, and then set the local server settings in .env. For deploy the project in the produciton server you must set the server settings in the <code>.env.dist</code> file. Alternatively, instead the <code>.env.dist</code>, you can set the server settings in the environments variables.

## Don't forget

<ul>
    <li>Customize the <code>README.md</code> file for your project.</li>
    <li>Update the project's meta data in the <code>composer.json</code> file.</li>
    <li>Change <code>.gitignore</code> file entries to your needs.</li>
</ul>
