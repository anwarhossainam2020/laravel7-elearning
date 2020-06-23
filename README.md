# Laravel-7 - eLearning web app
This is a simple Laravel web application for eLearning solution includes following features.

- Multiple courses
- Each course has multiple lessons
- Each lesson has 10 questions
- Questions are MCQ format
- Result after finishing MCQ
- Admin Functionality includes
-- manage course, 
-- Manage Lesson, 
-- Manage Questions
- Visual interface look inside ```screenshots` folder located in project root

## Installation

Server Requirements

- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

Extract attached zip file into your web server directory

Installation from Git, Clone the repository -
```
git clone https://github.com/anwarhossainam2020/laravel7-elearning.git
```

Then cd into the folder with this command-
```
cd laravel7-elearning
```

Then run command composer install
```
composer install
```

Then create a environment file using this command-
```
cp .env.example .env
```

Then edit `.env` file with appropriate credential for your database server. Just edit these two parameter(`DB_USERNAME`, `DB_PASSWORD`).

Then create a database named `laravel7_elarning` and then do a database migration using this command-
```
php artisan migrate
```

Then change permission of storage folder using thins command-
```
(sudo) chmod 777 -R storage
```

At last generate application key, which will be used for password hashing, session and cookie encryption etc.
```
php artisan key:generate
```


## Run server

Run server using this command-
```
php artisan serve
```

Then go to `http://localhost:8000` from your browser and see the app.
