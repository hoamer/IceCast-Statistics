<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 *
 */
namespace Piwik\Plugins\IceCastStatistics\Widgets;

use Piwik\Widget\Widget;
use Piwik\Widget\WidgetConfig;
use Piwik\View;

/**
 * This class allows you to add your own widget to the Piwik platform. In case you want to remove widgets from another
 * plugin please have a look at the "configureWidgetsList()" method.
 * To configure a widget simply call the corresponding methods as described in the API-Reference:
 * http://developer.piwik.org/api-reference/Piwik/Plugin\Widget
 */
class GetIceCastStatistics extends Widget
{
    public static function configure(WidgetConfig $config)
    {
        /**
         * Set the category the widget belongs to. You can reuse any existing widget category or define
         * your own category.
         */
        $config->setCategoryId('IceCastStatistics_IceCast');

        /**
         * Set the subcategory the widget belongs to. If a subcategory is set, the widget will be shown in the UI.
         */
        // $config->setSubcategoryId('General_Overview');

        /**
         * Set the name of the widget belongs to.
         */
        $config->setName('IceCastStatistics_IceCastStatistics');

        /**
         * Set the order of the widget. The lower the number, the earlier the widget will be listed within a category.
         */
        $config->setOrder(99);

        /**
         * Optionally set URL parameters that will be used when this widget is requested.
         * $config->setParameters(array('myparam' => 'myvalue'));
         */

        /**
         * Define whether a widget is enabled or not. For instance some widgets might not be available to every user or
         * might depend on a setting (such as Ecommerce) of a site. In such a case you can perform any checks and then
         * set `true` or `false`. If your widget is only available to users having super user access you can do the
         * following:
         *
         * $config->setIsEnabled(\Piwik\Piwik::hasUserSuperUserAccess());
         * or
         * if (!\Piwik\Piwik::hasUserSuperUserAccess())
         *     $config->disable();
         */
    }

    /**
     * This method renders the widget. It's on you how to generate the content of the widget.
     * As long as you return a string everything is fine. You can use for instance a "Piwik\View" to render a
     * twig template. In such a case don't forget to create a twig template (eg. myViewTemplate.twig) in the
     * "templates" directory of your plugin.
     *
     * @return string
     */
    public function render()
    {
        $systemSettings = new \Piwik\Plugins\IceCastStatistics\SystemSettings();
        $userSettings = new \Piwik\Plugins\IceCastStatistics\UserSettings();
        $autoRefresh  = $userSettings->autoRefresh->getValue();
        $refreshInterval  = $userSettings->refreshInterval->getValue() * 1000;
        $hostname = $systemSettings->hostname->getValue();
        $port = $systemSettings->port->getValue();
        $username = $systemSettings->username->getValue();
        $password = $systemSettings->password->getValue();
        $mountpoint = $systemSettings->mountpoint->getValue();
        $output = '';

        $output = $this->getListeners($hostname,$port,$username,$password,$mountpoint);
        $returnValue = "<table piwik-content-table><thead><tr><th>Description</th><th>Value</th></tr></thead><tbody>";

        if($userSettings->displayButtonCurrentlyListeners->getValue()){
                    $returnValue .= "<tr><td>Currently Listeners</td><td>" . $output['listeners']  . "</td></tr>";
                    //$returnValue .= "<tr><td>Currently Listeners</td><td>" .(rand (20,35) + $output['listeners'])  . "</td></tr>";
        }
        if($userSettings->displayButtonTitle->getValue()){
                    $returnValue .= "<tr><td>Current Title</td><td>" . $output['title'] . "</td></tr>";
        }
        if($userSettings->displayButtonAudioInfo->getValue()){
                    $returnValue .= "<tr><td>Combined Audio Info</td><td>" . $output['audio_info'] . "</td></tr>";
        }
        if($userSettings->displayButtonBitrate->getValue()){
                    $returnValue .= "<tr><td>Bitrate</td><td>" . $output['bitrate'] . "</td></tr>";
        }
        if($userSettings->displayButtonChannels->getValue()){
                    $returnValue .= "<tr><td>Channels</td><td>" . $output['channels'] . "</td></tr>";
        }
        if($userSettings->displayButtonListenerPeak->getValue()){
                    $returnValue .= "<tr><td>Peak of listeners since start</td><td>" . $output['listener_peak'] . "</td></tr>";
        }
        if($userSettings->displayButtonListenUrl->getValue()){
                    $returnValue .= "<tr><td>URL</td><td>" . $output['listenurl'] . "</td></tr>";
        }
        if($userSettings->displayButtonMaxListeners->getValue()){
                    $returnValue .= "<tr><td>Max. allowed listeners</td><td>" . $output['max_listeners'] . "</td></tr>";
        }
        if($userSettings->displayButtonPublic->getValue()){
                    $returnValue .= "<tr><td>Public?</td><td>" . $output['public'] . "</td></tr>";
        }
        if($userSettings->displayButtonSampleRate->getValue()){
                    $returnValue .= "<tr><td>Samplerate</td><td>" . $output['samplerate'] . "Hz" . "</td></tr>";
        }
        if($userSettings->displayButtonServerDescription->getValue()){
                    $returnValue .= "<tr><td>Server description</td><td>" . $output['server_description'] . "</td></tr>";
        }
        if($userSettings->displayButtonServerName->getValue()){
                    $returnValue .= "<tr><td>Server Name</td><td>" . $output['server_name'] . "</td></tr>";
        }
        if($userSettings->displayButtonServerType->getValue()){
                    $returnValue .= "<tr><td>Server type</td><td>" . $output['server_type'] . "</td></tr>";
        }
        if($userSettings->displayButtonServerUrl->getValue()){
                    $returnValue .= "<tr><td>Server URL</td><td>" . $output['server_url'] . "</td></tr>";
        }
        if($userSettings->displayButtonSlowListeners->getValue()){
                    $returnValue .= "<tr><td>Slow listeners</td><td>" . $output['slow_listeners'] . "</td></tr>";
        }
        if($userSettings->displayButtonSourceIp->getValue()){
                    $returnValue .= "<tr><td>Source IP</td><td>" . $output['source_ip'] . "</td></tr>";
        }
        if($userSettings->displayButtonStreamStart->getValue()){
                    $returnValue .= "<tr><td>Stream started</td><td>" . $output['stream_start'] . "</td></tr>";
        }
        if($userSettings->displayButtonStreamStartIso8601->getValue()){
                    $returnValue .= "<tr><td>Stream started</td><td>" . $output['stream_start_iso8601'] . "</td></tr>";
        }
        if($userSettings->displayButtonTotalBytesSent->getValue()){
                    $returnValue .= "<tr><td>Total Bytes sent</td><td>" . round($output['total_bytes_sent'] / 1024 /1024) . " Mbyte" . "</td></tr>";
        }
        if($userSettings->displayButtonTotalBytesRead->getValue()){
                    $returnValue .= "<tr><td>Total Bytes read</td><td>" . round($output['total_bytes_read'] / 1024 /1024) . " Mbyte" . "</td></tr>";
        }
        if($userSettings->displayButtonUserAgent->getValue()){
                    $returnValue .= "<tr><td>User agent</td><td>" . $output['user_agent'] . "</td></tr>";
        }

        if($returnValue == "<table piwik-content-table><thead><tr><th>Description</th><th>Value</th></tr></thead><tbody>"){
            $returnValue .= "<tr><td>Please acitvate the informations you want to display under 'Personal Settings' -> 'Plugin Settings'</td><td>";
	    $returnValue .= "<tr><td>You may also want to enable auto refreshing</td><td>";
        }else{
            $returnValue .= "</tbody> </table>";
        }

        if ($autoRefresh == 1) {
            $returnValue .= "<SCRIPT LANGUAGE='javascript'>
                                var reloadLiveLoad;
                                $('document').ready(function(){
                                    if (typeof reloadLiveLoad === 'undefined')
                                        reloadLiveLoad = setInterval(refreshLiveLoad,{$refreshInterval});
                                });
                                function refreshLiveLoad () {
                                    $('[widgetid=widgetIceCastStatisticsgetIceCastStatistics]').dashboardWidget('reload', false, true);
                                }
                            </SCRIPT>";
                }
        return $returnValue;
    }

    function getListeners(&$hostname,&$port,&$username,&$password,&$mountpoint)
    {
        $fp = fopen("http://$username:$password@$hostname:$port/admin/stats","r") or die("Error reading Icecast data from $hostname.");
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
                    if (!isset($level[$xml_elem['level']])){
                        list($level[$xml_elem['level']]) = array_values($xml_elem['attributes']);
                    }else{
                        $level[1] = array(
                        $xml_elem['level'] => array()
                        );
                        list($level[$xml_elem['level']],$extra) = array_values($xml_elem['attributes']);
                    }
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
