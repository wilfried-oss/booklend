@extends('layout.theme')
@section('title', 'Lend | Back')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span>
                All Books for {{ $lend->student->firstname }} {{ $lend->student->lastname }}
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Books for Student {{ $lend->student->id }} </a></li>
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
                                        Copy
                                    </th>
                                    <th>
                                        Tools
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_books as $one_book)
                                    <tr>
                                        <td>
                                            *
                                        </td>
                                        <th>
                                            {{ $one_book->title }}
                                        </th>
                                        <td>
                                            <div class="offset-2">
                                                <b>{{ 1 }}</b>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="{{ route('lendBack.delete', $one_book->id) }}" method="post">
                                                @csrf
                                                <button type="submit" style="color: blue; border: none">
                                                    <i class="mdi mdi-undo-variant "></i>
                                                </button>
                                            </form>
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
