# Proyecto

Wordpress Skeleton, integrado con Composer y Yaml.

# Descripción

Wordpress Skeleton es un esqueleto de Wordpress que sigue las mejores prácticas de cómo se debe estructurar los archivos de un framework MVC y administrar las dependencias del mismo. Los archivos del core de Wordpress están ubicados en una subcarpeta, llamada wp. Esto ayuda al desarrollador a diferenciar los archivos propios del proyecto de los archivos del core de Wordpress. Por otro lado se utiliza Composer para instalar las dependencias, ya sean librerías de PHP, temas y plugins de Wordpress. Finalmente wp-skeleton dispone de una seguridad adicional a través de los archivos .htaccess.

# Instalación

Descargue el proyecto desde github o a través del comando git clone, y luego ejecute el comando composer install dentro de la raíz del proyecto (ubicación del archivo composer.json).

# Actualizando las dependencias

Actualiza las librerías PHP, plugins, temas y el core de Wordpress (dependencias) con Composer.
El archivo composer.lock, generado una vez que se instala el proyecto con composer, impide obtener automáticamente las versiones más recientes de sus dependencias. Para actualizar a las versiones más recientes, utilice el comando composer update. Esto buscará las últimas versiones coincidentes (según su archivo composer.json) y actualizará el archivo composer.lock con las nuevas versiones. Esto equivale a eliminar el archivo composer.lock y ejecutar la instalación de nuevo con composer install. El proceso de instalación realiza de forma automática algunas tareas después de instalar/actualizar todas las dependencias del proyecto.


# Instalar plugins

Busque plugins de Wordpress en el repositorio https://wpackagist.org/ y luego ejecute (en la misma ubicación que el archivo composer.json) composer require wpackagist-plugin/plugin-name para instalar plugins.

# Instalar temas

Busque temas de Wordpress en el repositorio https://wpackagist.org/ y luego ejecute (en la misma ubicación que el archivo composer.json) composer require wpackagist-theme/theme-name para instalar temas.

# Instalar librerías PHP

Busque dependencias PHP en el repositorio https://packagist.org/ y luego ejecute (en la misma ubicación que el archivo composer.json) composer require vendor/package-name para instalar librerías.