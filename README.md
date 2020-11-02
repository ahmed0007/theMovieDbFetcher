
# theMovieDBFeedable

This is the repository for movieDB app based on [https://www.themoviedb.org], The code is entirely open source and licensed under [the MIT license](LICENSE.md). We welcome your contributions but we encourage you to read the [the contributing guide](CONTRIBUTING.md) before creating an issue or sending in a pull request. Read the installation guide below to get started with setting up the app on your machine.

## Sponsors

We'd like to thank these **amazing companies** for sponsoring us. If you are interested in becoming a sponsor, please visit <a href="https://github.com/ahmed0007/theMovieDbFetcher">the theMovieDbFetcher Github Sponsors page</a>.

- **[trufla](https://www.trufla.com/)**
- [Parmej](https://parmej.com)

## Requirements

The following tools are required in order to start the installation as this project based on laravel 5.8.

- [Composer](https://getcomposer.org/download/)
- PHP >= 7.1. 3

## Installation

> Note that you're free to adjust the `~/Sites/theMovieDbFetcher` location to any directory you want on your machine. In doing so, 

1. Clone this repository with `git clone git@github.com:ahmed0007/theMovieDbFetcher.git ~/Sites/theMovieDbFetcher`
2. Run `composer install` to install the PHP dependencies
3. Setup a local database called `movieDB` you're free to adjust another name
4. Run `composer setup` to setup the application
5. Set your `.env`file with your environment variables

In `.env` file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=movieDB
DB_USERNAME=yourMysqlEngineUserName*****
DB_PASSWORD=YourMysqlEnginePassword*******

THEMOVIEDB_API_KEY=****
THEMOVIEDB_GENRE_ENDPOINT=
THEMOVIEDB_TOP_RATED_MOVIE_ENDPOINT=

```


6. Run `php artisan migrate`
7. Run `php artisan queue:table`
8. Run `php artisan queue:failed-table`
8. Run `php artisan serve`

You can now visit the app in your browser by visiting [http://localhost:8000].


### Queue Connections

|--------------------------------------------------------------------------
| you may configure the connection information for each server that
| is used by your application. A default configuration has been added
| for each back-end shipped with Laravel. You are free to add more.
|
| Drivers: "sync", "database", "beanstalkd", "sqs", "redis", "null"

In `.env` file for example if you want to use database
```
QUEUE_CONNECTION=database

```

### Runing queue:work to handle seeding task through schedule:run 

> Note that you're free to run them manually just for test of using docker In doing so, 

1. Run `php artisan queue:work --tries=5  --timeout=90` in a seperate terminal tab or use <a href="https://medium.com/@rohit_shirke/configuring-supervisor-for-laravel-queues-81e555e550c6">SUPERVISOR for Laravel queues!</a>.
7. Run `php artisan  schedule:run` in another sperate terminal tab triggered manually by runing it everytime you want to register job to seed new records or you can use or any cron tool manager just search the topic .
```
function scheduler () {
    while :; do
        php artisan schedule:run
    	echo "Sleeping 60 seconds..."
        sleep 60
    done
}

OR

//Cron manger example
* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1

``` 
8. Run `php artisan queue:failed-table`
8. Run `php artisan serve`

> Using docker In doing so, 

1. Run `docker-compose up --build`

## Maintainers

The theMovieDbFetcher  is currently maintained by [Ahmed Attia](https://github.com/ahmed0007). If you have any questions please don't hesitate to create an issue on this repo.

## Security Vulnerabilities

If you discover a security vulnerability within theMovieDbFetcher, please send an email immediately to [ahmedatiaeyg@gmail.com **Do not create an issue for the vulnerability.**

## License

The MIT License. Please see [the license file](LICENSE.md) for more information.
