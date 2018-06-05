<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Book as Book;


class BookController extends Controller
{
    public function display()
    {
        $books = Book::all()->sortBy('title');
        return view('book.show', ['books' => $books ]);
        
    }

    public function insert()
    {
        $book = new Book;
        $bookColumn = $book->getTableColumns();
        $bookForm = [];
        array_shift($bookColumn); # Enlever la première ligne du tableau 
        array_pop($bookColumn); # Enlever la dernière ligne du tableau 
        array_pop($bookColumn);

        foreach ($bookColumn as $key => $value) {
            $bookForm[$value] = "text";
        }
        return view('book.insert', ['bookForm' => $bookForm]);
    }

    public function insertAction(Request $request)
    {
        $form = $request->input();
        $book = new Book;
        $book->title = $form['title'];
        $book->author = $form['author'];
        $book->genre = $form['genre'];
        $book->excerpt = $form['excerpt'];
        $book->save();
        return redirect('/books');

       //  dd($request->input());
    }

    public function deleteAction(Request $request) 
    {
        Book::destroy($request->input('id'));
        return redirect('/books');
    }

    public function update(Request $request)
    {
        // Searching for the book via ID
        $book = Book::find($request->input('id'));
        //Send the book data and the book form input to the view
        return view('book.update', ['book' => $book]);
        //Books::table('book')->where('id', $request->input('id'))->update(['author' => 'chocolat']);
    }

    public function updateDisplay(Request $request)
    {
        $book = Book::find($request->input('id'));
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->genre = $request->input('genre');
        $book->excerpt = $request->input('excerpt');
        $book->save();
        return redirect('/books');
    }
}
