# Swapi

This is where your description should go. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require matteomeloni/swapi
```

put your db settings into .env

`php artisan migrate`


## Retrieve data from https://swapi.dev/

To get people and planets data from https://swapi.dev, run this artisan command

`php artisan swapi:retrieve-data`



## API

### Get All People


#### Request

`GET /api/people`

#### Response

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 1,
            "planet_id": 1,
            "name": "Sly Moore",
            "birth_year": "unknown",
            "eye_color": "white",
            "gender": "female",
            "hair_color": "none",
            "height": "178",
            "mass": "48",
            "skin_color": "pale",
            "created_at": "2021-08-21T16:17:11.000000Z",
            "updated_at": "2021-08-21T16:17:11.000000Z"
        },
        {
            "id": 2,
            "planet_id": 2,
            "name": "Tion Medon",
            "birth_year": "unknown",
            "eye_color": "black",
            "gender": "male",
            "hair_color": "none",
            "height": "206",
            "mass": "80",
            "skin_color": "grey",
            "created_at": "2021-08-21T16:17:11.000000Z",
            "updated_at": "2021-08-21T16:17:11.000000Z"
        },
        ...
    ],
    "first_page_url": "http://swapi.test/api/people?page=1",
    "from": 1,
    "next_page_url": "http://swapi.test/api/people?page=2",
    "path": "http://swapi.test/api/people",
    "per_page": 15,
    "prev_page_url": null,
    "to": 15
}
````


#### To filter the results use

`GET /api/people?filter={string_to_search}`


#### To sort the results use

`GET /api/people?sort=column,[asc|desc]`


### Get People Details


#### Request

`GET /api/people/{people_id}`

#### Response

```json
{
    "id": 1,
    "planet_id": 1,
    "name": "Sly Moore",
    "birth_year": "unknown",
    "eye_color": "white",
    "gender": "female",
    "hair_color": "none",
    "height": "178",
    "mass": "48",
    "skin_color": "pale",
    "created_at": "2021-08-21T16:17:11.000000Z",
    "updated_at": "2021-08-21T16:17:11.000000Z",
    "planet": {
        "id": 1,
        "name": "Umbara",
        "diameter": "unknown",
        "rotation_period": "unknown",
        "gravity": "unknown",
        "population": "unknown",
        "climate": "unknown",
        "terrain": "unknown",
        "surface_water": "unknown",
        "films": [],
        "url": "https://swapi.dev/api/planets/60/",
        "created_at": "2021-08-21T16:17:11.000000Z",
        "updated_at": "2021-08-21T16:17:11.000000Z"
    }
}
````
