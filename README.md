# MSCI342Project
MSCI 342 Project

### How to Set up Environment
1. Download git onto your computer.
2. Open terminal and go to the path you want the repository to be stored. Use the following command:
> cd '<PATH_YOU_WANT_REPO>'
3. Clone the repository. Navigate to the repository and click the Green Code button. Copy the HTTPS link and run the following command:
> 'git clone <HTTPS_LINK>'

### How to run code Locally

Make sure php is installed onto your computer. 

Add the path to the php file into the Path environmental variable.

For example my php is located at: C:\xampp\php


1. Open up a terminal and type in the command
> cd <PATH_TO_REPOSITORY>      
> cd src
2. Put in the following command into the terminal to start running the php file
> php -S localhost:8000
3. Navigate to http://localhost:8000 on your browser.

### How to Connect Database Locally

1. Replace the $dbhost variable so it looks like the following
`$dbhost = '$serverName';`
