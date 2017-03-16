#Teste Jean

* Banco de dados [Sql](https://github.com/jeancarlosleal/teste/blob/master/docs/installation/teste.sql)

## Vhosts

    <VirtualHost *:80>
        ServerName teste.jean
        DocumentRoot E:\xampp\htdocs\teste\public
        <Directory E:\xampp\htdocs\teste\public>
            Options Indexes FollowSymLinks Includes execCGI
            AllowOverride All
            Order Allow,Deny
            Allow From All
        </Directory>
    </VirtualHost>

