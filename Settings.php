<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link http://piwik.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\Plugins\IcecastStatistics;

use Piwik\Settings\SystemSetting;
use Piwik\Settings\UserSetting;

/**
 * Defines Settings for IcecastStatistics.
 *
 * Usage like this:
 * $settings = new Settings('IcecastStatistics');
 * $settings->autoRefresh->getValue();
 * $settings->metric->getValue();
 */
class Settings extends \Piwik\Plugin\Settings
{
    /** @var UserSetting */
    public $autoRefresh;

    /** @var UserSetting */
    public $refreshInterval;

    /** @var UserSetting */
    public $color;

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
        $this->setIntroduction('Here you can specify the settings for this plugin.');

        // User setting --> checkbox converted to bool
        $this->createAutoRefreshSetting();

        // User setting --> textbox converted to int defining a validator and filter
        $this->createRefreshIntervalSetting();

        // System setting --> allows selection of a single value
        $this->createHostSetting();

        // System setting --> allows selection of multiple values
        $this->createPortSetting();

        // System setting --> textarea
        $this->createUsernameSetting();

        // System setting --> textarea
        $this->createPasswordSetting();

        // System setting --> textarea
	$this->createMountpointSetting();

	// User settings --> Bools to control which informations are displayed
	$this->createdisplayButtonAudioInfo();
	$this->createdisplayButtonBitrate();
	$this->createdisplayButtonChannels();
        $this->createdisplayButtonListenerPeak();
        $this->createdisplayButtonCurrentlyListeners();
        $this->createdisplayButtonListenUrl();
        $this->createdisplayButtonMaxListeners();
        $this->createdisplayButtonPublic();
        $this->createdisplayButtonSampleRate();
        $this->createdisplayButtonServerDescription();
        $this->createdisplayButtonServerName();
        $this->createdisplayButtonServerType();
        $this->createdisplayButtonServerUrl();
        $this->createdisplayButtonSlowListeners();
        $this->createdisplayButtonSourceIp();
        $this->createdisplayButtonStreamStart();
        $this->createdisplayButtonStreamStartIso8601();
        $this->createdisplayButtonTitle();
        $this->createdisplayButtonTotalBytesSent();
        $this->createdisplayButtonTotalBytesRead();
	$this->createdisplayButtonUserAgent();
    }

    private function createAutoRefreshSetting()
    {
        $this->autoRefresh        = new UserSetting('autoRefresh', 'Auto refresh');
        $this->autoRefresh->type  = static::TYPE_BOOL;
        $this->autoRefresh->uiControlType = static::CONTROL_CHECKBOX;
        $this->autoRefresh->description   = 'If enabled, the informations displayed in the widget will be automatically refreshed depending on the specified interval';
        $this->autoRefresh->defaultValue  = false;

        $this->addSetting($this->autoRefresh);
    }

    private function createdisplayButtonAudioInfo()
    {
        $this->displayButtonAudioInfo        = new UserSetting('displayButtonAudioInfo', 'Enable displaying combined Audio Information');
        $this->displayButtonAudioInfo->type  = static::TYPE_BOOL;
        $this->displayButtonAudioInfo->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonAudioInfo->description   = '';
        $this->displayButtonAudioInfo->defaultValue  = false;

        $this->addSetting($this->displayButtonAudioInfo);
    }

    private function createdisplayButtonBitrate()
    {
        $this->displayButtonBitrate        = new UserSetting('displayButtonBitrate', 'Enable displaying of the currently bitrate');
        $this->displayButtonBitrate->type  = static::TYPE_BOOL;
        $this->displayButtonBitrate->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonBitrate->description   = '';
        $this->displayButtonBitrate->defaultValue  = false;

        $this->addSetting($this->displayButtonBitrate);
    }

    private function createdisplayButtonChannels()
    {
        $this->displayButtonChannels        = new UserSetting('displayButtonChannels', 'Enable displaying of the currently number of channels');
        $this->displayButtonChannels->type  = static::TYPE_BOOL;
        $this->displayButtonChannels->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonChannels->description   = '';
        $this->displayButtonChannels->defaultValue  = false;

        $this->addSetting($this->displayButtonChannels);
    }

    private function createdisplayButtonListenerPeak()
    {
        $this->displayButtonListenerPeak        = new UserSetting('displayButtonListenerPeak', 'Enable displaying of the maximum Number of listeners today');
        $this->displayButtonListenerPeak->type  = static::TYPE_BOOL;
        $this->displayButtonListenerPeak->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonListenerPeak->description   = '';
        $this->displayButtonListenerPeak->defaultValue  = false;

        $this->addSetting($this->displayButtonListenerPeak);
    }

    private function createdisplayButtonCurrentlyListeners()
    {
        $this->displayButtonCurrentlyListeners        = new UserSetting('displayButtonCurrentlyListeners', 'Enable displaying the currently amount of listeners');
        $this->displayButtonCurrentlyListeners->type  = static::TYPE_BOOL;
        $this->displayButtonCurrentlyListeners->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonCurrentlyListeners->description   = '';
        $this->displayButtonCurrentlyListeners->defaultValue  = false;

        $this->addSetting($this->displayButtonCurrentlyListeners);
    }

    private function createdisplayButtonUserAgent()
    {
        $this->displayButtonUserAgent        = new UserSetting('displayButtonUserAgent', 'Display the user agent');
        $this->displayButtonUserAgent->type  = static::TYPE_BOOL;
        $this->displayButtonUserAgent->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonUserAgent->description   = '';
        $this->displayButtonUserAgent->defaultValue  = false;

        $this->addSetting($this->displayButtonUserAgent);
    }


private function createdisplayButtonListenUrl()
    {
        $this->displayButtonListenUrl        = new UserSetting('displayButtonListenUrl', 'Enable displaying of the currently ListenerURL');
        $this->displayButtonListenUrl->type  = static::TYPE_BOOL;
        $this->displayButtonListenUrl->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonListenUrl->description   = '';
        $this->displayButtonListenUrl->defaultValue  = false;

        $this->addSetting($this->displayButtonListenUrl);
    }


private function createdisplayButtonMaxListeners()
    {
        $this->displayButtonMaxListeners        = new UserSetting('displayButtonMaxListeners', 'Enable displaying of the Maximum amount of allowed listeners');
        $this->displayButtonMaxListeners->type  = static::TYPE_BOOL;
        $this->displayButtonMaxListeners->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonMaxListeners->description   = '';
        $this->displayButtonMaxListeners->defaultValue  = false;

        $this->addSetting($this->displayButtonMaxListeners);
    }

private function createdisplayButtonPublic()
    {
        $this->displayButtonPublic        = new UserSetting('displayButtonPublic', 'Enable displaying if your server is public ');
        $this->displayButtonPublic->type  = static::TYPE_BOOL;
        $this->displayButtonPublic->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonPublic->description   = '';
        $this->displayButtonPublic->defaultValue  = false;

        $this->addSetting($this->displayButtonPublic);
    }

private function createdisplayButtonSampleRate()
    {
        $this->displayButtonSampleRate        = new UserSetting('displayButtonSampleRate', 'Enable displaying of the currently sample rate');
        $this->displayButtonSampleRate->type  = static::TYPE_BOOL;
        $this->displayButtonSampleRate->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonSampleRate->description   = '';
        $this->displayButtonSampleRate->defaultValue  = false;

        $this->addSetting($this->displayButtonSampleRate);
    }

private function createdisplayButtonServerDescription()
    {
        $this->displayButtonServerDescription        = new UserSetting('displayButtonServerDescription', 'Enable displaying of the currently Server description');
        $this->displayButtonServerDescription->type  = static::TYPE_BOOL;
        $this->displayButtonServerDescription->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonServerDescription->description   = '';
        $this->displayButtonServerDescription->defaultValue  = false;

        $this->addSetting($this->displayButtonServerDescription);
    }

private function createdisplayButtonServerName()
    {
        $this->displayButtonServerName        = new UserSetting('displayButtonServerName', 'Enable displaying of the currently server name');
        $this->displayButtonServerName->type  = static::TYPE_BOOL;
        $this->displayButtonServerName->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonServerName->description   = '';
        $this->displayButtonServerName->defaultValue  = false;

        $this->addSetting($this->displayButtonServerName);
    }

private function createdisplayButtonServerType()
    {
        $this->displayButtonServerType        = new UserSetting('displayButtonServerType', 'Enable displaying the codec information');
        $this->displayButtonServerType->type  = static::TYPE_BOOL;
        $this->displayButtonServerType->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonServerType->description   = '';
        $this->displayButtonServerType->defaultValue  = false;

        $this->addSetting($this->displayButtonServerType);
    }

private function createdisplayButtonServerUrl()
    {
        $this->displayButtonServerUrl        = new UserSetting('displayButtonServerUrl', 'Enable displaying of the currently server URL');
        $this->displayButtonServerUrl->type  = static::TYPE_BOOL;
        $this->displayButtonServerUrl->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonServerUrl->description   = '';
        $this->displayButtonServerUrl->defaultValue  = false;

        $this->addSetting($this->displayButtonServerUrl);
    }

private function createdisplayButtonSlowListeners()
    {
        $this->displayButtonSlowListeners        = new UserSetting('displayButtonSlowListeners', 'Enable displaying the currently amount of slow listeners');
        $this->displayButtonSlowListeners->type  = static::TYPE_BOOL;
        $this->displayButtonSlowListeners->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonSlowListeners->description   = '';
        $this->displayButtonSlowListeners->defaultValue  = false;

        $this->addSetting($this->displayButtonSlowListeners);
    }

private function createdisplayButtonSourceIp()
    {
        $this->displayButtonSourceIp        = new UserSetting('displayButtonSourceIp', 'Enable displaying of the currently source IP');
        $this->displayButtonSourceIp->type  = static::TYPE_BOOL;
        $this->displayButtonSourceIp->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonSourceIp->description   = '';
        $this->displayButtonSourceIp->defaultValue  = false;

        $this->addSetting($this->displayButtonSourceIp);
    }

private function createdisplayButtonStreamStart()
    {
        $this->displayButtonStreamStart        = new UserSetting('displayButtonStreamStart', 'Enable displaying the start time of the server');
        $this->displayButtonStreamStart->type  = static::TYPE_BOOL;
        $this->displayButtonStreamStart->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonStreamStart->description   = '';
        $this->displayButtonStreamStart->defaultValue  = false;

        $this->addSetting($this->displayButtonStreamStart);
    }

private function createdisplayButtonStreamStartIso8601()
    {
        $this->displayButtonStreamStartIso8601        = new UserSetting('displayButtonStreamStartIso8601', 'Enable displaying the start time of the serverin ISO8601 format');
        $this->displayButtonStreamStartIso8601->type  = static::TYPE_BOOL;
        $this->displayButtonStreamStartIso8601->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonStreamStartIso8601->description   = '';
        $this->displayButtonStreamStartIso8601->defaultValue  = false;

        $this->addSetting($this->displayButtonStreamStartIso8601);
    }

private function createdisplayButtonTitle()
    {
        $this->displayButtonTitle        = new UserSetting('displayButtonTitle', 'Enable displaying of the currently played title');
        $this->displayButtonTitle->type  = static::TYPE_BOOL;
        $this->displayButtonTitle->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonTitle->description   = '';
        $this->displayButtonTitle->defaultValue  = false;

        $this->addSetting($this->displayButtonTitle);
    }

private function createdisplayButtonTotalBytesSent()
    {
        $this->displayButtonTotalBytesSent        = new UserSetting('displayButtonTotalBytesSent', 'Enable displaying the total amount of sent bytes');
        $this->displayButtonTotalBytesSent->type  = static::TYPE_BOOL;
        $this->displayButtonTotalBytesSent->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonTotalBytesSent->description   = '';
        $this->displayButtonTotalBytesSent->defaultValue  = false;

        $this->addSetting($this->displayButtonTotalBytesSent);
    }

private function createdisplayButtonTotalBytesRead()
    {
        $this->displayButtonTotalBytesRead        = new UserSetting('displayButtonTotalBytesRead', 'Enable displaying the total amount of read bytes');
        $this->displayButtonTotalBytesRead->type  = static::TYPE_BOOL;
        $this->displayButtonTotalBytesRead->uiControlType = static::CONTROL_CHECKBOX;
        $this->displayButtonTotalBytesRead->description   = '';
        $this->displayButtonTotalBytesRead->defaultValue  = false;

        $this->addSetting($this->displayButtonTotalBytesRead);
    }



    private function createRefreshIntervalSetting()
    {
        $this->refreshInterval        = new UserSetting('refreshInterval', 'Refresh Interval');
        $this->refreshInterval->type  = static::TYPE_INT;
        $this->refreshInterval->uiControlType = static::CONTROL_TEXT;
        $this->refreshInterval->uiControlAttributes = array('size' => 3);
        $this->refreshInterval->description     = 'Defines how often the value should be updated';
        $this->refreshInterval->inlineHelp      = 'Enter a number which is >= 15';
        $this->refreshInterval->defaultValue    = '30';
        $this->refreshInterval->validate = function ($value, $setting) {
            if ($value < 15) {
                throw new \Exception('Value is invalid');
            }
        };

        $this->addSetting($this->refreshInterval);
    }

    private function createHostSetting()
    {
        $this->host        = new SystemSetting('host', 'Hostname');
        $this->host->type  = static::TYPE_STRING;
        $this->host->uiControlType = static::CONTROL_TEXT;
        $this->host->introduction  = '';
        $this->host->description   = 'This is the hostname of the IceCast Server. e.g. localhost, technoac.de, or 8.8.8.8';
        $this->host->defaultValue  = 'localhost';
        $this->host->readableByCurrentUser = true;

        $this->addSetting($this->host);
    }

    private function createUsernameSetting()
    {
        $this->username        = new SystemSetting('username', 'Username');
        $this->username->type  = static::TYPE_STRING;
        $this->username->uiControlType = static::CONTROL_TEXT;
        $this->username->introduction  = '';
        $this->username->description   = 'This is the Username of the IceCast Server';
        $this->username->defaultValue  = 'admin';
        $this->username->readableByCurrentUser = true;

        $this->addSetting($this->username);
    }

    private function createPortSetting()
    {
        $this->port        = new SystemSetting('port', 'Port');
        $this->port->type  = static::TYPE_INT;
        $this->port->uiControlType = static::CONTROL_TEXT;
        $this->port->introduction  = '';
        $this->port->description   = 'Port on which the IceCast Server is Screaming. e.g. 8000';
	$this->port->defaultValue  = '8000';
        $this->port->readableByCurrentUser = true;

        $this->addSetting($this->port);
    }

    private function createPasswordSetting()
    {
        $this->password        = new SystemSetting('password', 'Password');
        $this->password->type  = static::TYPE_STRING;
        $this->password->uiControlType = static::CONTROL_TEXT;
        $this->password->introduction  = '';
        $this->password->description   = 'This is the Password of the IceCast Server';
        $this->password->defaultValue  = 'iAmAPassword';
        $this->password->readableByCurrentUser = true;

        $this->addSetting($this->password);

    }

    private function createMountpointSetting()
    {
        $this->mountpoint        = new SystemSetting('mountpoint', 'Mountpoint');
        $this->mountpoint->type  = static::TYPE_STRING;
        $this->mountpoint->uiControlType = static::CONTROL_TEXT;
        $this->mountpoint->introduction  = '';
        $this->mountpoint->description   = 'This is the Mountpoint you want to read. e.g. /stream.ogg';
        $this->mountpoint->defaultValue  = '/stream.ogg';
        $this->mountpoint->readableByCurrentUser = true;

        $this->addSetting($this->mountpoint);

    }
}
