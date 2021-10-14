<?php
/**
 * Plugin Name: Modularity Extras
 * Plugin URI: -
 * Description: Adds more Modularity modules
 * Version: 0.1.2
 * Author: Whitespace
 * Text Domain: modularity-extras
 * Author URI: https://www.whitespace.se/
 */

define("MODULARITY_EXTRAS_PLUGIN_FILE", __FILE__);
define("MODULARITY_EXTRAS_PATH", dirname(__FILE__));
define("MODULARITY_EXTRAS_AUTOLOAD_PATH", MODULARITY_EXTRAS_PATH . "/autoload");

add_action("init", function () {
  $path = plugin_basename(dirname(__FILE__)) . "/languages";
  load_plugin_textdomain("modularity-extras", false, $path);
  load_muplugin_textdomain("modularity-extras", $path);
});

array_map(static function () {
  include_once func_get_args()[0];
}, glob(MODULARITY_EXTRAS_AUTOLOAD_PATH . "/*.php"));
