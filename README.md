# skeleton

Skeleton for WordPress Plugin Boilerplate with Namespace

Changes to be made:

1. Rename files in:
    * `/gutenberg-blocks-with-metabox.php`
    * `/languages/gutenberg-blocks-with-metabox.pot`
2. Run Search Replace with **Preserve Case**:
    * @plugin For Plugin Text Domain `gutenberg-blocks-with-metabox => your-plugin-name`
    * @plugin For Plugin Function and filter names  `gutenberg_blocks_with_metabox => your_plugin_name`
    * @plugin For Plugin Package `GutenbergBlocksWithMetabox => YourPluginName`
    * @plugin For Plugin constants `GUTENBERG_BLOCKS_WITH_METABOX_ => YOUR_PLUGIN_NAME_`
    * @git_author For Github Author: `boospot => YourAuthorName`
    * @author For Author Name: `Rao => Your Name`
    * @author For email: `rao@booskills.com => you@mail.com`
    * @link For Link: `https://booskills.com/rao => https://example.com/you`
    * Update Plugin Comment Block in main file `/gutenberg-blocks-with-metabox.php`

3. After Adding more files as you go, use composer to update autoload if you need to. You shall need to have composer
   installed on your computer. In Terminal in the plugin directory, run following:
    * `composer update`
 If you do not want to use composer, download latest version from releases of this repo. 