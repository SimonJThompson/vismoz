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
			self::$cURL_options 		=	array( CURLOPT_RETURNTRANSFER => true );
			self::$req_expires		=	time() + 300;
			self::$req_sign			=	$moz_access_id."\n".self::$req_expires;
			self::$req_bin_sign		=	hash_hmac("sha1",self::$req_sign, $moz_access_secret, true);
			self::$req_safe_sign		=	urlencode(base64_encode(self::$req_bin_sign));
		}

		/* 
			This function sends  a request to the Moz API to ask for the link metrics.
		*/

		function send_api_request($q_target_url,$q_columns,$auto_decode = false)
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

		function nicify_metrics($raw_data,$metric_list,$axis_values=false)
		{
			$nice_data;
			foreach(array_keys($raw_data) as $d)
			{
					if(array_key_exists($d,$metric_list))
					{

						if($metric_list[$d]["ideal_value"]>0){

							$nice_value		=	round(($raw_data[$d] / $metric_list[$d]["ideal_value"]) * 100,1);

						}else{

							$computed_ideal				=	str_pad("1", strlen($raw_data[$d])+1, '0', STR_PAD_RIGHT);
							$computed_ideal_tolerance	=	$computed_ideal-str_pad("5", strlen($raw_data[$d]), '0', STR_PAD_RIGHT);

							if($raw_data[$d]<$computed_ideal_tolerance)
							{
								$computed_ideal=$computed_ideal_tolerance;
							}
							
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

	}
?>
