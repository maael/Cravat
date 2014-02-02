Cravat
======
A work in progress PHP MVC framework, using doctrine as an ORM and raintpl for templating.

Database Configuration
----------------------

General Settings
----------------
```
'timezone' => 'Eurpoe/London',
'devMode' => 'true'
```

Routing
-------
Edit the routes.php file in app/config to set routes. Routes are in the format 'path after main folder' => 'controller'.

Adding styles and scripts
-------------------------
###Styles
```php
$this->add('css','file with no extension');
```
###Scripts
```php
$this->add('js','file with no extension');
```

Formating and Validation
------------------------
###Formating
```php
\Cravat\Format::make()
```
to initialize a formating object. Then chain any functions onto it, such as tag etc, and finish with 
```php
->format('string')
```
to get the result.
###Validation
```php
\Cravat\Validation::make()
```
to initialize a validation object. Then chain any functions onto it, such as less_than etc, and finish with
```php
->validate('string')
```
to get the result.
