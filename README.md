# Gutenberg Blocks With Metabox.io


## How to use this repo:

There are two ways to use this repo:

   1. To include all the dependencies (Metabox base plugin, Mb Blocks extension) in this plugin so you do not need to ask client to install these plugins separately.
   2. Another way is to ask clients to install the plugins themselves and you only provide functionality of your block

### Method 1: include dependencies:

   You need to follow these steps:
   
   1. in `composer.json` file update `YOUR_METABOX_KEYS` to your premium keys from Metabox.io
   
   2. You shall need to have composer installed on your computer. In Terminal in the plugin directory, run following:
       * `composer update`

### Method 2: Ask client to install dependency plugins:

Client need to install these plugins:
   
   1. [Metabox](https://wordpress.org/plugins/meta-box/)
   2. [MB Blocks Extension](https://metabox.io/plugins/mb-blocks/)

You may get the working plugin .zip here: [Installable Standalone Plugin Files](https://github.com/boospot/gutenberg-blocks-with-metabox/releases/tag/1.0.0)

or update the `composer.json` to following and then run `composer update` inside your plugin directory

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
  "autoload": {
    "classmap": [
      "includes",
      "admin",
      "public",
      "blocks"
    ]
  }
}
```