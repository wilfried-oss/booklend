@extends('layout.theme')
@section('title', 'Author | All')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span>
                All Authors
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('author.create') }}">Add Author</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic informations</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Striped Table</h4>
                        <p class="card-description">
                            Add class <code>.table-striped</code>
                        </p>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Profile
                                    </th>
                                    <th>
                                        First name
                                    </th>
                                    <th>
                                        Last name
                                    </th>
                                    <th>
                                        Tools
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $author)
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{ asset('assets/images/faces-clipart/pic-1.png') }} "
                                                alt="image" />
                                        </td>
                                        <td>
                                            {{ $author->firstname }}
                                        </td>
                                        <td>
                                            {{ $author->lastname }}
                                        </td>
                                        <td>
                                            <div class="row">

                                                <a href="{{ route('author.show', $author->id) }}" class="mdi mdi-eye"
                                                    style="color: green">
                                                </a>
                                                <a href="{{ route('author.edit', $author->id) }}"
                                                    class="offset-3 mdi mdi-grease-pencil" style="color: blue"></a>
                                                <form action="{{ route('author.destroy', $author->id) }} " method="post"
                                                    class="offset-3">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" style="color: red; border: none">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
