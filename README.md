intermap
========

Intermap V2.0

**Example code:**

    // Inicializing the map with map name "map"
    $map = new InterMap("map");

    // Setting a new map name "myMap"
    $map->setMap("myMap");

    // Adding an custom region named "1"
    $reg_id = $map->addRegion("1");

    // Setting up the attribute for region 1 coordinations
    $map->addRegionAttr($reg_id,"coords","41,41,450,230");

    // Setting up the attribute for region 1 shape
    $map->addRegionAttr($reg_id,"shape","rect");

    // Setting up the attribute for region 1 mouse over action
    $map->addRegionAttr($reg_id,"mouseover","hovered");

    // Setting up the attribute for region 1 mouse out action
    $map->addRegionAttr($reg_id,"mouseout","ouut");

    // Setting up the attribute for region 1 mouse click action
    $map->addRegionAttr($reg_id,"mouseclick","alertme");

    // Adding a new image called "mapHovered"
    $map->addImage("mapHovered", "http://mathworld.wolfram.com/images/gifs/SmallTriambicIcosahedron.gif");

    // Adding a new image called "default" - this one will be loaded as default
    $map->addImage("default", "http://mathworld.wolfram.com/images/eps-gif/DodecaSmallTriambIcos_800.gif");

    // Adding a custom action called alertme
    $map->addAction("alertme", "alert('Hi man, the action alertme was called and the id of the region is ' + id);");

    // Adding a custom action called hovered
    $map->addAction("hovered", "console.log('You just hovered over the region ' + id);intermap_repimmyMap('mapHovered');");

    // Adding a custom action called ouut
    $map->addAction("ouut", "console.log('Now you escaped!');intermap_repimmyMap('default');");

    // Adding a custom stylesheet for this map
    $map->setStyle("body {font-family: Arial;text-align: center;}");


    // Draw the map into HTML
    $map->drawMap();


If you want to see more, check the wiki please.

Live example at http://games.symbiant.cz/projects/intermap/
