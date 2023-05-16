@extends('layout.theme')
@section('title', 'Loans | All')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span>
                All Loans
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('lend.create') }}">Lend a Book</a></li>
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
                                        Student
                                    </th>
                                    <th>
                                        Start Date
                                    </th>
                                    <th>
                                        End Date
                                    </th>
                                    <th>
                                        Tools
                                    </th>
                                    <th>
                                        <center>Other</center>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lends as $lend)
                                    <tr>
                                        <td class="py-1">
                                            <img src="{{ asset('assets/images/faces-clipart/pic-1.png') }} "
                                                alt="image" />
                                        </td>
                                        <td>
                                            {{ $lend->student->firstname }} {{ $lend->student->lastname }}
                                        </td>
                                        <td>
                                            {{ $lend->start_date }}
                                        </td>
                                        <td>
                                            {{ $lend->end_date }}
                                        </td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('lend.show', $lend->id) }}" class="mdi mdi-eye"
                                                    style="color: green">
                                                </a>
                                                <a href="{{ route('lend.edit', $lend->id) }}"
                                                    class="offset-3 mdi mdi-grease-pencil" style="color: blue"></a>
                                                <form action="{{ route('lend.destroy', $lend->id) }} " method="post"
                                                    class="offset-3">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" style="color: red; border: none">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        <td>
                                            <center>
                                                <a href="{{ route('lendBack.create', $lend->id) }} ">Lend Back</a>
                                            </center>
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
