# Gutenberg Blocks With Metabox.io

## How to use this repo:

There are two ways to use this repo:

1. You need to install the dependency plugins in your WordPress install and then install this plugin

1. To include all the dependencies (Metabox base plugin, Mb Blocks extension) in this plugin, so you do not need to ask client to install these plugins separately.

### Method 1: Requires installing dependency plugins:

you need to install these plugins:

1. [Metabox](https://wordpress.org/plugins/meta-box/)
2. [MB Blocks Extension](https://metabox.io/plugins/mb-blocks/)

You may get the working plugin .zip here: [Installable Plugin Files](https://github.com/boospot/gutenberg-blocks-with-metabox/releases)

or clone this repo in your `wp-content/plugins` directory and then inside the cloned repo, run `composer update`

### Method 2: include dependencies in this plugin:

   You need to follow these steps:

   1. Replace the `composer.json` file with following contents.

   1. in `composer.json` file update `YOUR_METABOX_KEYS` to your premium keys from Metabox.io
   
   2. You shall need to have composer installed on your computer. In the plugin directory, run following:
       * `composer update`



```json
{
      "name": "boospot/skeleton",
      "description": "Skeleton for WordPress Plugin Boilerplate with Namespace",
      "type": "wordpress-plugin",
      "license": "GPL2",
      "authors": [
            {
                  "name": "Rao",
                  "email": "rao@booskills.com"
            }
      ],
      "require": {
            "wpackagist-plugin/meta-box": "5.*",
            "meta-box/mb-blocks": "dev-master"
      },
      "repositories": [
            {
                  "type": "composer",
                  "url": "https://packages.metabox.io/YOUR_METABOX_KEYS"
            },
            {
                  "type": "composer",
                  "url": "https://wpackagist.org"
            }
      ],
      "extra": {
            "installer-paths": {
                  "vendor/meta-box/meta-box": [
                        "wpackagist-plugin/meta-box"
                  ],
                  "vendor/meta-box/{$name}/": [
                        "type:wordpress-plugin"
                  ]
            }
      },
      "autoload": {
            "classmap": [
                  "includes",
                  "admin",
                  "public",
                  "blocks"
            ],
            "files": [
                  "vendor/meta-box/meta-box/meta-box.php",
                  "vendor/meta-box/mb-blocks/mb-blocks.php"
            ]
      }
}
```