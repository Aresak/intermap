   <?php
    /*
    *
    *             InterMap
    *
    *            Version 2.0
    *           @author Aresak
    *      github.com/Aresak/intermap
    *
    */
    class InterMap {
        protected $regions;
        protected $map;
        protected $callMap;
        protected $actions;
        protected $images;
        protected $style;

        function __construct($map) {
            $this->setMap($map);
        }

        public function setMap($map) {
            $this->map = $map;
            $this->callMap = "#" . $map;
            return true;
        }

        public function addAction($action_name, $action_script) {
            $this->actions[$action_name]["name"] = $action_name;
            $this->actions[$action_name]["script"] = $action_script;
            return true;
        }

        public function addRegionAttr($region_id, $attr, $value) {
            if($attr == "coords") {$this->regions[$region_id]["coords"] = $value;return true;}
            else if($attr == "shape") {$this->regions[$region_id]["shape"] = $value;return true;}
            else if($attr == "mouseover") {$this->regions[$region_id]["actions"]["mouseover"] = $value;return true;}
            else if($attr == "mouseout") {$this->regions[$region_id]["actions"]["mouseout"] = $value;return true;}
            else if($attr == "mouseclick") {$this->regions[$region_id]["actions"]["mouseclick"] = $value;return true;}
            else return false;
        }

        public function addImage($id, $link) {
            $this->images[$id]["id"] = $id;
            $this->images[$id]["link"] = $link;
            return true;
        }

        public function setRegions($regions) {
            $regions = explode(";", $regions);

            foreach($regions as $regionData) {
                $id = $regionData;
                $this->regions[$id]["id"] = $id;
            }
        }

        public function setStyle($code) {
            $this->style = $code;
            return true;
        }

        public function addRegion($region) {

            $id = $region;
            $this->regions[$id]["id"] = $id;
            return $id;
        }

        public function drawMap() {
            // Set up the HTML

            ?>
            <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
            <?php echo "<style>" . $this->style . "</style>";?>

            <script>
                var currentMap = "<?php echo $this->callMap; ?>";

                function intermap_repim<?php echo $this->map; ?>(id) {
                    <?php
                        foreach($this->images as $image) {
                            echo "if(id == '" . $image["id"] . "') document.getElementById('intermap-" . $this->map . "').src = '" . $image["link"] . "';";
                        }
                    ?>
                }

                <?php

                    foreach($this->actions as $action) {
                        echo "function " . $action["name"] . "(id) {" . $action["script"] . "}";
                    }

                ?>
            </script>

            <img src="<?php echo $this->images["default"]["link"]; ?>" id="intermap-<?php echo $this->map; ?>" border="0" usemap="#<?php echo $this->map; ?>" />
            <?php
                echo "<map name='" . $this->map . "'>";
                foreach($this->regions as $region) {
                    $id = $region["id"];
                    $coords = $region["coords"];
                    $mouseover_action = $region["actions"]["mouseover"];
                    $mouseout_action = $region["actions"]["mouseout"];
                    $click_action = $region["actions"]["mouseclick"];
                    $shape_type = $region["shape"];
                    echo "<area shape='$shape_type' coords='$coords' alt='$id' target='intermap-" . $this->map . "' onmouseover='" . $mouseover_action . "(\"$id\")' onmouseout='" . $mouseout_action . "(\"$id\")' onclick='" . $click_action . "(\"$id\")'>";
                }
                echo "</map>";

            return true;
        }
    }


?>
