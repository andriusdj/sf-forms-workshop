# sf-forms-workshop
Symfony 3.3 forms workshop

Requirements:
- Get the vendors: `composer install`
- Sort out Symfony permissions: 
    - `rm -rf var/cache/*`
    - `rm -rf var/logs/*`
    - `HTTPDUSER=$(ps axo user,comm | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1)`
    - `sudo chmod +a "$HTTPDUSER allow delete,write,append,file_inherit,directory_inherit" var`
    - `sudo chmod +a "$(whoami) allow delete,write,append,file_inherit,directory_inherit" var`
- Initialise the database: `bin/console doctrine:schema:update --force`
- setup your webserver

Task:
1) Create a Person and Email forms in the first page of the project
2) Create a Form transformer for date of birth (Date object <-> integer timestamp)
3) Use validators for all fields