<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;

class BookController extends Controller
{
    // TODO: show all book data
    public function index()
    {
        // fetch api
        $books = HttpClient::fetch('get', 'http://127.0.0.1:8000/api/book');


        return view(
            'book.index',
            [
                'books' => $books['data'],
            ]
        );
    }
    // TODO: show book detail by id
    public function show($id)
    {
        // get book data by specific id
        $book = HttpClient::fetch('get', 'http://127.0.0.1:8000/api/book/' . $id);
        // if book not found, return 404 error
        if (!$book['status']) return abort(404);
        return view('book.show', [
            'book' => $book['data']
        ]);
    }
    // TODO: show create book form
    public function create()
    {
        // get category data
        $categories = HttpClient::fetch('get', 'http://127.0.0.1:8000/api/category');
        // get all author data
        $authors = HttpClient::fetch('get', 'http://127.0.0.1:8000/api/author');
        return view('book.create', [
            'categories' => $categories['data'],
            'authors' => $authors['data']
        ]);
    }

    // TODO: store book data via api
    public function store(Request $request)
    {
        $files = [];
        if ($request->file('image')) $files['image'] = $request->file('image');
        $book =  HttpClient::fetch(url: 'http://127.0.0.1:8000/api/book/', body: $request->all(), files: $files);
        // if book response status is false
        // redirect user with error message
        if (!$book['status']) return redirect()->back()->withErrors($book['message']);

        //redirect and give feedback message when book data has successfully inserted, 
        return redirect()->route('book.index')->with('success', $book['message']);
    }

    // TODO: show edit book form
    public function edit($id)
    {
        // get book data by specific id
        $book = HttpClient::fetch('get', 'http://127.0.0.1:8000/api/book/' . $id);
        // if book not found, return 404 error
        if (!$book['status']) return abort(404);

        // get category data
        $categories = HttpClient::fetch('get', 'http://127.0.0.1:8000/api/category');
        // get all author data
        $authors = HttpClient::fetch('get', 'http://127.0.0.1:8000/api/author');

        return view('book.edit', [
            'book' => $book['data'],
            'authors' => $authors['data'],
            'categories' => $categories['data']
        ]);
    }

    // TODO: update book data by specific id with api
    public function update(Request $request, $id)
    {
        $files = [];
        if ($request->file('image')) $files['image'] = $request->file('image');
        $book =  HttpClient::fetch(url: "http://127.0.0.1:8000/api/book/$id/update", body: $request->all(), files: $files);
        // if book response status is false
        // redirect user with error message
        if (!$book['status']) return redirect()->back()->withErrors($book['message']);
        //redirect and give feedback message when book data has successfully inserted, 
        return redirect()->route('book.index')->with('success', $book['message']);
    }

    // TODO: delete book data by specific id with api
    public function delete($id)
    {
        $book =  HttpClient::fetch('delete', url: "http://127.0.0.1:8000/api/book/$id/delete");
        // if book response status is false
        // redirect user with error message
        if (!$book['status']) return redirect()->back()->withErrors($book['message']);
        //redirect and give feedback message when book data has successfully inserted, 
        return redirect()->route('book.index')->with('success', $book['message']);
    }
}
