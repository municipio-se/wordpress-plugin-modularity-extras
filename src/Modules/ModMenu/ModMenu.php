<?php

namespace ModularityExtras\Modules\ModMenu;

class ModMenu extends \Modularity\Module {
  public $slug = "menu";
  public $supports = [];

  public function init() {
    $this->nameSingular = __("Menu", "modularity-extras");
    $this->namePlural = __("Menu modules", "modularity-extras");
    $this->description = __("Outputs a menu", "modularity-extras");
  }
}
