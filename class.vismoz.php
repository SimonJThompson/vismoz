<?php
		
	/* Load any required files */

	require("vismoz.metrics.php");

	class vismoz
	{

		public static $moz_id;

		public static $cURL_options;
		public static $req_expires;
		public static $req_sign;
		public static $req_bin_sign;
		public static $req_safe_sign;

		function __construct($moz_access_id, $moz_access_secret)
		{
			self::$moz_id			=	$moz_access_id;
			self::$cURL_options 	=	array( CURLOPT_RETURNTRANSFER => true );
			self::$req_expires		=	time() + 300;
			self::$req_sign			=	$moz_access_id."\n".self::$req_expires;
			self::$req_bin_sign		=	hash_hmac("sha1",self::$req_sign, $moz_access_secret, true);
			self::$req_safe_sign	=	urlencode(base64_encode(self::$req_bin_sign));
		}

		/* Calculates an "ideal" value */
		
		private function calculate_ideal($val)
		{
			$computed_ideal				=	str_pad("1", strlen($val)+1, '0', STR_PAD_RIGHT);
			$computed_ideal_tolerance	=	$computed_ideal-str_pad("5", strlen($val), '0', STR_PAD_RIGHT);

			if($val<$computed_ideal_tolerance)
			{
				$computed_ideal=$computed_ideal_tolerance;
			}

			return $computed_ideal;
		}

		/* 
			This function sends  a request to the Moz API to ask for the link metrics.
		*/

		private function send_api_request($q_target_url,$q_columns,$auto_decode = false)
		{
			$req_url	= "http://lsapi.seomoz.com/linkscape/url-metrics/".urlencode($q_target_url)."?Cols=".$q_columns."&AccessID=".self::$moz_id."&Expires=".self::$req_expires."&Signature=".self::$req_safe_sign;
			$cURL_obj	= curl_init($req_url);
			curl_setopt_array($cURL_obj, self::$cURL_options);
			$api_response	=	curl_exec($cURL_obj);
			curl_close($cURL_obj);
			if($auto_decode){$api_response	=	json_decode($api_response,true);}
			return $api_response;
		}

		/*
			This function turns the metrics in to percentages for use in radar charts etc.
		 */

		private function nicify_metrics($raw_data,$metric_list,$axis_values=false)
		{
			$nice_data;
			foreach(array_keys($raw_data) as $d)
			{
					if(array_key_exists($d,$metric_list))
					{
						if($metric_list[$d]["ideal_value"]>0){
							$nice_value			=	round(($raw_data[$d] / $metric_list[$d]["ideal_value"]) * 100,1);
						}else{
							$computed_ideal		=	self::calculate_ideal($raw_data[$d]);
							$nice_value			=	round(($raw_data[$d] / $computed_ideal) * 100,1);
						}

						if($axis_values)
						{
							$nice_data[$d]	=	array($metric_list[$d]["name"],$nice_value);
						}else{
							$nice_data[$d]	=	$nice_value;
						}
					}
			}
			return $nice_data;
		}

		/* 
			Fetches nice metrics for one domain
		*/

		function nice_metrics($domain,$cols,$axis_values)
		{
			global $METRICS;
			$raw_data		=	self::send_api_request($domain,$cols,true);
			$nice_metrics	=	self::nicify_metrics($raw_data,$METRICS,$axis_values);
			return $nice_metrics;
		}

		/* 
			Fetches nice competitor metrics
		*/

		function nice_competitor_metrics($competitors,$cols,$axis_values)
		{
			global $METRICS;
			$competitorMetrics;

				//Go get the metrics for each competitor
				foreach($competitors as $competitor)
				{
					$competitorMetrics[$competitor]		=	self::send_api_request($competitor,$cols,true);
				}

				//Loop through the metrics and find the maximum
				$computedMetrics;

				foreach(array_keys($competitorMetrics[$competitors[0]]) as $metric)
				{
					if($METRICS[$metric]["is_raw"]==false)
					{
						$computedMetrics[$metric]["name"]	=	$METRICS[$metric]["name"];
						$computedMetrics[$metric]["is_raw"]	=	$METRICS[$metric]["is_raw"];
						if(!($METRICS[$metric]["ideal_value"]>0))
						{
							$values = NULL;
							foreach($competitors as $competitor)
							{
								$values[]	=	$competitorMetrics[$competitor][$metric];
							}
							$metric_max	=	max($values);
							$computedMetrics[$metric]["ideal_value"]	=	self::calculate_ideal($metric_max);
						}else{
							$computedMetrics[$metric]["ideal_value"]	=	$METRICS[$metric]["ideal_value"];
						}
					}
				}
				
				$niceCompetitorMetrics;

				foreach($competitors as $competitor)
				{
					$niceCompetitorMetrics[$competitor]		=	self::nicify_metrics($competitorMetrics[$competitor],$computedMetrics,$axis_values);
				}

			return $niceCompetitorMetrics;
		}

	}
?>