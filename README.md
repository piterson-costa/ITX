Prerequisites
-----
The instructions assume that you have already installed [Docker](https://docs.docker.com/installation/) and [Composer](https://getcomposer.org/doc/00-intro.md)

## Requirements
    docker 
    composer

## Installation
Steps to build a Docker image:

1. Clone this repo
```bash
$ git clone https://github.com/piterson-costa/ITX.git
$ cd ITX
```
2. Create environment file from example:
```bash
$ cp .env.example .env
```
3. install depencies

```bash
# Install composer Depencies 
$ composer install

# Install node Depencies (bootsrap & vue)
$ npm install
```


4. Build the image
```bash
$ docker-compose up -d --build
```

5. run migrate database
```bash
$ docker exec -it app php artisan migrate
```

5. access
   http://127.0.0.1:8000/


<!-- CONTACT -->
## Contact

Piterson Costa - [@github](https://github.com/piterson-costa) - piterson_costa@hotmail.com
