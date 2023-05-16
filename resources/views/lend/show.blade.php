@extends('layout.theme')
@section('title', 'Lend | Show')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span>
                Lend Show
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Student informations</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic informations</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="offset-2 col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Default form</h4>
                        <p class="card-description">
                            Basic form
                        </p>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label for="student">Student</label>
                                <input disabled type="text" class="form-control" id="student"
                                    value="{{ $lend->student->firstname }} {{ $lend->student->lastname }} ">
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input disabled class="form-control" id="start_date" value="{{ $lend->start_date }}">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input disabled class="form-control" id="end_date" value="{{ $lend->end_date }}">
                            </div>
                            <div class="form-group">
                                <label for="books">Loans Books</label>
                                @foreach ($details as $detail)
                                    <input disabled type="text" class="form-control"
                                        value="{{ $detail->title }} ------> {{ $detail->total }} ">
                                @endforeach
                            </div>
                            <a class="btn btn-gradient-primary mr-2">Submit</a>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
