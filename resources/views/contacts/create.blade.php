@extends('/contacts/layout')

@section('title', 'Contact Create')

@section('content')
<div class="container mt-5">
    <div class="row align-items-center">
            <div class="col-md-6 d-flex flex-wrap align-items-center gap-2 mb-3">
                <h3 class="card-title">Create contact</h3>
            </div>
        </div>

    <form action="{{ route('contacts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="row">
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Picture</div>
                    <div class="card-body text-center">
                        <img id="imagePreview" class="img-account-profile rounded-circle mb-2" src="{{ asset('image/user.png') }}" alt="Contact Picture">
                    <div class="small font-italic text-muted mb-4">JPG, PNG or JPEG no larger than 5 MB</div>
                    <input id='imageInput' onchange="previewImage(this)" accept=".png, .jpeg, .jpg" name="picture" type='file' hidden/>
                    <!--<input class="btn btn-primary" type="file" id="imageInput" onchange="previewImage(this)" accept=".png, .jpeg, .jpg" name="picture">-->
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
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="surname">Surname</label>
                                <input type="text" class="form-control" name="surname" placeholder="Surname" required>
                            </div>
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="phone">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="Phone Number">
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="birthday">Birthday</label>
                                <input type="date" class="form-control" name="birthday_date" placeholder="Birthday">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="email">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Email address">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="address">Address</label>
                            <textarea class="form-control" name="address" placeholder="Address"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="note">Note</label>
                            <textarea class="form-control" name="note" placeholder="Note"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Contact</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
