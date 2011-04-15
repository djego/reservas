<?php

echo"<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\"><head>
        <meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\"/>
        <title>$ciudad - $hotel</title>
        <script src=\"http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAVYTF-_X7joojDMWeD242FxRGyT7uKw_fFtjsBeb0MI08yT3hKxRcwATMifsNmoOnGE958nQFvCbn4Q\"  type=\"text/javascript\"></script>
        <script type=\"text/javascript\">
                function initialize() {
                        if (GBrowserIsCompatible()) {
                                var map = new GMap2(document.getElementById(\"map_canvas\"));
                                map.setCenter(new GLatLng($la, $lo), 18);
                                map.openInfoWindow(map.getCenter(),document.createTextNode(\"$ciudad - $hotel\"));
                                var mapTypeControl = new GMapTypeControl();
                                var topRight = new GControlPosition(G_ANCHOR_TOP_RIGHT, new GSize(10,10));
                                var bottomRight = new GControlPosition(G_ANCHOR_BOTTOM_RIGHT, new GSize(10,10));
                                map.addControl(mapTypeControl, topRight);
                                GEvent.addListener(map, \"dblclick\", function() {
                                map.removeControl(mapTypeControl);
                                map.addControl(new GMapTypeControl(), bottomRight);
                                });
                                map.addControl(new GSmallMapControl());
                        }
                }
        </script>
        </head><body onload=\"initialize()\" onunload=\"GUnload()\"><div id=\"map_canvas\" style=\"width: 700px; height: 600\"></div></body></html>";
?>
