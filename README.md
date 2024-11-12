# Zimou Technical test

1. Create login/register UI
1. Create 5000 Stores for each store add 100 packages using seed or factories
1. Create item in the menu to show packages with the following columns: tracking_code, store name, package name, status, client full name, phone, wilaya, commune, delivery type, status name
1. Add a button to export all the packages in csv or excel file with the same columns above
1. (optional) If you add create package will be an extra point 😉

Notes:

-   Dont need to send a PR, just fork the repo and work on your repo
-   Please keep the commits and the DB structure as it is
-   You are free to use any third party package or any UI dashboard

Good luck 😃

# Command to run the app

-   composer install ( To install needed packages )
-   change your env file depend on your database and generate your key with php artisan key:generate
-   php artisan app:setup ( to make migration into database, Fill dummy data which include 5000 stores and 100 packages for each )
-   php artisan app:start (for start the two servers in one terminal, equal to npm start dev and php artisan serve )
