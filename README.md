# SB-Pi-HouseAlarm2
Raspberry Pi integration to a 1980s burglar alarm.

Pre-steps: 
1. Wire up sensors. On mine, there's 13V-ish when no movement is detected, then 0V when a sensor is tripped.
2. I created a potential divider for each sensor using 22k (R1) and 10k (R2) resistors. When tested with a multimeter, I got about 3.8V instead of 13V which the Pi was very happy with.
3. Tie the grounds together on the alarm and the Pi.
4. sudo apt install apache2 php  libapache2-mod-php
5. sudo chown -R pi /var/www
6. sudo chown -R www-data /var/www
7. cd /var/www/html and put the two files in there

To use...
Change the map as required in index.php
NOTE: For rooms that have sensors, those elements will need an id setting for them.
Change the entries in gpio.php to reflect the house layout and WiringPi pins that are being used.
Set up the 'monitor.py' file as a cron job on system boot.

Bonus feature: External access?
1. Create a noIP.com account and free hostname.
2. Set up your home broadband router to with a port forward on port 80 to theIP of the Pi. 
