@extends ("app")

@section ("content")
    <h1>Veranderen</h1>

    <form method = "POST" action = "/groceries/{{ $grocery->naam }}">
        @csrf
        @method ("PUT")

        <label>Naam</label>
        <p>Tenminste 2 characters nodig</p>
        <input name = "naam" value = "{{ $grocery->naam }}" pattern=".{2,}" required>
        <br></br>

        <label>Prijs</label>
        <br></br>
        <input name = "prijs" value = "{{ $grocery->prijs }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
        <br></br>

        <label>Aantal</label>
        <br></br>
        <input name = "aantal" type = "number" value = "{{ $grocery->aantal }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
        <br></br>
        
        <button class = "button" type = "submit">Verander</button>
    </form>
@endsection ("content")