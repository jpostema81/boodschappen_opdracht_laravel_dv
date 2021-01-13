@extends ("app")

@section ("content")
    <h1>Toevoegen</h1>

    {{-- R: gebruik geen spaties tussen = --}}
    <form method = "POST" action = "/groceries">
        @csrf

        <label>Naam</label>
        <p>Tenminste 2 characters nodig</p>
        <input name = "naam" value = "{{ old('naam') }}" pattern=".{2,}" required>
        <br></br>  {{-- het br-element kent geen sluittag --}}

        <label>Prijs</label>
        <br></br>
        <input name = "prijs" value = "{{ old('prijs') }}" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
        <br></br>

        <label>Aantal</label>
        <br></br>
        <input name = "aantal" type = "number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
        <br></br>

        <button class = "button" value = "{{ old('aantal') }}" type = "submit">Toevoegen</button>
    </form>
@endsection ("content")
