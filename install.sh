composer install &&

php bin/console doctrine:database:create &&

php bin/console doctrine:schema:update -f
