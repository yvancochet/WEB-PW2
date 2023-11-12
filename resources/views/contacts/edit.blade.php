<!-- resources/views/contacts/index.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contacts</title>
    </head>
    <body>
        <h1>Contact Edit</h1>

        @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
        @endif
        
        <form action="{{ route('contacts.update', $contact) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name', $contact->name) }}" required>
            <br/>
            <label for="surname">Surname:</label>
            <input type="text" name="surname" value="{{ old('surname', $contact->surname) }}" required>
            <br/>
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone_number" value="{{ old('phone', $contact->phone_number) }}">
            <br/>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email', $contact->email) }}">
            <br/>
            <label for="address">Address:</label>
            <textarea name="address">{{ old('address', $contact->address) }}</textarea>
            <br/>
            <label for="birthday">Birthday:</label>
            <input type="date" name="birthday_date" value="{{ old('birthday', $contact->birthday_date) }}">
            <br/>
            <label for="note">Note:</label>
            <textarea name="note">{{ old('note', $contact->note) }}</textarea>
            <br/>
            <label for="image">Image:</label>
            @if ($contact->picture)
                <img width="100" height="100" src="data:image/png;base64,{{ $contact->picture }}" alt="Contact Picture" style="max-width: 200px; margin-top: 10px;">
            @endif
            <input type="file" accept=".png, .jpeg, .jpg" name="picture">

            <br/>
            <button type="submit">Update Contact</button>
        </form>
    </body>
</html>