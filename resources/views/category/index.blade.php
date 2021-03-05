@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
                <div class="alert alert-success">
                {{ Session::get('message')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">All Categories
                    <span class="float-right">
                        <a href="{{ route('category.create') }}">
                            <button class="btn btn-outline-secondary">
                                Add Category
                            </button>
                    </span>
                </div>

                <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($categories) > 0)
                            @foreach($categories as $key=>$category)
                                <tr>
                                    <th scope="row">{{ $key+1 }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', [$category->id]) }}" class="btn btn-outline-success">Edit</a>
                                    </td>
                                    <td>
                                            
                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal{{$category->id}}">
                                    Delete
                                    </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                                <form action="{{ route('category.destroy', [$category->id]) }}" method="post">@csrf
                                                {{ method_field('DELETE')}}
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you'd like to delete the {{$category->name}} category?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                                </div>
                                                </div>
                                                </form>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">No Categories to Display!</td>
                            </tr>
                        @endif
                    </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection