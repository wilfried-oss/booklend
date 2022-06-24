@extends('layout.theme')
@section('title', 'Book | All')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span>
                All Books
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Books from our library</a></li>
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
                                        #
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Author
                                    </th>
                                    <th>
                                        Available copy
                                    </th>
                                    <th>
                                        Tools
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>
                                            {{ $book->id }}
                                        </td>
                                        <th>
                                            {{ $book->title }}
                                        </th>
                                        <td>
                                            {{ $book->firstname }}
                                            {{ $book->lastname }}
                                        </td>
                                        <td>
                                            <div class="offset-2">
                                                <b>{{ $book->total }}</b>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('Book.show', $book->id) }}" class="mdi mdi-eye"
                                                    style="color: green">
                                                </a>
                                                <a href="{{ route('Book.edit', $book->id) }}"
                                                    class="offset-3 mdi mdi-grease-pencil" style="color: blue"></a>
                                                <form action="{{ route('Book.delete', $book->id) }} " method="post"
                                                    class="offset-3">
                                                    @csrf
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
