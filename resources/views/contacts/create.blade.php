<!-- resources/views/contacts/index.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contacts</title>
    </head>
    <body>
        <h1>Contact Create</h1>

        @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
        @endif
        
        <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <label for="name">Name:</label>
            <input type="text" name="name" placeholder="name" required>
            <br/>
            <label for="surname">Surname:</label>
            <input type="text" name="surname" placeholder="surname" required>
            <br/>
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone_number" placeholder="phone number">
            <br/>
            <label for="email">Email:</label>
            <input type="email" name="email" placeholder="email">
            <br/>
            <label for="address">Address:</label>
            <textarea name="address" placeholder="address"></textarea>
            <br/>
            <label for="birthday">Birthday:</label>
            <input type="date" name="birthday_date">
            <br/>
            <label for="note">Note:</label>
            <textarea name="note" placeholder="note"></textarea>
            <br/>
            <label for="image">Image:</label>
            <input type="file" accept=".png, .jpeg, .jpg" name="picture">
    
            <br/>
            <button type="submit">Create Contact</button>
        </form>
    </body>
</html>