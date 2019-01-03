# CUTE Gamma Calibration System Software
This software is made to control and operate the hardware used for CUTE gamma calibration system. The package includes: 

* A script written in C (_cute_avr32.c_) that contains general functions used to communicate with the AVR board. This code is downloaded from the web by Phil Harwey, and is slightly manipulated for this purpose. The _cute_avr32.txt_ file includes basic manual for these functions.
* _cute_server.js_ written in Node JS by Phil. This code includes functions that are used to send and handle commands to the AVR board to drive the motor. 
* A bashscript _start_server_ that is used to configure the server code. It simply runs the node command as a background code using nohup. 
* An html file _cute_calibration_system.html_ that provides the interface to the code via graphical objects on a webpage. This code is written by Payam. 
* Several .php files that operate together with the html code to run commands that are needed to be handeld on the server side (opposed to the html code that runs on client side): 
	* _log_to_file.php_ produces a log file stored on the server from hardware data on a given frequency.
	* _login.php_ handles login options and security for the users.
	* _save_calibration_settings.php_ saves some calibration parameters on the server to be used by the next login to the webpage. 
	* _someone_using.php_ used to prevent multiple logins to the webpage. 

## Software User Interface Manaual 

Instructions 


## Software Details 

How to find things through the software and possibly change them.
