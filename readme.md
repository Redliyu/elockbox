# eLockbox

A data management system based on PHP, Laravel5 framework, and MySQL. Developed by USC CSCI577 2016Fall Team10.

## Install on Local Machine

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

These are the prerequisites for installing on local machine, if your machine do not satisfy these prerequisites or you want to install this project on server, please follow the "Install on Server", there will be a detailed instructions including environment settings and project deploying.

#### Environment
* PHP ≥ 5.6.4
* Apache Server
* MySQL

#### Command Line Tools
* composer
* git

### Installing

###### 1. Clone the repository to the local.
`$ git clone https://github.com/Phantomato/elockboxDEV.git`

###### 2. cd into the directory, then install.
`$ composer install`

###### 3. Change file '.env.example' to '.env', and create database according to the file '.env'.

###### 4. Generate a new key.
`$ php artisan key:generate`

###### 5. Migrate the database.
``$ php artisan migrate`

###### 6. Seed the initial data into the database.
`$ php artisan db:seed`

###### 7. Try to run this project in browser. Use `/public/debug/create` to create the first user. Have fun :)

### Notice
If your localhost cannot handle the requests, please try to do `$ chmod -R 777 Your/local/repository/path`.

## Install on Server

These instructions will get you a copy of the project up and running on the server. The instructions based on ubuntu os.

### Installing LAMP on Ubuntu 16.04 LTS

#### 1. Installing and configuring Apache Server

Update `apt-get` and install `apache2`.

```bash
$ sudo apt-get update
$ sudo apt-get install apache2
```
Edit `apache2.conf`
```bash
$ sudo nano /etc/apache2/apache2.conf
```
Add ServerName at the bottom of the file.

> . . .

> ServerName server_domain_or_IP

Restart the Apache to implement the changes.
```bash
$ sudo systemctl restart apache2
```
Now you can test by your browser by visit `http://your_server_IP_address`.

#### Installing and configuring MySQL

Install MySQL.
```bash
$ sudo apt-get install mysql-server
```
During the installation, you will be asked to set the password for MySQL root user.
Keep this password secure and do not forget.
```bash
$ sudo mysql_secure_installation
```
You will be asked to config security level of MySQL.

#### Installing and configuring PHP

Install PHP and some tools.
```bash
$ sudo apt-get install php libapache2-mod-php php-mcrypt php-mysql
```
Then edit the priority of index.*.
```bash
$ sudo nano /etc/apache2/mods-enabled/dir.conf
```
It will look like this:
```
<IfModule mod_dir.c>
    DirectoryIndex index.html index.cgi index.pl index.php index.xhmtl index.htm
</IfModule>
```
Move index.php to the first, like this:
```
<IfModule mod_dir.c>
    DirectoryIndex index.php index.html index.cgi index.pl index.xhmtl index.htm
</IfModule>
```
Then you can use `$ sudo apt-get install` install some PHP modules.
Suggest to install `php-cli`, `php-curl`, `php-gd`, `php-pear`, `php-imagick`, `php-memcache`, `php-json`, `php-xmlrpc` and `php-mbstring`.

After these steps, you can test your php by `$ sudo nano /var/www/html/info.php` and write `<?php phpinfo(); ?>` in it.

#### Installing composer, git and some basic command line tools.

Install curl and composer.
```bash
$ sudo apt install curl
$ sudo curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
$ sudo chmod +x /usr/local/bin/composer
```
Clone the project.
```bash
$ sudo apt install git
$ sudo git clone https://github.com/Phantomato/elockboxDEV.git
$ cd ./elockboxDEV
```
Set up the .env and create database, then install the project.
```bash
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
```

Now you finish the installation. Visit `/elockboxDEV/public` to see the project and use `/elockboxDEV/public/debug/create` to create the first user.


## Authors

This project is developed by USC CSCI577 2016fall team10. For more team information, please check [Team Website](http://greenbay.usc.edu/csci577/fall2016/projects/team10/). For more class information, please check [Class Website](http://greenbay.usc.edu/csci577/spring2017/).
