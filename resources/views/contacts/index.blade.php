@extends('/contacts/layout')

@section('title', 'Contact List')

@section('content')
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6 d-flex flex-wrap align-items-center gap-2 mb-3">
            <h3 class="card-title">Contact list
                <span class="text-muted fw-normal ms-2">({{ $contactsCount }})</span>
            </h3>
        </div>
        <div class="col-md-6 d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
            <a class="btn btn-primary mb-3" href="{{ route('contacts.create') }}">Create New Contact</a>
        </div>
    </div>

    <table class="table">
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
            <tr class="align-middle">
                <td>
                    @if($contact->picture)
                    <img class="avatar-sm rounded-circle me-2" src="data:image/png;base64,{{ $contact->picture }}" alt="Contact Picture">
                    @else
                    <img class="avatar-sm rounded-circle me-2" src="{{ asset('image/user.png') }}" alt="Contact Picture">
                    @endif
                </td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->surname }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phone_number }}</td>


                <td>
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"> 
                            <a href="{{ route('contacts.edit', $contact) }}" class="px-2 text-primary">
                                <i class="bx bx-pencil font-size-18"></i>
                            </a>
                        </li>
                        <li class="list-inline-item"> 
                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link px-2 text-danger" onclick="return confirm('Are you sure?')">
                                    <i class="bx bx-trash-alt font-size-18"></i>
                                </button>
                            </form>
                        </li>
                        <li class="list-inline-item"> </li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
