<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// R: schrijf class names altijd beginnend met hoofdletter voor consistentie
class grocery extends Model
{
    use HasFactory;

    protected $fillable = ["naam", "prijs", "aantal"];

    // R: creatieve oplossing, echter werkt dit niet goed, omdat het naam veld in de groceries niet uniek is. Stel je voert meer dan 1 keer een boodschap
    // met gelijke naam in en je wijzigt deze, dan gaat het mis
    public function getRouteKeyname() {
        return "naam";
    }
}
