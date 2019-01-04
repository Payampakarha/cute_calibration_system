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

The software interface includes a webpage that is accessible via any browser. It is meant to be used for monitoring, and controlling the source position through the system. The source will be most often located at the so called "rest" position inside a Pb shielding in the calibration frame, installed on the top of the drywell. It can be moved to a previously optimized "deployment" position, at the detector tower height. It can however be manually moved to any other height from the top to the bottom of the cryostat if needed. 

The software is provided for 3 use-cases, listed below: 

* **Viewer** use-case : Any user who opens the webpage in a browser can observe the calibration status. In particular, the position, and the speed of the source (if being moved) are printed both in numbers and on a slider bar. Moreover, an indicator is provided, which is allocated to a signal from a conductor piece, located at the source's "rest" position which is connected as soon as the source capsule touches the conductor piece. This indicator is blue when the source is at "rest" and turns red otherwise.  

* **Shifter** use-case : The "shifter" in this context is referred to any user that is assigned the task of operating the calibration system. The shifter is NOT required to have any detailed knowledge of the system. The access is provided through a login panel with predefined authentications. The "shifter" can however, access ONLY the Automatic calibration panel (left) via clicking on the panel header. The accessible actions are very basic and include two buttons to move the source either to the "deployed" or the "rest" locations. Should any problem occur throughout the operation, an "expert" operator (described below) should be reachable to use Manual calibration panel to fix the issue. 

* **Expert** use-case : The "expert" user is someone who has knowledge of the calibration system hardware, and basic knowledge of how the control software is developed. The access is given by the same login system with different authentications. The "expert" operator has access to all features of the software interface, including both the Automatic and the Manual panels. The additional operating modes used in the Manual calibration panel are described below in this manual. 


## Software Details 

How to find things through the software and possibly change them.
