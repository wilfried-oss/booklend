<?php

namespace App\Http\Controllers;

use App\Models\Lend;
use App\Models\LendBack;
use App\Models\LendCopy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LendBackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = auth()->user();

        $lend = Lend::findOrFail($id);

        $all_books = DB::table('lends')
            ->join('lend_copies', 'lend_copies.lend_id', '=', 'lends.id')
            ->join('numbers', 'lend_copies.number_id', '=', 'numbers.id')
            ->join('books', 'numbers.book_id', '=', 'books.id')
            ->where('lends.id', '=', $id)
            ->select('books.title', 'numbers.id')
            ->get();

        return view('lendback.add', compact(['user', 'lend', 'all_books']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LendBack  $lendBack
     * @return \Illuminate\Http\Response
     */
    public function show(LendBack $lendBack)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LendBack  $lendBack
     * @return \Illuminate\Http\Response
     */
    public function edit(LendBack $lendBack)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LendBack  $lendBack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LendBack $lendBack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LendBack  $lendBack
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::table('lend_copies')
            ->where('number_id', '=', $id)
            ->delete();

        $lend_back = new LendBack();
        $lend_back->back_date = now();
        $lend_back->comments = 'RAS';

        $lend_back->save();

        DB::table('numbers')
            ->where('id', '=', $id)
            ->update([
                'status' => 0,
            ]);

        return redirect()->back();
    }
}
