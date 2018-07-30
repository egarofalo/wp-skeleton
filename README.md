# Proyecto

Wordpress Skeleton, integrado con Composer y Yaml.

# Descripción

Wordpress Skeleton es un esqueleto de Wordpress que tiene mayor seguridad y una mejor estructura. Los archivos del core de Wordpress están ubicados en una subcarpeta, llamada <code>public/wp</code>. La vieja y conocida carpeta <code>wp-content</code> es remplazada por <code>public/content</code>. Por otro lado se utiliza Composer para instalar las dependencias, ya sean librerías de PHP, temas y plugins de Wordpress. Finalmente se dispone de un archivo de configuración <code>config/config.yml</code> ubicado afuera de la carpeta pública ya que contiene la información sensible del archivo <code>wp-config.php</code>.

# Requerimientos

Para comenzar a utilizar WP Skeleton se requiere de:
- php ^7.1.3
- Composer

# Instalación desde github

Descargue el proyecto desde github o a través del comando <code>git clone</code>, y luego ejecute el comando <code>composer install</code> dentro de la raíz del proyecto (ubicación del archivo <code>composer.json</code>).

# Instalación con Composer

Instale composer en su equipo https://getcomposer.org/download/ y una vez instalado ejecute el comando <code>composer create-project co-developers/wp-skeleton</code>. Si quiere instalar el proyecto en una carpeta especifica indique el nombre de la carpeta destino <code>composer create-project co-developers/wp-skeleton dest</code>.

# Actualizando las dependencias

Actualiza las librerías PHP, plugins, temas y el core de Wordpress (dependencias) con Composer.
El archivo <code>composer.lock</code>, generado una vez que se instala el proyecto con composer, impide obtener automáticamente las versiones más recientes de sus dependencias. Para actualizar a las versiones más recientes, utilice el comando <code>composer update</code>. Esto buscará las últimas versiones coincidentes (según su archivo <code>composer.json</code>) y actualizará el archivo <code>composer.lock</code> con las nuevas versiones. Esto equivale a eliminar el archivo <code>composer.lock</code> y ejecutar la instalación de nuevo con <code>composer install</code>. El proceso de instalación realiza de forma automática algunas tareas después de instalar/actualizar todas las dependencias del proyecto.

# Instalar plugins

Busque plugins de Wordpress en el repositorio https://wpackagist.org/ y luego ejecute (en la misma ubicación que el archivo <code>composer.json</code>) <code>composer require wpackagist-plugin/plugin-name</code> para instalar plugins. También puede instalar los plugins desde el dashboard.

# Instalar temas

Busque temas de Wordpress en el repositorio https://wpackagist.org/ y luego ejecute (en la misma ubicación que el archivo <code>composer.json</code>) <code>composer require wpackagist-theme/theme-name</code> para instalar temas. También puede instalar los temas desde el dashboard.

# Instalar librerías PHP

Busque dependencias PHP en el repositorio https://packagist.org/ y luego ejecute (en la misma ubicación que el archivo <code>composer.json</code>) <code>composer require vendor/package-nam</code> para instalar librerías de PHP.

# Archivo de configuración de Wordpress

En el archivo <code>config/config.yml</code> se debe activar el entorno en que se esta ejecutando el proyecto (<code>development</code>, <code>testing</code> o <code>production</code>).
En los archivos:
<ul>
<li><code>config/config.development.yml</code> se debe cargar la configuración de WordPress en el entorno de desarrollo.</li>
<li><code>config/config.testing.yml</code> se debe cargar la configuración de WordPress en el entorno de testing.</li>
<li><code>config/config.testing.yml</code> se debe cargar la configuración de WordPress en el entorno de producción.</li>
</ul>
