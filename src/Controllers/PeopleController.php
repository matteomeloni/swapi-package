<?php

namespace Matteomeloni\Swapi\Controllers;

use App\Http\Controllers\Controller;
use Matteomeloni\Swapi\Models\People;

class PeopleController extends Controller
{
    public function index()
    {
        $data = People::textSearch()
            ->sort()
            ->simplePaginate();

        return response($data);
    }

    public function show(People $people)
    {
        $people->load('planet');

        return response()->json($people);
    }
}
