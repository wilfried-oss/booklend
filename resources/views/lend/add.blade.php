@extends('layout.theme')
@section('title', 'Lend a book')
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home"></i>
                </span>
                Lend a book
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
                        <form class="forms-sample" action="{{ route('lend.store') }} " method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="student">Student</label>
                                <select name="student_id" id="student" class="form-control">
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->firstname }}
                                            {{ $student->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" name="start_date" id="start_date"
                                    placeholder="Start Date">
                                @if ($errors->has('start_date'))
                                    <span class="text-danger text-left">{{ $errors->first('start_date') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" name="end_date" id="end_date"
                                    placeholder="End Date">
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
