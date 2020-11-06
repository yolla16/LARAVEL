@extends('contact')

@section('main')
<a href="{{ url("contacts/create") }}" class="btn btn-success mb-2">New</a>

@if(session()->get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('success') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <form action="{{ url("/") }}" class="form-inline" method="GET">
        <div class="form-group mx-sm-3 mb-2">
            <input value="{{Request::get('keyword')}}" name="keyword" type="text" class="form-control"
                placeholder="by name">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->phone}}</td>
                    <td>{{$contact->address}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ url("contacts/{$contact->id}/edit") }}">EDIT</a>
                    </td>
                    <td>
                        <form action="{{ url("contacts/{$contact->id}") }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $contacts->links() }}
    </div>
</div>
@endsection
