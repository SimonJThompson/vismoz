<?php
	/*  

		This file lists the available link metrics and allows an ideal value
		to be defined.

		If there is none, leave as 0.
	
	*/

	$METRICS;

	$METRICS["umrr"]	=	array("name"=>"Raw Mozrank","ideal_value"=>0,"is_raw"=>true);
	$METRICS["fmrr"]	=	array("name"=>"Raw Subdomain Mozrank","ideal_value"=>0,"is_raw"=>true);
	$METRICS["pmrr"]	=	array("name"=>"Raw Root Domain Mozrank","ideal_value"=>0,"is_raw"=>true);
	$METRICS["utrr"]	=	array("name"=>"Raw MozTrust","ideal_value"=>0,"is_raw"=>true);
	$METRICS["ftrr"]	=	array("name"=>"Raw Subdomain MozTrust","ideal_value"=>0,"is_raw"=>true);
	$METRICS["ptrr"]	=	array("name"=>"Raw Root Domain MozTrust","ideal_value"=>0,"is_raw"=>true);
	$METRICS["uemrr"]	=	array("name"=>"Raw External Mozrank","ideal_value"=>0,"is_raw"=>true);
	$METRICS["fejr"]	=	array("name"=>"Raw Subdomain External Link Equity","ideal_value"=>0,"is_raw"=>true);
	$METRICS["pejr"]	=	array("name"=>"Raw Root Domain External Link Equity","ideal_value"=>0,"is_raw"=>true);
	$METRICS["fjr"]		=	array("name"=>"Raw Subdomain Link Equity","ideal_value"=>0,"is_raw"=>true);
										
	$METRICS["ueid"]	=	array("name"=>"External Links","ideal_value"=>0,"is_raw"=>false);
	$METRICS["feid"]	=	array("name"=>"Subdomain External Links","ideal_value"=>0,"is_raw"=>false);
	$METRICS["peid"]	=	array("name"=>"Root Domain External Links","ideal_value"=>0,"is_raw"=>false);
	$METRICS["ujid"]	=	array("name"=>"Equity Links","ideal_value"=>0,"is_raw"=>false);
	$METRICS["uifq"]	=	array("name"=>"Subdomains Linking","ideal_value"=>0,"is_raw"=>false);
	$METRICS["uipl"]	=	array("name"=>"Root Domains Linking","ideal_value"=>0,"is_raw"=>false);
	$METRICS["uid"]		=	array("name"=>"Links","ideal_value"=>0,"is_raw"=>false);
	$METRICS["fid"]		=	array("name"=>"Subdomain Subdomains Linking","ideal_value"=>0,"is_raw"=>false);
	$METRICS["pid"]		=	array("name"=>"Root Domain Root Domains Linking","ideal_value"=>0,"is_raw"=>false);
	$METRICS["umrp"]	=	array("name"=>"Normalised Mozrank","ideal_value"=>10,"is_raw"=>false);
	$METRICS["fmrp"]	=	array("name"=>"Normalised Subdomain Mozrank","ideal_value"=>10,"is_raw"=>false);
	$METRICS["pmrp"]	=	array("name"=>"Normalised Root Domain Mozrank","ideal_value"=>10,"is_raw"=>false);
	$METRICS["utrp"]	=	array("name"=>"Normalised MozTrust","ideal_value"=>10,"is_raw"=>false);
	$METRICS["ftrp"]	=	array("name"=>"Normalised Subdomain MozTrust","ideal_value"=>10,"is_raw"=>false);
	$METRICS["ptrp"]	=	array("name"=>"Normalised Root Domain MozTrust","ideal_value"=>10,"is_raw"=>false);
	$METRICS["uemrp"]	=	array("name"=>"Normalised External MozRank","ideal_value"=>10,"is_raw"=>false);
	$METRICS["fejp"]	=	array("name"=>"Normalised Subdomain External Link Equity","ideal_value"=>0,"is_raw"=>false);
	$METRICS["pejp"]	=	array("name"=>"Normalised Root Domain External Link Equity","ideal_value"=>0,"is_raw"=>false);
	$METRICS["fjp"]		=	array("name"=>"Normalised Subdomain Link Equity","ideal_value"=>0,"is_raw"=>false);
	$METRICS["pjp"]		=	array("name"=>"Normalised Root Domain Link Equity","ideal_value"=>0,"is_raw"=>false);

	$METRICS["fuid"]	=	array("name"=>"Links to Subdomain","ideal_value"=>0,"is_raw"=>false);
	$METRICS["puid"]	=	array("name"=>"Links to Root Domain","ideal_value"=>0,"is_raw"=>false);
	$METRICS["fipl"]	=	array("name"=>"Root Domains Linking to Subdomain","ideal_value"=>0,"is_raw"=>false);
	$METRICS["upa"]		=	array("name"=>"Page Authority","ideal_value"=>0,"is_raw"=>false);
	$METRICS["pda"]		=	array("name"=>"Domain Authority","ideal_value"=>100,"is_raw"=>false);
?>