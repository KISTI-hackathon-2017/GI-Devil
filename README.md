# GI-Devil
                               Determination  of Noise Pollution Risk Points using GIS Techniques
                                      
Introduction 
Noise pollution is a noise with harmful impact on the activity of human life. Listening to loud noises could damage human ears. So, we 
want to apply our GIS knowledges to determine the noise pollution risk points.


Objectives
1.  To visualize noise pollution level
2. To analyze noise pollution risk points using GIS techniques

Tools and data
 1. Tools
        1.1 PostGIS, SQLyog Community
        1.2 GIS software : QuantumGIS (QGIS)
 2. Data
        2.1 date and time (timestamp)
        2.2 latitude and longitude
        2.3 noise level (mcp_value)
        2.4 speed (spd)
 Methology
 1. Import KISTI database into PostGIS (a spatial database management software)
 2. Use GIS software (QGIS) to analyze the risk points using spatial operation functions, for examples, rasterization, union,       
 intersection, and point statistics/density functions.
 3. Create output maps.



