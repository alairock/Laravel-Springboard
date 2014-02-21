# Laravel Springboard

This is a basic setup of Laravel to give you something to quickly start from. There are several things setup here.

### Routing Classes
Routes are organized in the `app/routes` folder. This way you can organize the routes any way you wish. I am currently organizing routes based on controllers.

### Helper Methods
`pr($objectOrArray)` has been ported over from CakePHP. This is super convenient since it prints out the object or array legibly, wrapping it in `<pre>` tags. 

### Environment file.
This is how I decided to set it up environment checking. You can tell Laravel which environment you are running based on an environment.php file in the bootstrap directory. This should not be maintained in your repo. The file just needs the following. Return environment name. eg. 'local', 'staging', 'production', etc.

	<?php
	return 'local';
	
### Views
Views are organized in directories, such that everything isn't lumped into the view folder.

### macros

There is currently one macro, which allows you to create a simple navigation that dynamically detects the route, and adds a `.active` class to the link that matches the page.

### AUTH
I made the decision to go with a pessimistic auth setup. I am using Zizaco\entrust as a base, and I organized it to filter everything through a blacklist class. By default it denies everything. There is a whitelist in `/config/whitelist.php` This is where you list all routes you want public. A role entitled 'Super Admin' is created and can access everything. You can also create roles and assign multiple roles per user. Roles include permissions that are based on the route AND the request type (POST, PUT, GET, PATCH and DELETE). All of which are managed in the admin dashboard.

Also in the admin dashboard, you can login to any user account, and return to admin without logging in/out. You will also assume any permissions that the current logged in user has, while still being able to return to admin.

### Composer

Composer has a security issue where package requirement conflicts can result in 3rd party packages to be unexpectedly downloaded. Because of this I version the Vendor directory so I can maintain visibility on what packages actually get added.
