What is vismoz?
======

vismoz is a PHP class to help create link visualisations with data from the Moz API.

Originally, Moz provided a link visualisation tool which returned percentage values which was particularly good for doing
competitor analysis over key link metrics. Since this was removed, making these link visualisations was not so easy. This 
class fetches defined link metrics from the Moz API and converts them to percentage values based on an "ideal" value.

About the "ideal values"
======

The "ideal values" defined in vismoz.metrics.php are, as the name suggests, what the metric should ideally be.

In the case of normalised metrics such as MozRank and MozTrust these are easily definable as the scale has a max. These can
be defined in the vismoz.metrics.php file.

However, when we are dealing with metrics which have no maximum value (backlink count, etc.) this ideal value is not so 
easily definable. In this case, vismoz attempts to create an "ideal" value based on the value of the metric.

Plans
======

Eventually, vismoz will support multiple competitor domains to be passed and then change all "ideal values" accordingly.
