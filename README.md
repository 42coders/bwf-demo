# Business Workflow Framework Demo

The **Business Workflow Framework** is a collection of packages that can be used to rapidly build the basics of a business application. The packages are built with [Laravel](https://laravel.com/) framework. This demo application is intended to show the capabilities of the BWF and to provide guidance for the developers how to use the framework.

## Getting started
### Installation
Clone the source code from:
```
https://bitbucket.org/maxhutschenreiter/bwf-demo.git
```

Install the required packages with composer: `composer install`.

Create database, and set up the parameters in the `.env` file, generate application key with the `php artisan key:generate` command. 

Run the migration and seed the database: `php artisan migrate --seed`.

## Development
If you would like to use the demo application in development mode, e.g. to immediately see the changes you made in the packages it is necessary to clone the package beside the demo application and run a composer update to use the symlink-ed version of the package. For the details see the repositories section of the `composer.json` file.

## Contribution
Every contribution is welcome. We should use the usual [GitFlow](https://www.atlassian.com/git/tutorials/comparing-workflows/gitflow-workflow) like workflow: create branches for features and bug fixes, when the development has been finished create a pull request to the `develop` and it will be reviewed by other developer, and merged/commented/declined accordingly.
 
