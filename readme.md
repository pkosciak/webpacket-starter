# webpacket-starter WordPress Theme
## Requirements
```
php 8.1 or above
node 18.14.2 or above
ACF Pro plugin
```
## Install guide
### Backend
#### Installing dependencies:
```bash
composer install
```

### Frontend
#### Installing dependencies:
📂webpack
```bash
npm install
```

#### Running scripts:
📂webpack

Single run:
```bash
npm run dev
```
Constant watch:
```bash
npm run watch
```
Minified, ready for production:
```bash
npm run prod
```

### Tests:
#### Installing tests:
```bash
bash bin/install-wp-tests.sh DATABASE_NAME root root DATABASE_DOCKER_CONTAINER_NAME latest
```
#### Running tests:
```bash
php vendor/bin/phpunit
```

### Modules
[ACF Menu Depth Extension](https://github.com/pkosciak/webpacket-acf-menu-depth-extension)
