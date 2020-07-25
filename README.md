
## About 

This project uses FFMPEG to take a video uploaded by the user, and overlay a logo on top of it
The UI/UX might not be extremely pretty but this is just a proof of concept to show the power of using FFMPEG with PHP/Laravel by testing one of the many many things that it can do.

[Try it out here](http://15.236.221.73/videos).

Just open the site, upload any video, and then voila! the logo is added to it automatically. (Although it might be pending for a few moments if the file is too big);

## Requirements:

You'll need a fully configured and working web server for this:
It is recommended to edit your `php.ini` file and change the following values accordingly:

```
post_max_size = 750M
upload_max_filesize = 750M
max_execution_time = 5000
max_input_time = 5000
memory_limit = 1000M
```

Or you could use even larger values, it's up to you.

You'll also need to have ffmpeg installed on your machine, if you don't have it already, just run:
```bash
$ apt install ffmpeg
```


## Installation:


```bash
$ git clone https://github.com/FareedAlBandar/video-logo.git
$ cd video-logo
$ composer install
$ cp -R public/logo storage/app/public/
$ cp .env.example .env
$ php artisan key:generate
$ php artisan storage:link
$ nano .env
```

And in the `.env` file, edit the database section to use your own details and credentials.

And then:

```bash
$ php artisan migrate
```

## Next steps:

I'm working on making the logo dynamic by giving the user the ability to use their own logo.
