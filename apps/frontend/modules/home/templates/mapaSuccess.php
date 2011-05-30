<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title><?php echo $ciudad .' - '. $hotel?></title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=<?php echo sfConfig::get('app_key_map');?>"  type="text/javascript"></script>
    <script type="text/javascript">
      function initialize() {
        if (GBrowserIsCompatible()) {
          var greenIcon = new GIcon(G_DEFAULT_ICON);
          greenIcon.image = "<?php echo sfConfig::get('app_s_img') ?>hotel-h.png";
          var markerOptions = { icon:greenIcon,
          title: "<?php echo $ciudad .' - '. $hotel?>" };

          var map = new GMap2(document.getElementById("map_canvas"));
          var point =  new GLatLng(<?php echo $la; ?>, <?php echo $lo; ?>);
          map.setCenter(point, 15);          
          map.addOverlay(new GMarker(point, markerOptions));
          map.openInfoWindow(map.getCenter(),document.createTextNode("<?php echo $ciudad .' - '. $hotel?>"));
          var mapTypeControl = new GMapTypeControl();
          var topRight = new GControlPosition(G_ANCHOR_TOP_RIGHT, new GSize(5,5));
          var bottomRight = new GControlPosition(G_ANCHOR_BOTTOM_RIGHT, new GSize(5,5));
          map.addControl(mapTypeControl, topRight);
          GEvent.addListener(map, "dblclick", function() {
            map.removeControl(mapTypeControl);
            map.addControl(new GMapTypeControl(), bottomRight);
          });
          map.addControl(new GSmallMapControl());
          var mipoint = new GLatLng(<?php echo $la; ?>, <?php echo $lo; ?>);
          map.addOverlay(createMarker(mipoint, 99, "", ""));
                               
        }
      }
    </script>
  </head>
  <body onload="initialize()" onunload="GUnload()">
    <div id="map_canvas" style="width: 700px; height: 600"></div>
  </body>
</html>


