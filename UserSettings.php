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
 * $settings = new UserSettings();
 * $settings->autoRefresh->getValue();
 * $settings->color->getValue();
 */
class UserSettings extends \Piwik\Settings\Plugin\UserSettings
{
    /** @var UserSetting */
    public $autoRefresh;

    /** @var UserSetting */
    public $refreshInterval;

    /** @var UserSetting */
    public $color;


    protected function init()
    {
        $this->autoRefresh = $this->createAutoRefreshSetting();

        $this->refreshInterval = $this->createRefreshIntervalSetting();

        $this->displayButtonAudioInfo = $this->createdisplayButtonAudioInfo();
        $this->displayButtonBitrate = $this->createdisplayButtonBitrate();
        $this->displayButtonChannels = $this->createdisplayButtonChannels();
        $this->displayButtonListenerPeak = $this->createdisplayButtonListenerPeak();
        $this->displayButtonCurrentlyListeners = $this->createdisplayButtonCurrentlyListeners();
        $this->displayButtonListenUrl = $this->createdisplayButtonListenUrl();
        $this->displayButtonMaxListeners = $this->createdisplayButtonMaxListeners();
        $this->displayButtonPublic = $this->createdisplayButtonPublic();
        $this->displayButtonSampleRate = $this->createdisplayButtonSampleRate();
        $this->displayButtonServerDescription = $this->createdisplayButtonServerDescription();
        $this->displayButtonServerName = $this->createdisplayButtonServerName();
        $this->displayButtonServerType = $this->createdisplayButtonServerType();
        $this->displayButtonServerUrl = $this->createdisplayButtonServerUrl();
        $this->displayButtonSlowListeners = $this->createdisplayButtonSlowListeners();
        $this->displayButtonSourceIp = $this->createdisplayButtonSourceIp();
        $this->displayButtonStreamStart = $this->createdisplayButtonStreamStart();
        $this->displayButtonStreamStartIso8601 = $this->createdisplayButtonStreamStartIso8601();
        $this->displayButtonTitle = $this->createdisplayButtonTitle();
        $this->displayButtonTotalBytesSent = $this->createdisplayButtonTotalBytesSent();
        $this->displayButtonTotalBytesRead = $this->createdisplayButtonTotalBytesRead();
        $this->displayButtonUserAgent = $this->createdisplayButtonUserAgent();
    }

    private function createRefreshIntervalSetting()
    {
        return $this->makeSetting('refreshInterval', $default = '15', FieldConfig::TYPE_INT, function (FieldConfig $field) {
            $field->title = 'Refresh Interval';
            $field->uiControl = FieldConfig::UI_CONTROL_TEXT;
            $field->uiControlAttributes = array('size' => 3);
            $field->inlineHelp = 'Enter a number which is >= 15';
            $field->introduction = 'New group of settings';
            $field->description = 'Defines how often the widget should be updated';
            $field->validate = function ($value, $setting) {
                if ($value < 15) {
                    throw new \Exception('Value is invalid');
                }
            };
        });
    }

    private function createAutoRefreshSetting()
    {
        return $this->makeSetting('autoRefresh', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Auto refresh';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'If enabled, the informations displayed in the widget will be automatically refreshed depending on the specified interval';
        });
    }

    private function createdisplayButtonAudioInfo()
    {
        return $this->makeSetting('displayButtonAudioInfo', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Combined audio information';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying combined Audio Information';
        });
    }

    private function createdisplayButtonBitrate()
    {
        return $this->makeSetting('displayButtonBitrate', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Bitrate';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying the bitrate';
        });
    }
    
    private function createdisplayButtonChannels()
    {
        return $this->makeSetting('displayButtonChannels', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Number of channels';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying the number of channels';
        });
    }

    private function createdisplayButtonListenerPeak()
    {
        return $this->makeSetting('displayButtonListenerPeak', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Maximum number of todays listeners';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying the maximum number of todays listeners';
        });
    }

    private function createdisplayButtonCurrentlyListeners()
    {
        return $this->makeSetting('displayButtonCurrentlyListeners', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Current amount of listeners';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying the current amount of listeners';
        });
    }

    private function createdisplayButtonUserAgent()
    {
        return $this->makeSetting('displayButtonUserAgent', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'User agent';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Display the user agent of the IceCast client';
        });
    }

    private function createdisplayButtonListenUrl()
    {
        return $this->makeSetting('displayButtonListenUrl', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'ListenerURL';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying the URL to the chosen mountpoint';
        });
    }

    private function createdisplayButtonMaxListeners()
    {
        return $this->makeSetting('displayButtonMaxListeners', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Amount of allowed listeners';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying the maximum amount of allowed listeners';
        });
    }

    private function createdisplayButtonPublic()
    {
        return $this->makeSetting('displayButtonPublic', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Server is public?';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying whether your server is public or not';
        });
    }

    private function createdisplayButtonSampleRate()
    {
        return $this->makeSetting('displayButtonSampleRate', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Sample rate';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying the currently used sample rate';
        });
    }

    private function createdisplayButtonServerDescription()
    {
        return $this->makeSetting('displayButtonServerDescription', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Server description';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying the server description';
        });
    }

    private function createdisplayButtonServerName()
    {
        return $this->makeSetting('displayButtonServerName', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Server name';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying of the server name';
        });
    }

    private function createdisplayButtonServerType()
    {
        return $this->makeSetting('displayButtonServerType', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Codec information';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying the codec information';
        });
    }

    private function createdisplayButtonServerUrl()
    {
        return $this->makeSetting('displayButtonServerUrl', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Server URL';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying of the server URL';
        });
    }

    private function createdisplayButtonSlowListeners()
    {
        return $this->makeSetting('displayButtonSlowListeners', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Amount of slow listeners';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying the currently amount of slow listeners';
        });
    }

    private function createdisplayButtonSourceIp()
    {
        return $this->makeSetting('displayButtonSourceIp', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Source IP';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'IP address of the currently connected source client. In case of relays the content of <server>';
        });
    }

    private function createdisplayButtonStreamStart()
    {
        return $this->makeSetting('displayButtonStreamStart', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Start time of the server';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying the start time of the server';
        });
    }

    private function createdisplayButtonStreamStartIso8601()
    {
        return $this->makeSetting('displayButtonStreamStartIso8601', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Start time of the serverin ISO8601 format';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying the start time of the server in ISO8601 format';
        });
    }

    private function createdisplayButtonTitle()
    {
        return $this->makeSetting('displayButtonTitle', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Currently played title';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying of the currently played title';
        });
    }

    private function createdisplayButtonTotalBytesSent()
    {
        return $this->makeSetting('displayButtonTotalBytesSent', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Total amount of sent bytes';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying the total amount of sent bytes';
        });
    }

    private function createdisplayButtonTotalBytesRead()
    {
        return $this->makeSetting('displayButtonTotalBytesRead', $default = false, FieldConfig::TYPE_BOOL, function (FieldConfig $field) {
            $field->title = 'Total amount of read bytes';
            $field->uiControl = FieldConfig::UI_CONTROL_CHECKBOX;
            $field->description = 'Enable displaying the total amount of read bytes';
        });
    }
}