<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\IcecastStatistics;

class IcecastStatistics extends \Piwik\Plugin
{
    public function registerEvents(){
        return array(
            'AssetManager.getStylesheetFiles' => 'getStylesheetFiles'
	);
    }
    
    public function getStylesheetFiles(&$stylesheets){
    	$stylesheets[] = "plugins/IcecastStatistics/stylesheets/main.css";
    }

}
