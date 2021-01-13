<?php

namespace App\Http\Controllers;

use DB;
use App\Models\grocery;
use Illuminate\Http\Request;

// R: schrijf class names altijd beginnend met hoofdletter voor consistentie
class groceriesController extends Controller
{
    public function index()
    {
        $groceries = DB::table("groceries")->get();
        return view("groceries/index", ["groceries" => $groceries]);
    }

    public function create()
    {
        return view("groceries/create");
    }

    public function store(Request $request)
    {
        // R: nette oplossing, goed dat je aan herbruikbaarheid van code denkt. Een alternatief is een Form Request Validator:
        // https://laravel.com/docs/8.x/validation#form-request-validation
        // voordeel is dat je deze validator class dan in meerdere controllers kunt gebruiken (breder inzetbaar)
        Grocery::create($this->validateGrocery());

        return redirect("/");
    }

    public function edit(Grocery $grocery)
    {
        return view("groceries/edit", ["grocery" => $grocery]);
    }

    public function update(Grocery $grocery, Request $request)
    {
        $grocery->update($this->validateGrocery());

        return redirect("/");
    }

    public function destroy(Grocery $grocery)
    {
        $grocery->delete();

        return redirect("/");
    }

    protected function validateGrocery() {
        return request()->validate([
            "naam" => ["required", "min:2"],
            "prijs" => ["required", "numeric", "gt:0"],
            "aantal" => ["required", "integer" , "min:1"]
        ]);
    }
}
