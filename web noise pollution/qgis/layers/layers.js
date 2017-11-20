var format_voive85 = new ol.format.GeoJSON();
var features_voive85 = format_voive85.readFeatures(geojson_voive85, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_voive85 = new ol.source.Vector();
jsonSource_voive85.addFeatures(features_voive85);var lyr_voive85 = new ol.layer.Vector({
                source:jsonSource_voive85, 
                style: style_voive85,
                title: "voive>85"
            });var format_risk_area85 = new ol.format.GeoJSON();
var features_risk_area85 = format_risk_area85.readFeatures(geojson_risk_area85, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_risk_area85 = new ol.source.Vector();
jsonSource_risk_area85.addFeatures(features_risk_area85);var lyr_risk_area85 = new ol.layer.Vector({
                source:jsonSource_risk_area85, 
                style: style_risk_area85,
                title: "risk_area85"
            });var format_Riak_Home = new ol.format.GeoJSON();
var features_Riak_Home = format_Riak_Home.readFeatures(geojson_Riak_Home, 
            {dataProjection: 'EPSG:4326', featureProjection: 'EPSG:3857'});
var jsonSource_Riak_Home = new ol.source.Vector();
jsonSource_Riak_Home.addFeatures(features_Riak_Home);var lyr_Riak_Home = new ol.layer.Vector({
                source:jsonSource_Riak_Home, 
                style: style_Riak_Home,
                title: "Riak_Home"
            });

lyr_voive85.setVisible(true);lyr_risk_area85.setVisible(true);lyr_Riak_Home.setVisible(true);
var layersList = [lyr_voive85,lyr_risk_area85,lyr_Riak_Home];
lyr_voive85.set('fieldAliases', {'id_0': 'id_0', 'OBJECTID': 'OBJECTID', 'id': 'id', 'node_id': 'node_id', 'TIMESTAMP': 'TIMESTAMP', 'ts_unixtim': 'ts_unixtim', 'ts_date': 'ts_date', 'ts_time': 'ts_time', 'ts_hour': 'ts_hour', 'lat': 'lat', 'lng': 'lng', 'pm2_5_valu': 'pm2_5_valu', 'pm10_value': 'pm10_value', 'mcp_value': 'mcp_value', 'temp_value': 'temp_value', 'spd': 'spd', 'cv': 'cv', 'bv': 'bv', });
lyr_risk_area85.set('fieldAliases', {'id': 'id', 'objectid': 'objectid', 'bv': 'bv', 'shape_leng': 'shape_leng', 'shape_area': 'shape_area', });
lyr_Riak_Home.set('fieldAliases', {'id': 'id', 'name': 'name', 'descriptio': 'descriptio', 'timestamp': 'timestamp', 'begin': 'begin', 'end': 'end', 'altitudemo': 'altitudemo', 'tessellate': 'tessellate', 'extrude': 'extrude', 'visibility': 'visibility', 'draworder': 'draworder', 'icon': 'icon', });
lyr_voive85.set('fieldImages', {'id_0': 'TextEdit', 'OBJECTID': 'TextEdit', 'id': 'TextEdit', 'node_id': 'TextEdit', 'TIMESTAMP': 'TextEdit', 'ts_unixtim': 'TextEdit', 'ts_date': 'TextEdit', 'ts_time': 'TextEdit', 'ts_hour': 'TextEdit', 'lat': 'TextEdit', 'lng': 'TextEdit', 'pm2_5_valu': 'TextEdit', 'pm10_value': 'TextEdit', 'mcp_value': 'TextEdit', 'temp_value': 'TextEdit', 'spd': 'TextEdit', 'cv': 'TextEdit', 'bv': 'TextEdit', });
lyr_risk_area85.set('fieldImages', {'id': 'TextEdit', 'objectid': 'TextEdit', 'bv': 'TextEdit', 'shape_leng': 'TextEdit', 'shape_area': 'TextEdit', });
lyr_Riak_Home.set('fieldImages', {'id': 'TextEdit', 'name': 'TextEdit', 'descriptio': 'TextEdit', 'timestamp': 'TextEdit', 'begin': 'TextEdit', 'end': 'TextEdit', 'altitudemo': 'TextEdit', 'tessellate': 'TextEdit', 'extrude': 'TextEdit', 'visibility': 'TextEdit', 'draworder': 'TextEdit', 'icon': 'TextEdit', });
lyr_voive85.set('fieldLabels', {'id_0': 'no label', 'OBJECTID': 'no label', 'id': 'no label', 'node_id': 'no label', 'TIMESTAMP': 'no label', 'ts_unixtim': 'no label', 'ts_date': 'no label', 'ts_time': 'no label', 'ts_hour': 'no label', 'lat': 'no label', 'lng': 'no label', 'pm2_5_valu': 'no label', 'pm10_value': 'no label', 'mcp_value': 'no label', 'temp_value': 'no label', 'spd': 'no label', 'cv': 'no label', 'bv': 'no label', });
lyr_risk_area85.set('fieldLabels', {'id': 'no label', 'objectid': 'no label', 'bv': 'no label', 'shape_leng': 'no label', 'shape_area': 'no label', });
lyr_Riak_Home.set('fieldLabels', {'id': 'no label', 'name': 'no label', 'descriptio': 'no label', 'timestamp': 'no label', 'begin': 'no label', 'end': 'no label', 'altitudemo': 'no label', 'tessellate': 'no label', 'extrude': 'no label', 'visibility': 'no label', 'draworder': 'no label', 'icon': 'no label', });
lyr_Riak_Home.on('precompose', function(evt) {
    evt.context.globalCompositeOperation = 'normal';
});