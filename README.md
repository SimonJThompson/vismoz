What is vismoz?
======

vismoz is a PHP class to help make the process of creating link visualisations with data from the Moz API a little easier.

Originally, Moz had a tool which returned percentage values to represent key metrics which was great for creating spider / 
radar graphs to represent the profile overall. When this was removed, link visualisations either involve time spent
creating spreadsheets to try and duplicate it, or alternate visualisations being thought up.

This class, at present, simply converts Moz API Metrics to percentage values to help solve this issue.

About the ideal values
======

The ideal values defined in vismoz.metrics.php are, as the name suggests, what the metric should ideally be.

In the case of normalised metrics such as MozRank and MozTrust these are easily definable as the scale has a maximum value.
These can be defined in the vismoz.metrics.php file.

However, when we are dealing with metrics which have no maximum value (backlink count, etc.) this ideal value is not so 
easily definable. In this case, vismoz attempts to create an "ideal" value based on the scale of the metric.

Plans
======

Eventually, vismoz will support multiple competitor domains to be given and then change all "ideal values" accordingly.

A Quick Demo
======

The following demo will show you a comparison between raw Moz API data and the output from vismoz.

```php
require("class.vismoz.php");

$vismoz		=	new vismoz("your member ID","your access secret");
$raw_data	=	$vismoz->send_api_request("http://mysite.com","68719632416",true);
echo "<h1>Raw Data From The Moz API</h1>";
var_dump($raw_data);
$nice_data	=	$vismoz->nicify_metrics($raw_data,$METRICS);
echo "<h1>Output From Vismoz</h1>";
var_dump($nice_data);
