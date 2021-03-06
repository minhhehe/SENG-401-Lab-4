<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\AuthorBook;
use App\Subscription;
use App\Comment;
use Illuminate\Support\Facades\DB;

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
        $this->authorize('index',Book::class);
        $role = auth()->user()->role;
        $books = Book::orderBy('created_at', 'asc')->get();

        return view('books.index', compact(['books','role']));
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
        $this->authorize('create');
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
        $this->authorize('view',$book);
        $user = auth()->user();
        $role = auth()->user()->role;
        $authors = $book->getAuthors($book);
        $comments = $book->getComments();
        $subscriber = $book->getSubscriber($book);
        $subscription = Subscription::getSubscription($book);
        return view('books.show', compact(['book', 'authors', 'subscriber', 'role', 'comments', 'user', 'subscription']));

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
        $this->authorize('update',$book);
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
        $this->authorize('update');

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
    public function destroy(User $user, Book $book)
    {
        //
        Subscription::deleteAllSubscriptionsOnBook($book->id);
        AuthorBook::deleteAllAuthorBooksOnBook($book->id);
        Comment::deleteAllCommentsOnBook($book->id);
        $book->delete();
        return redirect('/books');
    }
}
