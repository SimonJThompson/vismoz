<?php
		
	/* Load any required files */

	require("vismozmetrics.php");

	class vismoz
	{

		public static $MOZ_ID;
		public static $MOZ_SECRET;

		public static $CURL_OPTIONS;
		public static $REQ_EXPIRES;
		public static $REQ_SIGN;
		public static $REQ_BIN_SIGN;
		public static $REQ_SAFE_SIGN;

		function __construct($MOZ_ACCESS_ID, $MOZ_ACCESS_SECRET)
		{
			self::$MOZ_ID			=	$MOZ_ACCESS_ID;
			self::$CURL_OPTIONS 	=	array( CURLOPT_RETURNTRANSFER => true );
			self::$REQ_EXPIRES		=	time() + 300;
			self::$REQ_SIGN			=	$MOZ_ACCESS_ID."\n".self::$REQ_EXPIRES;
			self::$REQ_BIN_SIGN		=	hash_hmac("sha1",self::$REQ_SIGN, $MOZ_ACCESS_SECRET, true);
			self::$REQ_SAFE_SIGN	=	urlencode(base64_encode(self::$REQ_BIN_SIGN));
		}

		/* 
			This function sends  a request to the Moz API to ask for the link metrics.
		*/

		function SEND_API_REQUEST($Q_TARGET_URL,$Q_COLUMNS,$AUTO_DECODE = false)
		{
			$REQ_URL	= "http://lsapi.seomoz.com/linkscape/url-metrics/".urlencode($Q_TARGET_URL)."?Cols=".$Q_COLUMNS."&AccessID=".self::$MOZ_ID."&Expires=".self::$REQ_EXPIRES."&Signature=".self::$REQ_SAFE_SIGN;
			$CURL_OBJ	= curl_init($REQ_URL);
			curl_setopt_array($CURL_OBJ, self::$CURL_OPTIONS);
			$API_RESPONSE	=	curl_exec($CURL_OBJ);
			curl_close($CURL_OBJ);
			if($AUTO_DECODE){$API_RESPONSE	=	json_decode($API_RESPONSE,true);}
			return $API_RESPONSE;
		}

		/*
			This function turns the metrics in to percentages for use in radar charts etc.
		 */

		function NICIFY_METRICS($RAW_DATA,$METRIC_LIST,$AXIS_VALUES=false)
		{
			$NICE_DATA;
			foreach(array_keys($RAW_DATA) as $D)
			{
					if(array_key_exists($D,$METRIC_LIST))
					{

						if($METRIC_LIST[$D]["ideal_value"]>0){
							$NICE_VALUE		=	round(($RAW_DATA[$D] / $METRIC_LIST[$D]["ideal_value"]) * 100,1);
						}else{
							$COMPUTED_IDEAL	=	str_pad("1", strlen($RAW_DATA[$D])+1, '0', STR_PAD_RIGHT);
							$COMPUTED_IDEAL_TOLERANCE	=	$COMPUTED_IDEAL-str_pad("5", strlen($RAW_DATA[$D]), '0', STR_PAD_RIGHT);
							if($RAW_DATA[$D]<$COMPUTED_IDEAL_TOLERANCE)
							{
								$COMPUTED_IDEAL=$COMPUTED_IDEAL_TOLERANCE;
							}
							$NICE_VALUE			=	round(($RAW_DATA[$D] / $COMPUTED_IDEAL) * 100,1);
						}

						if($AXIS_VALUES)
						{
							$NICE_DATA[$D]	=	array($METRIC_LIST[$D]["name"],$NICE_VALUE);
						}else{
							$NICE_DATA[$D]	=	$NICE_VALUE;
						}
						
					}
			}
			return $NICE_DATA;
		}

	}
?>