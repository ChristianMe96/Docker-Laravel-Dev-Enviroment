## Develop Script for the Docker Containers

```
Command line interface for the Docker-based web development environment demo.

Usage:
    demo <command> [options] [arguments]

Available commands:
    artisan ................................... Run an Artisan command
    build [image] ............................. Build all of the images or the specified one
    composer .................................. Run a Composer command
    destroy ................................... Remove the entire Docker environment
    down [-v] ................................. Stop and destroy all containers
                                                Options:
                                                    -v .................... Destroy the volumes as well
    logs [container] .......................... Display and tail the logs of all containers or the specified one's
    restart ................................... Restart the containers
    start ..................................... Start the containers
    stop ...................................... Stop the containers
    update .................................... Update the Docker environment
```

## Pre installed

- [Laravel Horizon](https://laravel.com/docs/8.x/horizon)
- [Laravel Telescope](https://laravel.com/docs/8.x/telescope)
- [barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)
