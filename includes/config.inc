<?php
#DB Connection
$host 		= 'localhost';
$db 		= 'ajayjohn_gp';
$db_user 	= 'ajayjohn_gpadmin';
$db_pass 	= 'GenesisPod';
$mysql 		= new mysqli($host, $db_user, $db_pass, $db) or die("Could not connect to database.");

#Error Reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

#URL used to scrap data
define("SCRAP_URL", "http://www.moneycontrol.com/stocks/top-companies-in-india/total-assets-bse/computers-software.html");

#Minimum upmove(in percent) a stock must make to be reported in the daily report.
define("DAILY_REPORT_UPMOVE_PERCENT", '5');