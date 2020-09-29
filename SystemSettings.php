<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\IceCastStatistics;

use Piwik\Settings\Setting;
use Piwik\Settings\FieldConfig;

/**
 * Defines Settings for IceCastStatistics.
 *
 * Usage like this:
 * $settings = new SystemSettings();
 * $settings->metric->getValue();
 * $settings->description->getValue();
 */
class SystemSettings extends \Piwik\Settings\Plugin\SystemSettings
{
    /** @var SystemSetting */
    public $host;

    /** @var SystemSetting */
    public $browsers;

    /** @var SystemSetting */
    public $description;

    /** @var SystemSetting */
    public $password;

    protected function init()
    {
        $this->protocol = $this->createProtocolSetting();
        $this->hostname = $this->createHostSetting();
        $this->port = $this->createPortSetting();
        $this->username = $this->createUsernameSetting();
        $this->password = $this->createPasswordSetting();
        $this->mountpoint = $this->createMountpointSetting();
    }


    private function createPasswordSetting()
    {
        $default = "ThisIsAPassword";

        return $this->makeSetting('password', $default, FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'IceCast Password';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT; //VIELLEICHT FALSCHER TYPE!! "_TEXTAREA"
            $field->description = 'This is the Passowrd of the IceCast Server.';
        });
    }

    private function createProtocolSetting()
    {
        $default = "https";

        return $this->makeSetting('protocol', $default, FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'Protocol';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT; 
            $field->description = 'This is the protocol used to connect to your IceCast-Server. Either http, oder https.';
        });
    }

    private function createHostSetting()
    {
        $default = "localhost";

        return $this->makeSetting('hostname', $default, FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'Hostname';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT; //VIELLEICHT FALSCHER TYPE!! "_TEXTAREA"
            $field->description = 'This is the hostname of the IceCast Server. e.g. localhost, technoac.de, or 8.8.8.8';
        });
    }

    private function createUsernameSetting()
    {
        $default = "admin";

        return $this->makeSetting('username', $default, FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'Username';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT; //VIELLEICHT FALSCHER TYPE!! "_TEXTAREA"
            $field->description = 'This is the Username of the IceCast Server';
        });
    }

    private function createPortSetting()
    {
        $default = "8000";

        return $this->makeSetting('port', $default, FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'Port';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT; //VIELLEICHT FALSCHER TYPE!! "_TEXTAREA"
            $field->description = 'Port on which the IceCast Server is Screaming. e.g. 8000';
        });
    }

    private function createMountpointSetting()
    {
        $default = "/stream.ogg";

        return $this->makeSetting('mountpoint', $default, FieldConfig::TYPE_STRING, function (FieldConfig $field) {
            $field->title = 'Mountpoint';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT; //VIELLEICHT FALSCHER TYPE!! "_TEXTAREA"
            $field->description = 'This is the Mountpoint you want to read. e.g. /stream.ogg';
        });
    }
}
