[![Build Status](https://travis-ci.com/poing/laravel-wombatdialer-api.svg?branch=0.0.5)](https://travis-ci.com/poing/laravel-wombatdialer-api)
[![Coverage Status](https://coveralls.io/repos/github/poing/laravel-wombatdialer-api/badge.svg?branch=0.0.5)](https://coveralls.io/github/poing/laravel-wombatdialer-api?branch=0.0.5)
[![StyleCI](https://github.styleci.io/repos/301573810/shield?branch=0.0.1)](https://github.styleci.io/repos/301573810?branch=0.0.1)

# laravel-wombatdialer-api
WombatDialer API Library for Laravel

# Getting Started

### 1.Install WombatDialer
***
Run this at the command line:
```
composer require poing/laravel-wombatdialer-api
```
This will update composer.json and install the package into the vendor/ directory.
### 2. Install Config file
***
To over-ride the default settings, initialize the config file by running this command:
```
php artisan wombatdialer:config
```
Then open config/wombatdailer.php and edit the settings .
### 3. How to Use
***
With Values from the configuration file, and after authenication . We can perform restful operations on the API.

#### Simple Usage
If we need to create an Asterisk API .

```
$someData =  new \WombatDialer\Controllers\Edit\Asterisk;
$data = []// data's like 'description' ,'serverType'
$someData->create($data);
```
To show an existing Asterisk API,

```
$someData =  new \WombatDialer\Controllers\Edit\Asterisk;
$someData->show(1);
```
### 4. Design Pattern

The design pattern replicates the **WombatDialer**.

```
api
├── addkey
├── callinfo
├── calls
├── campaigns
├── dialer
├── edit
│   ├── asterisk
│   ├── campaign
│   │   ├── disposition
│   │   ├── ep
│   │   ├── list
│   │   ├── oh
│   │   ├── reschedule
│   │   └── trunk
│   ├── ep
│   ├── list
│   │   ├── logs
│   │   └── record
│   ├── oh
│   └── trunk
├── inspect_dialer
├── lists
├── live
│   ├── calls
│   └── runs
├── recallinfo
├── reports
│   ├── logs
│   ├── runs
│   └── stats
├── reserve
├── runlists
├── runs
└── sysup
    └── jmx
```
#### Note:
From the Structure under the `Edit` , there were 6 APIs.

```
Asterisk
Campaign
Ep
List \\ List is used as Lists
Oh
Trunk
```
And under the `Edit\Campaign\`:

```
Ep
List  \\List is used as Lists 
Oh
Trunk
Reschedule
Disposition
```

The `List` API has been replaced as `Lists` in the package. Since `List` can neither used as a namespace or a className. But the `URL` remains the same as 

`'/edit/list/'`

### 5 .Link for Reference

[wombat-manual](https://manuals.loway.ch/WD_UserManual-chunked/)


