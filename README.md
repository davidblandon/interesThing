# interesThing
InteresThing streamlines the process of buying, selling and auctioning pre-owned items online. Our platform offers a professional, user-friendly interface, making it easy to discover and purchase quality second-hand goods.


When you try to run it, dont you remember to create the database 'interesthing' en phpmyadmin

Then, you should create an .env, like the env.example. You can delete the 'example' part and:


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=interesthing
DB_USERNAME=root
DB_PASSWORD=

you copy that code in the database section. If your database username name id not 'root', change this for your username

After that, you may run:

    composer install

That will install all the project dependences.

Then run:
    php artisan migrate

and enjoy!