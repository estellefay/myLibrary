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
        array_shift($bookColumn);
        array_pop($bookColumn);
        array_pop($bookColumn);
        foreach ($bookColumn as $key => $value) {
          $bookForm[$value] = "text";
        }
        return view('book.insert', ['bookForm' => $bookForm]);
    }

    public function insertAction(Request $request)
    {
        $formData = $request->input('book');
        foreach ($formData as $key => $value) {
          $book = new Book;
          $book->title = $value['title'];
          $book->author = $value['author'];
          $book->genre = $value['genre'];
          $book->excerpt = $value['excerpt'];
          $book->save();
        }
        return redirect('/books');
    }

    public function deleteAction(Request $request) 
    {
        Book::destroy($request->input('id'));
        return redirect('/books');
    }

    public function deleteActionMultiple(Request $request)
    {
      foreach (explode(",", $request->input('ids')) as $key => $value) {
        Book::destroy($value);
      }
      return 'true';
    }


    public function update(Request $request)
    {
        // Searching for the book via ID
        $book = Book::find($request->input('id'));
        //Send the book data and the book form input to the view
        return view('book.update', ['book' => $book]);
        //Books::table('book')->where('id', $request->input('id'))->update(['author' => 'chocolat']);
    }

    public function updateAction(Request $request)
    {
        // Found l'id du book 
        $book = Book::find($request->input('id'));
        // Replace values 
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->genre = $request->input('genre');
        $book->excerpt = $request->input('excerpt');
        $book->save();
        return redirect('/books');
    }
}
