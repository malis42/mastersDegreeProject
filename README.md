# Laravel Web application
- [Important](#Important)
- [Introduction](#Introduction)
- [Quick overview of main functionalities](#Quick-overview-of-main-functionalities)
- [Installation](#Installation)
## Important
This project requires a Raspberry Pi (models 3 or higher) to fully utilize all implemented functionalities. The Raspberry requires an installed OS (preferably Raspbian), as well as stable internet connection.

You can find installation instrucions down below.
## Introduction
This web app was created as a part of my Masters Degree Thesis project, with a purpose of presenting data acquired from Raspberry Pi with accelerometer connected to it.


This app was created with Laravel 5.8, MySQL database, Chart.js and Python 3.7.

You can find Laravel's 5.8 documentation in the link below:
```
https://laravel.com/docs/5.8/
```

The Chart.js module documentation is contained under following link:
```
https://www.chartjs.org/docs/latest/
```

### Quick overview of main functionalities
- Laravel's Authentication module is responsible for handling registration and logging into accounts. 
This includes usage of the Auth Middleware to restrict access to certain pages for unauthorized users.
- Running the Python 3 script was possible with usage of the Symfony Process Component. 
``` 
https://symfony.com/doc/current/components/process.html 
```
- Models were created using Eloquent Model Conventions, creating possibility to take advantage of Eloquent's query builders.
```
https://laravel.com/docs/5.8/eloquent
```
## Installation
In the index.py file you have to input your Raspberry's info which is IP Adress, as well as username and password.
```
HOSTNAME = ''
USERNAME = 'pi'
PASSWORD = 'password'
```
This is required to run another local Python 3 script, saved on Raspberry.

To save data on database you need to have an ADXL345 Accelerometer connected to PI, and use an Adafruit Library to actually acquire the data.
```
https://github.com/adafruit/Adafruit_CircuitPython_ADXL34x
```
