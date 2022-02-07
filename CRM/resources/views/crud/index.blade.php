
@extends('layouts.main')


@section('content')

    <style>
        .push-top {
            margin-top: 50px;
        }
    </style>
<div class="row">
    <div class="col-12" style="margin-top: 10%">
            <div class="container">
                <div class="push-top">
                    @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div><br />
                    @endif
                    <table class="table">
                        <thead>
                        <tr class="table-warning">
                            <td>ID</td>
                            <td>Name</td>
                            <td>Last name</td>
                            <td>Email</td>
                            <td>Phone</td>
                            <td>Password</td>
                            <td class="text-center">Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($worker as $workers)
                            <tr>
                                <td>{{$workers->id}}</td>
                                <td>{{$workers->name}}</td>
                                <td>{{$workers->last_name}}</td>
                                <td>{{$workers->email}}</td>
                                <td>{{$workers->phone}}</td>
                                <td>{{$workers->password}}</td>
                                <td class="text-center">
                                    <a href="{{ route('workers.edit', $workers->id)}}" class="btn btn-primary btn-sm"">Edit</a>
                                    <form action="{{ route('workers.destroy', $workers->id)}}" method="post" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            {{ $worker->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

@endsection