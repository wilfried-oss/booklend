<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        $books =  DB::table('books')
            ->join('numbers', 'books.id', '=', 'numbers.book_id')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->where('numbers.status', '=', 0)
            ->select('books.id', 'books.title', 'authors.firstname', 'authors.lastname', DB::raw('COUNT(numbers.book_id) as total'))
            ->groupBy('book_id')
            ->get();

        return view('book.index', compact(['user', 'books']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        $authors = Author::all();
        return view('book.add', compact(['user', 'authors']));
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
            'title' => ['required', 'unique:books', 'min:5', 'max:255'],
            'author_id' => ['required'],
            'copy' => ['required', 'integer'],
        ]);

        $book = new Book();
        $book->title = $validateData['title'];
        $book->author_id = $validateData['author_id'];

        $book->save();

        $insertedId = $book->id;

        $i = 0;

        $copy = (int)$validateData['copy'];
        for ($i = 0; $i < $copy; $i++) {
            Number::create([
                'book_id' => $insertedId,
            ]);
        }

        return redirect('book');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user();
        $book = Book::findOrFail($id);
        return view('book.show', compact(['user', 'book']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = auth()->user();

        $book =  DB::table('books')
            ->join('numbers', 'books.id', '=', 'numbers.book_id')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->where('numbers.book_id', '=', $id)
            ->where('numbers.status', '=', 0)
            ->select('books.id', 'books.title', 'authors.firstname', 'authors.lastname', DB::raw('COUNT(numbers.book_id) as total_available'))
            ->groupBy('book_id')
            ->get();

        $authors = Author::all();

        return view('book.edit', compact(['user', 'book', 'authors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('books')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->where('books.id', $id)
            ->update(
                [
                    'title' => $request->title,
                    'author_id' => $request->author_id,
                ],
            );

        $i = 0;
        $copy = (int)$request->copy;
        for ($i = 0; $i < $copy; $i++) {
            Number::create([
                'book_id' => $id,
            ]);
        }

        return redirect('book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->back();
    }
}
