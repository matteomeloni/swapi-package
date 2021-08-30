<?php

namespace Matteomeloni\Swapi;

use Illuminate\Support\Facades\Http;
use Matteomeloni\Swapi\Models\People;
use Matteomeloni\Swapi\Models\Planet;

class Swapi
{
    public static function getPeople()
    {
        $peoples = self::retrievePeopleFromPeopleApi('https://swapi.dev/api/people');

        foreach ($peoples as $people) {
            $planet = self::retrievePlanetFromSwapiApi($people['homeworld']);

            People::firstOrCreate([
                'planet_id' => $planet->id,
                'name' => $people['name'],
                'birth_year' => $people['birth_year'],
                'eye_color' => $people['eye_color'],
                'gender' => $people['gender'],
                'hair_color' => $people['hair_color'],
                'height' => $people['height'],
                'mass' => $people['mass'],
                'skin_color' => $people['skin_color'],
            ]);
        }
    }

    /**
     * @param string $url
     * @return array
     */
    private static function retrievePeopleFromPeopleApi(string $url)
    {
        $api = Http::get($url)->json();
        $peoples = [];

        if(!is_null($api['next'])) {
            $peoples = self::retrievePeopleFromPeopleApi($api['next']);
        }

        return array_merge($peoples, $api['results']);
    }

    public static function retrievePlanetFromSwapiApi($url)
    {
        $planet = Planet::whereUrl($url)->first();

        if(is_null($planet)) {
            $api = Http::get($url)->json();

            $planet = Planet::create($api);
        }

        return $planet;
    }
}
