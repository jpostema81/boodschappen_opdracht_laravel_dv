@extends ("app")

@section ("css")
<link href="css/table.css" rel="stylesheet" />
<link href="css/links.css" rel="stylesheet" />
@endsection ("css")

@section ("content")
    <h1>Index</h1>
    <table>
        <tr>
            <th>Naam</th>
            <th>Prijs</th>
            <th>Aantal</th>
            <th>Totaal<th>
        </tr>
        <?php
            $sum = 0;
                foreach ($groceries as $grocery) {
                $totaal = $grocery->prijs * $grocery->aantal;
                // R: de ucwords kun je ook naar je Eloquent Model verplaatsen door gebruik te maken van een accessor. Zo houd je de logica meer aan de php (model)
                // kant, en de opmaak meer aan de Blade kant. Voor meer info zie: https://laravel.com/docs/8.x/eloquent-mutators#defining-an-accessor
                $groceryNameCaps = ucwords($grocery->naam);

                // R: ik geef de voorkeur om alle HTML tags rechtstreeks in de Blade template te zetten, dus niet via een echo. Zo wordt het leesbaarder.

            echo "<tr>
                    <td>$groceryNameCaps</td>
                    <td>€" . number_format($grocery->prijs,2,'.','') . "</td>
                    <td>$grocery->aantal</td>
                    <td>€" . number_format($totaal,2,'.','') . "</td>"
        ?>
                    <td><a href="{{ route('groceries.edit', $grocery->naam) }}" class = "link">Veranderen</a></td>
                    <td>
                        <form method = "POST" action = "/groceries/{{ $grocery->naam }}">
                            @csrf
                            @method ("DELETE")
                            <button type = "submit">Verwijderen</button>
                        </form>
                    </td>
        <?php
                "</tr>";
            $sum += $totaal;
        }
            echo "<tr>
                    <td>Totaal</td>
                    <td></td>
                    <td></td>
                    <td>€$sum</td>
                </tr>";
        ?>
    </table>
@endsection ("content")
