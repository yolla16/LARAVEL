@extends('contact')

@section('main')
<div class="row">
    <div class="col-md-8 offset-sm-2">
        <h2 class="display-6">show</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-sm-2">
        <form action="{{ url("/contacts/{$contact->id}") }}" method="post">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                {{ $contact->full_name}}
            </div>
            <div class="form-group">
                <label for="emial">Email:</label>
                {{ $contact->email}}
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                {{ $contact->phone}}
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                {{ $contact->address}}
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
        <a class="btn btn-warning mt-3" href="{{ url('/') }}">Cancel</a>
    </div>
</div>
@endsection
