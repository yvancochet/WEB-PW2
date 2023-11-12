<!-- resources/views/contacts/index.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Contacts</title>
    </head>
    <body>
        <h1>Contact List</h1>

        @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('contacts.create') }}">Create New Contact</a>
        <table>
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>
                            @if($contact->picture)
                                <img width="100" height="100" src="data:image/png;base64,{{ $contact->picture }}" alt="Contact Picture">
                            @else
                                <p> ? </p>
                            @endif
                        </td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->surname }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone_number }}</td>

                        <td>
                            <a href="{{ route('contacts.edit', $contact) }}">Edit</a>
                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>