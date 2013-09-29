<?php
	/*  

		This file lists the available link metrics and allows an ideal value
		to be defined.

		If there is none, leave as 0.
	
	*/

	$METRICS;

	$METRICS["ueid"]	=	array("name"=>"External Links","ideal_value"=>0);
	$METRICS["feid"]	=	array("name"=>"Subdomain External Links","ideal_value"=>0);
	$METRICS["peid"]	=	array("name"=>"Root Domain External Links","ideal_value"=>0);
	$METRICS["ujid"]	=	array("name"=>"Equity Links","ideal_value"=>0);
	$METRICS["uifq"]	=	array("name"=>"Subdomains Linking","ideal_value"=>0);
	$METRICS["uipl"]	=	array("name"=>"Root Domains Linking","ideal_value"=>0);
	$METRICS["uid"]		=	array("name"=>"Links","ideal_value"=>0);
	$METRICS["fid"]		=	array("name"=>"Subdomain Subdomains Linking","ideal_value"=>0);
	$METRICS["pid"]		=	array("name"=>"Root Domain Root Domains Linking","ideal_value"=>0);
	$METRICS["umrp"]	=	array("name"=>"Normalised Mozrank","ideal_value"=>10);
	//$METRICS["umrr"]	=	array("name"=>"Raw Mozrank","ideal_value"=>0);
	$METRICS["fmrp"]	=	array("name"=>"Normalised Subdomain Mozrank","ideal_value"=>10);
	//$METRICS["fmrr"]	=	array("name"=>"Raw Subdomain Mozrank","ideal_value"=>0);
	$METRICS["pmrp"]	=	array("name"=>"Normalised Root Domain Mozrank","ideal_value"=>10);
	//$METRICS["pmrr"]	=	array("name"=>"Raw Root Domain Mozrank","ideal_value"=>0);
	$METRICS["utrp"]	=	array("name"=>"Normalised MozTrust","ideal_value"=>10);
	//$METRICS["utrr"]	=	array("name"=>"Raw MozTrust","ideal_value"=>0);
	$METRICS["ftrp"]	=	array("name"=>"Normalised Subdomain MozTrust","ideal_value"=>10);
	//$METRICS["ftrr"]	=	array("name"=>"Raw Subdomain MozTrust","ideal_value"=>0);
	$METRICS["ptrp"]	=	array("name"=>"Normalised Root Domain MozTrust","ideal_value"=>10);
	//$METRICS["ptrr"]	=	array("name"=>"Raw Root Domain MozTrust","ideal_value"=>0);
	$METRICS["uemrp"]	=	array("name"=>"Normalised External MozRank","ideal_value"=>10);
	//$METRICS["uemrr"]	=	array("name"=>"Raw External Mozrank","ideal_value"=>0);
	$METRICS["fejp"]	=	array("name"=>"Normalised Subdomain External Link Equity","ideal_value"=>0);
	//$METRICS["fejr"]	=	array("name"=>"Raw Subdomain External Link Equity","ideal_value"=>0);
	$METRICS["pejp"]	=	array("name"=>"Normalised Root Domain External Link Equity","ideal_value"=>0);
	//$METRICS["pejr"]	=	array("name"=>"Raw Root Domain External Link Equity","ideal_value"=>0);
	$METRICS["fjp"]		=	array("name"=>"Normalised Subdomain Link Equity","ideal_value"=>0);
	//$METRICS["fjr"]		=	array("name"=>"Raw Subdomain Link Equity","ideal_value"=>0);
	$METRICS["pjp"]		=	array("name"=>"Normalised Root Domain Link Equity","ideal_value"=>0);
	//$METRICS["pjr"]		=	array("name"=>"Raw Root Domain Link Equity","ideal_value"=>0);
	$METRICS["fuid"]	=	array("name"=>"Links to Subdomain","ideal_value"=>0);
	$METRICS["puid"]	=	array("name"=>"Links to Root Domain","ideal_value"=>0);
	$METRICS["fipl"]	=	array("name"=>"Root Domains Linking to Subdomain","ideal_value"=>0);
	$METRICS["upa"]		=	array("name"=>"Page Authority","ideal_value"=>0);
	$METRICS["pda"]		=	array("name"=>"Domain Authority","ideal_value"=>100);
?>