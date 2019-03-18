# PHP_RestAPI
PHP rest API to read data from a table , insert new data, update, delete, and search data in the table.

Technologies used:
1) PHP
2) MySQL

Step 1: Setup a MySQL Database using PhpMyAdmin. Create a new DB "product_api". After setting p the database,
Set up a "product" table with feilds ID, Name, Price in product_api database. 
Run the queries from "product_api.sql" file to Create "product" table and Insert data in the table.

Step 2: Modify the database connections in config/Database.php to your database connections.

NOTE: If you are testing the API locally you will need Postman.
NOTE: If you are not using a local server rename localhost with your URL.


1) To GET all the data from the table : http://localhost/product_api/API/read.php
2) To Insert data into product table : http://localhost/product_api/API/create.php
3) To Update data in the product table: http://localhost/product_api/API/update.php
4) To Delete a record from the table : http://localhost/product_api/API/delete.php
5) To Search the product with Name= Book7: http://localhost/product_api/API/search.php?s=Book7




