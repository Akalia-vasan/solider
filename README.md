git clone https://github.com/Akalia-vasan/solider.git

2. Create a copy of your .env file
3. Generate an app encryption key

       php artisan key:generate
       
4. Create an empty database for our application
5. In the .env file, add database information to allow Laravel to 
    connect to the database  
6. Migrate the database
7. Seed the database

          php artisan db:seed
                   
8. Admin Login URL :http://localhost/solid/public/admin/login
     Username: admin@gmail.com
     password : 12345678
