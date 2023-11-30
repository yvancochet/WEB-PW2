@extends('/contacts/layout')

@section('title', 'Contact Edit')

@section('content')
<div class="container mt-5">
    <div class="row align-items-center">
        <div class="col-md-6 d-flex flex-wrap align-items-center gap-2 mb-3">
            <h3 class="card-title">Edit contact</h3>
        </div>
    </div>

    <form action="{{ route('contacts.update', $contact) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Picture</div>
                    <div class="card-body text-center">
                    @if ($contact->picture)
                        <img id="imagePreview" class="img-account-profile rounded-circle mb-2" src="data:image/png;base64,{{ $contact->picture }}" alt="Contact Picture">
                    @else
                        <img id="imagePreview" class="img-account-profile rounded-circle mb-2" src="{{ asset('image/user.png') }}" alt="Contact Picture">
                    @endif
                    <div class="small font-italic text-muted mb-4">JPG, PNG or JPEG no larger than 5 MB</div>
                    <input id='imageInput' onchange="previewImage(this)" accept=".png, .jpeg, .jpg" name="picture" type='file' hidden/>
                    <button class="btn btn-primary" type="button" onclick="openFileInput()">Upload new image</button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Details</div>
                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="name">Name</label>
                                <input type="text" maxlength="25" class="form-control" name="name" value="{{ old('name', $contact->name) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="surname">Surname</label>
                                <input type="text" maxlength="25" class="form-control" name="surname" value="{{ old('surname', $contact->surname) }}" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="phone">Phone Number</label>
                                <input type="text" maxlength="25" class="form-control" name="phone_number" value="{{ old('phone', $contact->phone_number) }}">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="birthday">Birthday</label>
                                <input type="date" maxlength="50" class="form-control" name="birthday_date" value="{{ old('birthday', $contact->birthday_date) }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Email address</label>
                            <input type="email" maxlength="100" class="form-control" name="email" value="{{ old('email', $contact->email) }}">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="address">Address</label>
                            <textarea class="form-control" maxlength="1024" name="address">{{ old('address', $contact->address) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="note">Note</label>
                            <textarea class="form-control" maxlength="1024" name="note">{{ old('note', $contact->note) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Contact</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
