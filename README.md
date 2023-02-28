## ERP Project

### Introduction
This project is started to be an ERP system for a company.  
This is just the backend part of the project. It's based on RESTful API.


### How to Run
It runs by docker, so there is a file called `docker-compose.yml` in the root directory. You can run the project by running the following command:

```docker-compose up -d```

### How to Use
Access the `http://localhost:8080` in your browser after the installation.
##### Access Credentials
```
Email: defaulterp@erp.com
Password: 12345
```
#### Generate the TypeScript 
```php artisan typescript:transform```

#### Generate the Swagger
```php artisan l5-swagger:generate```
