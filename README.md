# Piwik IceCast Statistics Plugin

## Description

This is a plugin for the Open Source Web Analytics platform Piwik. If enabled, it will add an widgets that you can add to your dashboard.
The widget will show various information about your IceCast Server-Mountpoint. You can choose which information are displayed in the widget by activating them in your "Personal Settings" -> "Plugin Settings".

The initial idea was to display the current played title and acutally connected listeners. This was made for an friend www.technoac.de

Please fill the user credentials and hostname of the IceCast server in the "Administrator Settings" -> "Plugin Settings".
You can activate and set an refresh interval in your "Personal Settings" -> "Plugin Settings".

Before this plugin will display informations about your mountpoint, you have toactivate them.

You can display the following informations by activating them as described:

	- Combined audio informations
	- Bitrate
	- Number of channels
	- Maximum number of todays listeners
	- Currently amount of listeners
	- Listener URL
	- Maximum number of allowed listeners to your mountpoint
	- Show the value if your server is set to "public"
	- Display the currently sample rate
	- Display the chosen server description
	- Display the chosen server name
	- Display the codec information
	- Display the chosen server URL
	- Display the amount of slow listeners
	- Display the source IP
	- Display the start time of the server
	- Display the start time of the server in ISO8601 format
	- Display the currently played title
	- Display the amount of total sent Megabytes
	- Display the amount of total read Megabytes
	- Display the user agent of the shoutcast server

If you have further questions to the values, please visit the original IceCast documentation: http://icecast.org/docs/


## Documentation

0. [To place the plugin manually from github repository]: 
	Clone the plugin into the plugins directory of your Piwik installation.

	```
	cd plugins/
	git clone https://github.com/hoamer/IceCast-Statistics.git IcecastStatistics
	```

1. Login as superuser into your Piwik installation and activate the plugin under Settings -> Plugins

2. Activate the informations you want to display in your "Personal Settings" -> "Plugin settings".

3. You will now find the widget under the Dashboard section.

4. Please fill the user credentials and hostname of the IceCast server in the "Administrator Settings" -> "Plugin Settings".

5. Before this plugin will display informations about your mountpoint, fill the user credentials and hostname of the IceCast server Before this plugin will display informations about your mountpoint, fill the user credentials and hostname of the IceCast server in the "Administrator Settings" -> "Plugin Settings".


## Changelog

1. Due to piwik changes the directory structure and files have changes. Please read the commits to see the changes

2. Changed the Style of dislayed informations. It is now much more responsible and nicer integrated.