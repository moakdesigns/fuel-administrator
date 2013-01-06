# Fuel Administrator

Version 1.0 - FuelPHP 1.4

## What is Fuel Administrator?

Fuel Administrator is a fuelphp based alternative to the Codeigniter based script Backendpro.

Currently it includes only the following features:

* User Management with Roles and Permissions
* Database Driven Menu Management 
* Messages (Alert Notifications)
* Breadcrumb
* Twitter Bootstrap
* Admin Interface
* Ready to use


## Todos

* Dynamic User Profile fields management
* simple Module management 
* Multilingual support
* Documentation
* Simple installer
* Online Demo


## Installation

At first you have to run the fuelphp installation. (you don't have to download fuelphp again, it's always included ;) )

Documentation: http://fuelphp.com/docs/installation/instructions.html#manual

Then you have to import the fuel-administrator.sql into your mySQL database

Now update the file /fuel/app/config/development/db.php and update the database information

## Usage

After installation you can open the fuel administrator in your browser

via http://localhost/fuel-administrator/public/


### Default Login:

Username: admin

Password: password



## Credits

* Dre1080 - Warden - https://github.com/dre1080/warden
* Phil F - DbMenu - https://github.com/Phil-F/Fuel-DbMenu
* dbpolito - Breadcrumb - https://github.com/dbpolito/Fuel-Breadcrumb
* dbpolito - Message - https://github.com/dbpolito/Fuel-Message
* FuelPHP Team - Framework - https://github.com/fuel