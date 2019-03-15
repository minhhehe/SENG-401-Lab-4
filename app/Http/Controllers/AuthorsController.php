<?php

namespace App\Http\Controllers;

use App\User;
use App\Author;
use App\AuthorBook;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $role = auth()->user()->role;
        $authors = Author::get();
        return view('authors.index', compact(['authors', 'role']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('authors.create');
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
        $validated = request()->validate([
          'name' => ['required'],
        ]);

        Author::create($validated);

        return view('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Author $author)
    {
        //
        $role = auth()->user()->role;
        $books = $author->getBooks();
        return view('authors.show', compact('author', 'books', 'role'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Author $author)
    {
        //
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Author $author)
    {
        //
        $author->update(request([
          'name'
        ]));

        // create new data in author_books instead of updating since there
        // might be updating problems when the number of authors in
        // update is difference from the original

        return redirect('authors/'.$author->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Author $author)
    {
        //
        $author_books = AuthorBook::where('author_id', $author->id)->get();
        foreach($author_books as $author_book) $author_book->delete();
        $author->delete();
        return redirect('/authors');
    }
}
