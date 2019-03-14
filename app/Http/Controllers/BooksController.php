<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\AuthorBook;

class BooksController extends Controller
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
        if ($role == 'subscriber')
          $book = User::getSubscribedBooks(auth()->user());
        else
          $books = Book::orderBy('created_at', 'asc')->get();

        return view('books.index', ['books' => $books]);
    }

    public function indexForSubscriber() {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $authors=Author::get();
        return view('books.create', compact(['authors']));
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
        $authorIDs=$request->input('authors');

        $validated = request()->validate([
          'name' => ['required'],
          'isbn' => ['required'],
          'year' => ['required'],
          'publisher' => ['required'],
          'image' => ['required'],
        ]);
        $validated['sub_status'] = 'unsubscribed';

        $newBook = Book::create($validated);

        $data = [
          'author_id'=>3,
          'book_id'=>4
        ];
        foreach ($authorIDs as $authorID) {
          $data['author_id'] = $authorID;
          $data['book_id'] = $newBook->id;
          AuthorBook::create($data);
        }

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Book $book)
    {
        //
        $role = auth()->user()->role;
        $authors = $book->getAuthors($book);
        $subscriber = $book->getSubscriber($book);
        return view('books.show', compact(['book', 'authors', 'subscriber', 'role']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Book $book)
    {
        //
        $authors = Author::get();
        return view('books.edit', compact(['book', 'authors']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Book $book)
    {


        $book->update(request([
          'name', 'isbn', 'year', 'publisher', 'image',
        ]));

        // create new data in author_books instead of updating since there
        // might be updating problems when the number of authors in
        // update is difference from the original

        AuthorBook::where('book_id', $book->id)->delete();
        $authorIDs=$request->input('authors');
        $data = [
          'author_id'=>3,
          'book_id'=>4
        ];

        foreach ($authorIDs as $authorID) {
          $data['author_id'] = $authorID;
          $data['book_id'] = $book->id;
          AuthorBook::create($data);
        }

        return redirect('/books');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
