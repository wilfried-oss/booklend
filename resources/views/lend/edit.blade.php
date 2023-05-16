@extends('layout.theme')
@section('title', 'Lend | Edit')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span>
                Edit a lend
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
                        <form class="forms-sample" action="{{ route('lend.update', $lend->id) }} " method="POST">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="student">Student</label>
                                <input type="text" class="form-control" disabled
                                    value="{{ $lend->student->firstname }}  {{ $lend->student->lastname }}">
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" name="start_date" id="start_date"
                                    value="{{ $lend->start_date }}">
                                @if ($errors->has('start_date'))
                                    <span class="text-danger text-left">{{ $errors->first('start_date') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" name="end_date" id="end_date"
                                    value="{{ $lend->end_date }}">
                                @if ($errors->has('end_date'))
                                    <span class="text-danger text-left">{{ $errors->first('end_date') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="books">Available Books</label>
                                <select name="number_id[]" id="books" class="form-control" multiple>
                                    @foreach ($books as $book)
                                        <option value=" {{ $book->id }} "> {{ $book->title }} </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('number_id'))
                                    <span class="text-danger text-left">{{ $errors->first('number_id') }}</span>
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
@section('script')
    <script>
        $(function() {
            $('#books').select2({
                placeholder: "Select your books",
            });
        });
    </script>
@endsection
