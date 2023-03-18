# Group-25
<img src="https://user-images.githubusercontent.com/116160905/226141518-2bb67b77-b194-45a1-bf62-510ddb8ffa43.png" alt="logo" width="500" height="500">

## Description 
This repository will include source code consisting of the following languages HTML, CSS, Java, JavaScript, Laravel Framework (PHP) and SQL.
All code will be commited to the branches, there are 6 branches in total, all commit history will be viewable on the repository for all repositories including names and description of commits.

## Contributors 
- Kirill Ushakov (UshakovKirill) 

- Faraz Ahmed (fahm781) 

- Awais Riaz (AR127) 

- Nazrin Chowdhury (NazrinChowdhury) 

- Azraa Faizar (azraafaizar) 

- Danial Jivraj Amirali (danialjivraj) 

- Rayyan Khan (rayyan2000)     

- Jamie Yap (Cyberrrrrrr)  

## Pre-Requisites
- Composer: https://getcomposer.org
- XAMPP: https://www.apachefriends.org/download.html
## Installation 
Below is a step by step instruction guide, to assist you on how to download the source code, install and run the dependencies and load the website.
### 1: Install Xampp
- follow the default steps

### 2: Install composer
- install globally and follow the default steps

### 3: If you have not already, clone the team project repo from 
- ```https://github.com/fahm781/Group-25.git```

### 4: Open the project in an IDE of your choice preferably VS code.

### 5: Make sure you are in the GoldenRiver-Laravel directory

- Run the following command: ```composer update```
- <b>Note: it will take some time!</b>
### 6: Run the Apache server and mySQL from XAMPP

- Click the admin button to navigate to phpMyAdmin
- Create a new database called “goldenriver”.
### 7: Make a copy of .env.example file in Group-25/ GoldenRiver-Laravel and call it .env 
Now open the .env file and make sure lines 11-16 looks exactly like the following code  
```DB_CONNECTION=mysql```
<br>
```DB_HOST=127.0.0.1```
<br>
```DB_PORT=3307```
<br>
```DB_DATABASE=goldenriver```
<br>
```DB_USERNAME=root```
<br>
```DB_PASSWORD= ```
- <b>Making sure the DB_DATABASE is set to goldenriver:</b>

### 8: In Command prompt or VS code terminal navigate to \Group-25\GoldenRiver-Laravel directory
- Then to run the website use the following command: ```php artisan serve```
- This command should display the website in your web browser. If a page saying something along the lines of “generate app key” comes up just select that option.
