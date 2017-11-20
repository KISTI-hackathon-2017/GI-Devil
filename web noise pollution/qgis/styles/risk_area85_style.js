var size = 0;

var styleCache_risk_area85={}
var style_risk_area85 = function(feature, resolution){
    var value = ""
    var size = 0;
    var style = [ new ol.style.Style({
        stroke: new ol.style.Stroke({color: 'rgba(227,26,28,1.0)', lineDash: null, lineCap: 'butt', lineJoin: 'miter', width: 5}), fill: new ol.style.Fill({color: 'rgba(76,38,189,1.0)'})
    })];
    if ("" !== null) {
        var labelText = String("");
    } else {
        var labelText = ""
    }
    var key = value + "_" + labelText

    if (!styleCache_risk_area85[key]){
        var text = new ol.style.Text({
              font: '10.725px \'MS Shell Dlg 2\', sans-serif',
              text: labelText,
              textBaseline: "center",
              textAlign: "left",
              offsetX: 5,
              offsetY: 3,
              fill: new ol.style.Fill({
                color: 'rgba(0, 0, 0, 255)'
              }),
            });
        styleCache_risk_area85[key] = new ol.style.Style({"text": text})
    }
    var allStyles = [styleCache_risk_area85[key]];
    allStyles.push.apply(allStyles, style);
    return allStyles;
};