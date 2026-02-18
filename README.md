# yii3_core
Yii3 Core

- Commands
```bash
make composer update
make up
make build && make down && make up

make composer require yiisoft/db-mysql

make composer require yiisoft/db-migration

make composer require yiisoft/user
# Migrate
make yii migrate:create page
make yii migrate:up
# Seeder
make yii seeder
make yii seeder:admin-users
make yii seeder:admin-roles
```

## Docker steps

```bash
sudo chown -R $(id -u):$(id -g) web
cd web
make composer update
make up
make yii migrate:up
make yii seeder
```