# Instructions:

Copy File inside ```app/code``` directory.

Run the following command ```dockergento bash``` inside terminal.

In bash run the command ```php bin/magento module:status```
In the ```List of disabled modules:``` you will see ```Alliance_Linkedin```
To Active module run the command : ```php bin/magento module:enable Alliance_Linkedin```
The next step is to run ```php bin/magento setup:upgrade``` to notifying Magento of its presence.

In order to verify that  it has been recognized, check the ```app/etc/config.php``` file.


