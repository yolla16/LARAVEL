@extends('contact')

@section('main')
<div class="row">
    <div class="col-md-8 offset-sm-2">
        <h2 class="display-6">Add New</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-sm-2">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ url("/contacts") }}" method="post">
            @csrf
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input value="{{ old('full_name') }}" class="form-control" type="text" name="full_name">
            </div>
            <div class="form-group">
                <label for="emial">Email:</label>
                <input value="{{ old('email') }}" class="form-control" type="text" name="email">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input value="{{ old('phone') }}" class="form-control" type="text" name="phone">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address">{{ old('address') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
@endsection
