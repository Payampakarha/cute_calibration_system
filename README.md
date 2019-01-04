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

# Software [link](http://130.15.24.84/cute_calibration_system.html)

# Access
The software interface includes a webpage that is accessible via any browser. It is meant to be used for monitoring, and controlling the source position through the system. The source will be most often located at the so called "rest" position inside a Pb shielding in the calibration frame, installed on the top of the drywell. It can be moved to a previously optimized "deployment" position, at the detector tower height. It can however be manually moved to any other height from the top to the bottom of the cryostat if needed. 

The software is provided for 3 use-cases, listed below: 

* **Viewer** : Any user who opens the webpage in a browser can observe the calibration status. In particular, the position, and the speed of the source (if being moved) are printed both in numbers and on a slider bar. Moreover, an indicator is provided, which is allocated to a signal from a conductor piece, located at the source's "rest" position which is connected as soon as the source capsule touches the conductor piece. This indicator is blue when the source is at "rest" and turns red otherwise.  

* **Shifter** : The "shifter" in this context is referred to any user that is assigned the task of operating the calibration system. The shifter is NOT required to have any detailed knowledge of the system. The access is provided through a login panel with predefined authentications. The "shifter" can however, access ONLY the Automatic calibration panel (left) via clicking on the panel header. The accessible actions are very basic and include two buttons to move the source either to the "deployed" or the "rest" locations. Should any problem occur throughout the operation, an "expert" operator (described below) should be reachable to use Manual calibration panel to fix the issue. 

* **Expert** : The "expert" user is someone who has knowledge of the calibration system hardware, and basic knowledge of how the control software is developed. The access is given by the same login system with different authentications, after the user clicks on the Manual calibration panel header. The "expert" operator has access to all features of the software interface, including both the Automatic and the Manual panels. The additional operating modes used in the Manual calibration panel are described below in this manual. 

# Operating modes

* **Automatic Calibration Mode**: In this mode, there are only two buttons available. 
	* **Deploy for calibration**: This button will send the source to the calibration location, previously set by an "expert" user using **Set Values** button in the Manual calibration mode. 
		* **NOTE**: The **Deploy for calibration** button is programed such that it will send the source to the calibration position **ONLY** if the source is at "rest" position initially! This is checked by the "rest" sensor in software. Should this not be the case, the button will raise a warning requiring to manually move the source to the rest position first. This is implemented since the **Deploy for calibration** function will move the source with a fixed length (height) and therefore, requires the exact same initial position to be consistent.  
	* **Send to Storage**: This button will send the source back to its "rest" position. This position is evaluated by the software on every reload of the page, and if and only if the source is initially at the rest position. This is important as the position value is arbitrary and is reset by the AVR board on every reboot. Hence, it is essential that the rest position is used as a reference. 

* **Manual Calibration Mode**: In this mode, the source can be moved manually in two different modes, selected by radio buttons. 
	* **Fixed Speed**: In this mode, the user needs to provide a certain **speed** of the source capsule, and a **direction**. The speed can be set through the box under **Set Source Speed** either by typing a value, or using arrows. The units are _cm/s_. After selecting the speed value, the user needs to push the **Submit** button in order to submit the value. The direction can be chosen with the arrow buttons, either to move the source down (towards the bottom of cryostat) or up (towards the drywell). After selecting the speed and direction, the user needs to press **START** button and the source will begin to move. After this, the source will continue moving until the **STOP** button is pressed, or the source reaches the limits in either direction.
	* **Fixed Position and Speed**: In this mode, the user needs to define both and speed value, and a destination position in _centimeters from the height of the drywell downwards_. Similar to the Fixed Speed mode, the values can be typed or, scrolled inside the boxes and submitted by pressing the **Submit** button. The direction is however, chosen automatically according to the relative location of destination compared to the current position of the source. After pressing the **START** button, the source will be moved towards the destination position until it reaches the position **OR** it is stopped manually. 
	* The **Set Values** button: This button is used by the expert users to assign/reassign values for automatic calibration mode. The user needs to either type or scroll values inside the position and the speed boxes and press this button. The new values will be printed in the table inside the automatic calibration mode.
	

	
## Software Details 

How to find things through the software and possibly change them.
