# Proyecto

Wordpress Skeleton, integrado con Composer y Yaml.

# Descripción

Wordpress Skeleton es un esqueleto de Wordpress que sigue las mejores prácticas de cómo se debe estructurar los archivos de un framework MVC y administrar las dependencias del mismo. Los archivos del core de Wordpress están ubicados en una subcarpeta, llamada wp. Esto ayuda al desarrollador a diferenciar los archivos propios del proyecto de los archivos del core de Wordpress. Por otro lado se utiliza Composer para instalar las dependencias, ya sean librerías de PHP, temas y plugins de Wordpress. Finalmente wp-skeleton dispone de un archivo de configuración wp-config.yml protegido por medio de un .htaccess, quitando la información sensible del archivo wp-config.php.

# Requerimientos

Para comenzar a utilizar WP Skeleton se deben cumplir los siguientes requisitos:
- php ^5.5.9|>=7.0.8
- Tener Composer instalado

# Instalación desde github

Descargue el proyecto desde github o a través del comando git clone, y luego ejecute el comando composer install dentro de la raíz del proyecto (ubicación del archivo composer.json).

# Instalación con Composer

Instale composer en su equipo https://getcomposer.org/download/ y una vez instalado ejecute el comando "composer create-project co-developers/wp-skeleton". Si quiere instalar el proyecto en una carpeta especifica indique el nombre de la carpeta destino "composer create-project co-developers/wp-skeleton dest".

# Actualizando las dependencias

Actualiza las librerías PHP, plugins, temas y el core de Wordpress (dependencias) con Composer.
El archivo composer.lock, generado una vez que se instala el proyecto con composer, impide obtener automáticamente las versiones más recientes de sus dependencias. Para actualizar a las versiones más recientes, utilice el comando composer update. Esto buscará las últimas versiones coincidentes (según su archivo composer.json) y actualizará el archivo composer.lock con las nuevas versiones. Esto equivale a eliminar el archivo composer.lock y ejecutar la instalación de nuevo con composer install. El proceso de instalación realiza de forma automática algunas tareas después de instalar/actualizar todas las dependencias del proyecto.


# Instalar plugins

Busque plugins de Wordpress en el repositorio https://wpackagist.org/ y luego ejecute (en la misma ubicación que el archivo <code>composer.json</code>) <code>composer require wpackagist-plugin/plugin-name</code> para instalar plugins. También puede instalar los plugins desde el dashboard.

# Instalar temas

Busque temas de Wordpress en el repositorio https://wpackagist.org/ y luego ejecute (en la misma ubicación que el archivo <code>composer.json</code>) <code>composer require wpackagist-theme/theme-name</code> para instalar temas. También puede instalar los temas desde el dashboard.

# Instalar librerías PHP

Busque dependencias PHP en el repositorio https://packagist.org/ y luego ejecute (en la misma ubicación que el archivo <code>composer.json</code>) <code>composer require vendor/package-nam</code> para instalar librerías de PHP.

# Archivo de configuración de Wordpress

En el archivo <code>config/config.yml</code> se debe activar el entorno en que se esta ejecutando su sitio (<code>development</code>, <code>testing</code> o <code>produciton</code>).
En los archivos:
- <code>config/config.development.yml</code> se debe cargar la configuración de WordPress en el entorno de desarrollo.
- <code>config/config.testing.yml</code> se debe cargar la configuración de WordPress en el entorno de testing.
- <code>config/config.testing.yml</code> se debe cargar la configuración de WordPress en el entorno de producción.
Todos estos archivos se encuentra protegidos por medio de un .htaccess, por lo tanto la informacion sensible del proyecto está protegida.
