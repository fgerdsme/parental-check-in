# I am ok - parental check in
This small php project provides a simple service for regular parental check-ins.

The check-in is quite simple: You just have to request the website and click on a green button. That's it.

If there is no check-in before the configured time, an email will be sent to a specified recipient. This mail can itself trigger further alerts, e.g. by using SMS gateways or other services.

## Prerequisites
You require host with access to a mysql database, which serves php files. It must be possible to send emails using php.

You will require a cron service that makes reqular HTTP calls, e.g. https://www.easycron.com and optionally a service that processes the email using gateways.
## Setup

### Step 1 - Create database, table and functions
For a database user `user_iamok` you can simply rename and import the file `config/setup.sql.example`. This will create the database `db_iamok`, the required table and a convenience function. 

### Step 2 - PHP setup
Copy the files to the host and rename the file `config.inc.php.example` to `config.inc.php`. Configure the values according to your needs and setup.

### Step 3 - Configure external cron service
The number of times you can check in is flexible: For example, if you need to check in twice a day, simply create a cron job that requests the url https://hostname/iamok/trigger.php twice.

I would recommend configuring a second cron task on a weekly or monthly basis with the force option (add the `force=true` parameter to the request). This will ensure that the db and email setup still works.

Don't forget to set the `CONFIG_CHECK_IN_HOURS` config variable to a reasonable value. The default is 8, which means you can check-in up to 8 hours before the cron fires the request.

### Step 4 - Create a SMS gateway (optional)
There are several free service you can use for that purpose. If you create an email address on https://directbox.com you can create SMS forwardings for up to 10 SMS/month which should be sufficient in most cases. 