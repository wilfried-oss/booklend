@extends('layout.theme')
@section('title', 'Author | Edit')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span>
                Edit Author
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Form edit author</a></li>
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
                        <form class="forms-sample" action="{{ route('author.update', $author->id) }}" method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <input type="text" class="form-control" name="firstname"
                                    value="{{ $author->firstname }}">
                                @if ($errors->has('firstname'))
                                    <span class="text-danger text-left">{{ $errors->first('firstname') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <input type="text" class="form-control" name="lastname" value="{{ $author->lastname }}">
                                @if ($errors->has('lastname'))
                                    <span class="text-danger text-left">{{ $errors->first('lastname') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
