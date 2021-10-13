<?php

use WPGraphQL\Data\Connection\MenuConnectionResolver;
use WPGraphQL\Model\Post as PostModel;

add_filter("Modularity/Modules", function ($modules) {
  $modules[MODULARITY_EXTRAS_PATH . "/src/Modules/ModMenu"] = "ModMenu";
  return $modules;
});

add_action("admin_init", function () {
  if (function_exists("acf_add_local_field_group")) {
    $menus = wp_get_nav_menus();
    $choices = [];
    foreach ($menus as $menu) {
      $choices[$menu->slug] = $menu->name;
    }
    acf_add_local_field_group([
      "key" => "group_mod_menu",
      "title" => __("Menu module properties", "modularity-extras"),
      "fields" => [
        [
          "key" => "field_mod_menu_menu",
          "label" => __("Menu", "modularity-extras"),
          "name" => "mod_menu_menu",
          "type" => "select",
          "instructions" => "",
          // "required" => 0,
          "choices" => $choices,
        ],
      ],
      "location" => [
        [
          [
            "param" => "post_type",
            "operator" => "==",
            "value" => "mod-menu",
          ],
        ],
      ],
      "show_in_graphql" => true,
      "graphql_field_name" => "modMenuOptions",
    ]);
  }
});

add_action(
  "graphql_register_types",
  function () {
    register_graphql_connection([
      "fromType" => "ModMenu",
      "fromFieldName" => "menu",
      "toType" => "Menu",
      "oneToOne" => true,
      // 'connectionArgs' => [],
      "resolve" => function (PostModel $module, $args, $context, $info) {
        $menu_slug = get_field("mod_menu_menu", $module->ID, false);
        $resolver = new MenuConnectionResolver($module, $args, $context, $info);
        $resolver->set_query_arg("slug", $menu_slug);
        return $resolver->one_to_one()->get_connection();
      },
    ]);
  },
  10,
  1,
);

add_filter(
  "graphql_data_is_private",
  function (
    $is_private,
    $model_name,
    $data,
    $visibility,
    $owner,
    $current_user
  ) {
    if ($model_name == "MenuObject") {
      $is_private = false;
    }
    if ($model_name == "MenuItemObject") {
      $is_private = false;
    }
    return $is_private;
  },
  10,
  6,
);
