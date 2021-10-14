<?php

namespace ModularityExtras\Modules\ModMenu;

class ModMenu extends \Modularity\Module {
  public $slug = "menu";
  public $supports = [];

  public function init() {
    $this->nameSingular = __("Menu", "modularity-extras");
    $this->namePlural = __("Menu modules", "modularity-extras");
    $this->description = __("Outputs a menu", "modularity-extras");

    // "Navigation" from Fluent Icons
    $this->icon = 'data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMjQgMjQiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZD0iTTIuNzUzIDE4aDE4LjVhLjc1Ljc1IDAgMCAxIC4xMDEgMS40OTNsLS4xMDEuMDA3aC0xOC41YS43NS43NSAwIDAgMS0uMTAyLTEuNDkzTDIuNzUzIDE4aDE4LjUtMTguNVptMC02LjQ5N2gxOC41YS43NS43NSAwIDAgMSAuMTAxIDEuNDkzbC0uMTAxLjAwN2gtMTguNWEuNzUuNzUgMCAwIDEtLjEwMi0xLjQ5M2wuMTAyLS4wMDdoMTguNS0xOC41Wm0tLjAwMS02LjVoMTguNWEuNzUuNzUgMCAwIDEgLjEwMSAxLjQ5M2wtLjEwMS4wMDdoLTE4LjVBLjc1Ljc1IDAgMCAxIDIuNjUgNS4wMWwuMTAyLS4wMDdoMTguNS0xOC41WiIgZmlsbD0iIzIxMjEyMSIgZmlsbC1ydWxlPSJub256ZXJvIi8+PC9zdmc+';
  }
}
