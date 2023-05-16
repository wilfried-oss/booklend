<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Lend;
use App\Models\LendCopy;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $lends = Lend::all();

        return view('lend.index', compact(['user', 'lends']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $students = Student::all();
        $books = DB::table('books')
            ->join('numbers', 'numbers.book_id', '=', 'books.id')
            ->where('numbers.status', '=', 0)
            ->select('books.title', 'numbers.id')
            ->get();

        return view('lend.add', compact(['user', 'students', 'books']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'start_date' => ['required'],
            'end_date' => ['required'],
            'number_id' => ['required'],
        ]);

        $lend = new Lend();
        $lend->student_id = $request->student_id;
        $lend->start_date = $validateData['start_date'];
        $lend->end_date = $validateData['end_date'];

        $lend->save();

        $lend_id = $lend->id;

        $length = sizeof($validateData['number_id']);

        for ($i = 0; $i < $length; $i++) {
            LendCopy::create([
                'lend_id' => $lend_id,
                'number_id' => $validateData['number_id'][$i],
            ]);

            DB::table('numbers')
                ->where('id', '=', $validateData['number_id'][$i])
                ->update([
                    'status' => 1,
                ]);
        }

        return redirect('lend');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lend  $lend
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();

        $lend = Lend::findOrFail($id);

        $details = DB::table('lends')
            ->join('lend_copies', 'lend_copies.lend_id', '=', 'lends.id')
            ->join('numbers', 'lend_copies.number_id', '=', 'numbers.id')
            ->join('books', 'numbers.book_id', '=', 'books.id')
            ->where('lends.id', '=', $id)
            ->select('books.title', DB::raw('COUNT(numbers.book_id) as total'))
            ->groupBy('book_id')
            ->get();

        return view('lend.show', compact(['user', 'lend', 'details']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lend  $lend
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();
        $lend = Lend::findOrFail($id);
        $books = DB::table('books')
            ->join('numbers', 'numbers.book_id', '=', 'books.id')
            ->where('numbers.status', '=', 0)
            ->select('books.title', 'numbers.id')
            ->get();

        return view('lend.edit', compact(['user', 'lend', 'books']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lend  $lend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'start_date' => ['required'],
            'end_date' => ['required'],
            'number_id' => ['required'],
        ]);

        DB::table('lends')
            ->where('id', '=', $id)
            ->update([
                'start_date' => $validateData['start_date'],
                'end_date' => $validateData['end_date'],
            ]);

        $length = sizeof($validateData['number_id']);

        for ($i = 0; $i < $length; $i++) {
            LendCopy::create([
                'lend_id' => $id,
                'number_id' => $validateData['number_id'][$i],
            ]);

            DB::table('numbers')
                ->where('id', '=', $validateData['number_id'][$i])
                ->update([
                    'status' => 1,
                ]);
        }

        return redirect('lend');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lend  $lend
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lend = Lend::findOrFail($id);
        $lend->delete();

        return redirect()->back();
    }
}
