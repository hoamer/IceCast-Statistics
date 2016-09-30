<?php

namespace Piwik\Plugins\IcecastStatistics;

use Piwik\API\Request;
use Piwik\Common;
use Piwik\Config;
use Piwik\Piwik;
use Piwik\Plugins\Goals\API as APIGoals;
use Piwik\Url;
use Piwik\View;
use Piwik\WidgetsList;
use Piwik\Widget;


class Controller extends \Piwik\Plugin\Controller
{
	/**function widgetLiveLoad()
        {
                $settings = new Settings('IcecastStatistics');
                $autoRefresh  = $settings->autoRefresh->getValue();
                $refreshInterval  = $settings->refreshInterval->getValue() * 1000;
                $hostname = $settings->host->getValue();
                $port = $settings->port->getValue();
                $username = $settings->username->getValue();
                $password = $settings->password->getValue();
                $mountpoint = $settings->mountpoint->getValue();
                $output = '';
                if ($autoRefresh == 1) {
                $output .= "<SCRIPT LANGUAGE='javascript'>
                            var reloadLiveLoad;
                            $('document').ready(function(){
                                if (typeof reloadLiveLoad === 'undefined')
                                    reloadLiveLoad = setInterval(refreshLiveLoad,{$refreshInterval});
                            });
                            function refreshLiveLoad () {
                                $('[widgetid=widgetIcecastStatisticswidgetLiveLoad]').dashboardWidget('reload', false, true);
                            }
                        </SCRIPT>";
                }

        $output .= $this->getListeners($hostname,$port,$username,$password,$mountpoint);

        return "$output";
    }**/

/**	function widgetLiveLoad2()
        {
		if ($autoRefresh == 1) {
                $output .= "<SCRIPT LANGUAGE='javascript'>
                            var reloadLiveLoad;
                            $('document').ready(function(){
                                if (typeof reloadLiveLoad === 'undefined')
                                    reloadLiveLoad = setInterval(refreshLiveLoad,{$refreshInterval});
                            });
                            function refreshLiveLoad () {
                                $('[widgetid=widgetIcecastStatisticswidgetLiveLoad2]').dashboardWidget('reload', false, true);
                            }
                        </SCRIPT>";
                }
		$output .= $this->widgetLiveLoad();

		return $output;
	}**/

	function widgetLiveLoad()
        {
                $settings = new Settings('IcecastStatistics');
                $autoRefresh  = $settings->autoRefresh->getValue();
                $refreshInterval  = $settings->refreshInterval->getValue() * 1000;
                $hostname = $settings->host->getValue();
                $port = $settings->port->getValue();
                $username = $settings->username->getValue();
                $password = $settings->password->getValue();
                $mountpoint = $settings->mountpoint->getValue();
		$output = '';
                /**
		if ($autoRefresh == 1) {
                	$output .= "<SCRIPT LANGUAGE='javascript'>
                            var reloadLiveLoad;
                            $('document').ready(function(){
                                if (typeof reloadLiveLoad === 'undefined')
                                    reloadLiveLoad = setInterval(refreshLiveLoad,{$refreshInterval});
                            });
                            function refreshLiveLoad () {
                                $('[widgetid=widgetIcecastStatisticswidgetLiveLoad]').dashboardWidget('reload', false, true);
                            }
                        </SCRIPT>";
                }**/
        	$output = $this->getListeners($hostname,$port,$username,$password,$mountpoint);

		$returnValue = "";

		if($settings->displayButtonCurrentlyListeners->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['listeners']."</div>"."</div>"."<div id='description'>Currently amount of listeners</div>"."</div>";
	        }
		if($settings->displayButtonTitle->getValue()){
	                $returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['title']."</div>"."</div>"."<div id='description'>Currently Title</div>"."</div>";
        	}
		if($settings->displayButtonAudioInfo->getValue()){
        	        $returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['audio_info']."</div>"."</div>"."<div id='description'>Combined Audio Information</div>"."</div>";
	        }
		if($settings->displayButtonBitrate->getValue()){
	                $returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['bitrate']." kBit/s"."</div>"."</div>"."<div id='description'>Currently Bitrate</div>"."</div>";
        	}
		if($settings->displayButtonChannels->getValue()){
        	        $returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['channels']."</div>"."</div>"."<div id='description'>Amount of Channels</div>"."</div>";
	        }
		if($settings->displayButtonListenerPeak->getValue()){
        	        $returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['listener_peak']."</div>"."</div>"."<div id='description'>Peak of toadys listeners</div>"."</div>";
	        }
		if($settings->displayButtonListenUrl->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['listenurl']."</div>"."</div>"."<div id='description'>URL</div>"."</div>";
	        }
		if($settings->displayButtonMaxListeners->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['max_listeners']."</div>"."</div>"."<div id='description'>Maximum allowed listeners</div>"."</div>";
	        }
		if($settings->displayButtonPublic->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['public']."</div>"."</div>"."<div id='description'>Public(?)</div>"."</div>";
	        }
		if($settings->displayButtonSampleRate->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['samplerate']."Hz"."</div>"."</div>"."<div id='description'>Samplerate</div>"."</div>";
	        }
		if($settings->displayButtonServerDescription->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['server_description']."</div>"."</div>"."<div id='description'>Server description</div>"."</div>";
	        }
		if($settings->displayButtonServerName->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['server_name']."</div>"."</div>"."<div id='description'>Server Name</div>"."</div>";
	        }
		if($settings->displayButtonServerType->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['server_type']."</div>"."</div>"."<div id='description'>Codec</div>"."</div>";
	        }
		if($settings->displayButtonServerUrl->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['server_url']."</div>"."</div>"."<div id='description'>Site URL</div>"."</div>";
	        }
		if($settings->displayButtonSlowListeners->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['slow_listeners']."</div>"."</div>"."<div id='description'>Slow listeners</div>"."</div>";
	        }
		if($settings->displayButtonSourceIp->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['source_ip']."</div>"."</div>"."<div id='description'>Source IP</div>"."</div>";
	        }
		if($settings->displayButtonStreamStart->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['stream_start']."</div>"."</div>"."<div id='description'>Stream started</div>"."</div>";
	        }
		if($settings->displayButtonStreamStartIso8601->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['stream_start_iso8601']."</div>"."</div>"."<div id='description'>Stream started</div>"."</div>";
	        }
		if($settings->displayButtonTotalBytesSent->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".round($output['total_bytes_sent'] / 1024 / 1024)."</div>"."</div>"."<div id='description'>Total MBytes sent</div>"."</div>";
	        }
		if($settings->displayButtonTotalBytesRead->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".round($output['total_bytes_read'] / 1024 /1024)."</div>"."</div>"."<div id='description'>Total MBytes read</div>"."</div>";
	        }
		if($settings->displayButtonUserAgent->getValue()){
                	$returnValue .= "<div id='container'>"."<div id='value'>"."<div id='inner'>".$output['user_agent']."</div>"."</div>"."<div id='description'>User Agent</div>"."</div>";
	        }
                
                if ($autoRefresh == 1) {
                        $returnValue .= "<SCRIPT LANGUAGE='javascript'>
                            var reloadLiveLoad;
                            $('document').ready(function(){
                                if (typeof reloadLiveLoad === 'undefined')
                                    reloadLiveLoad = setInterval(refreshLiveLoad,{$refreshInterval});
                            });
                            function refreshLiveLoad () {
                                $('[widgetid=widgetIcecastStatisticswidgetLiveLoad]').dashboardWidget('reload', false, true);
                            }
                        </SCRIPT>";
                }
		return $returnValue;
	}

	function getListeners(&$hostname,&$port,&$username,&$password,&$mountpoint)
	{
	        $fp = fopen("http://$username:$password@$hostname:$port/admin/stats","r")
	         or die("Error reading Icecast data from $server.");

        	while(!feof($fp))
	        {
         	        $data = fread($fp, 8192);
        	}

	        fclose($fp);

        	// Now parse the XML output for our mountpoint
	        $xml_parser = xml_parser_create();
	        xml_parse_into_struct($xml_parser, $data, $vals, $index);
	        xml_parser_free($xml_parser);

        	$params = array();
	        $level = array();
        	foreach ($vals as $xml_elem) {
                	if ($xml_elem['type'] == 'open') {
                        	if (array_key_exists('attributes',$xml_elem)) {
                                	list($level[$xml_elem['level']],$extra) = array_values($xml_elem['attributes']);
	                        } else {
        	                        $level[$xml_elem['level']] = $xml_elem['tag'];
                	        }
	                }
        	        if ($xml_elem['type'] == 'complete') {
                	        $start_level = 1;
                        	$php_stmt = '$params';
	                        while($start_level < $xml_elem['level']) {
        	                        $php_stmt .= '[$level['.$start_level.']]';
                	                $start_level++;
                        	}
                                	$php_stmt .= '[$xml_elem[\'tag\']] = $xml_elem[\'value\'];';
	                                eval($php_stmt);
       	                }
               	}

		$icecastParams['listeners'] = $params['ICESTATS'][$mountpoint]['LISTENERS'];
		$icecastParams['audio_info'] = $params['ICESTATS'][$mountpoint]['AUDIO_INFO'];
		$icecastParams['bitrate'] = $params['ICESTATS'][$mountpoint]['BITRATE'];
		$icecastParams['channels'] = $params['ICESTATS'][$mountpoint]['CHANNELS'];
		$icecastParams['listener_peak'] = $params['ICESTATS'][$mountpoint]['LISTENER_PEAK'];
		$icecastParams['listeners'] = $params['ICESTATS'][$mountpoint]['LISTENERS'];
		$icecastParams['listenurl'] = $params['ICESTATS'][$mountpoint]['LISTENURL'];
		$icecastParams['max_listeners'] = $params['ICESTATS'][$mountpoint]['MAX_LISTENERS'];
		$icecastParams['public'] = $params['ICESTATS'][$mountpoint]['PUBLIC'];
		$icecastParams['samplerate'] = $params['ICESTATS'][$mountpoint]['SAMPLERATE'];
		$icecastParams['server_description'] = $params['ICESTATS'][$mountpoint]['SERVER_DESCRIPTION'];
		$icecastParams['server_name'] = $params['ICESTATS'][$mountpoint]['SERVER_NAME'];
		$icecastParams['server_type'] = $params['ICESTATS'][$mountpoint]['SERVER_TYPE'];
		$icecastParams['server_url'] = $params['ICESTATS'][$mountpoint]['SERVER_URL'];
		$icecastParams['slow_listeners'] = $params['ICESTATS'][$mountpoint]['SLOW_LISTENERS'];
		$icecastParams['source_ip'] = $params['ICESTATS'][$mountpoint]['SOURCE_IP'];
		$icecastParams['stream_start'] = $params['ICESTATS'][$mountpoint]['STREAM_START'];
		$icecastParams['stream_start_iso8601'] = $params['ICESTATS'][$mountpoint]['STREAM_START_ISO8601'];
		$icecastParams['title'] = $params['ICESTATS'][$mountpoint]['TITLE'];
		$icecastParams['total_bytes_read'] = $params['ICESTATS'][$mountpoint]['TOTAL_BYTES_READ'];
		$icecastParams['total_bytes_sent'] = $params['ICESTATS'][$mountpoint]['TOTAL_BYTES_SENT'];
		$icecastParams['user_agent'] = $params['ICESTATS'][$mountpoint]['USER_AGENT'];

		return $icecastParams;
	}
    }
