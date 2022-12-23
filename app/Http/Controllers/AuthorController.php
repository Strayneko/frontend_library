<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Helpers\HttpClient;

class AuthorController extends Controller
{
    // TODO: show all category
    public function index()
    {
        // fetch api
        $authors = HttpClient::fetch('get', 'http://127.0.0.1:8000/api/author');

        return view(
            'author.index',
            [
                'authors' => $authors['data'],
            ]
        );
    }

    // TODO: show create author form
    public function create()
    {
        return view('author.create');
    }

    // TODO: store author data via api
    public function store(Request $request)
    {
        $files = [];
        // if user upload an photo, append file input to files variable
        if ($request->file('photo')) $files['photo'] = $request->file('photo');
        $author =  HttpClient::fetch(url: 'http://127.0.0.1:8000/api/author/', body: $request->all(), files: $files);
        // if author response status is false
        // redirect user with error message
        if (!$author['status']) return redirect()->back()->withInput()->withErrors($author['message']);

        //redirect and give feedback message when author data has successfully inserted, 
        return redirect()->route('author.index')->with('success', $author['message']);
    }

    // TODO: show edit author form
    public function edit($id)
    {
        // get author data by specific id
        $author = HttpClient::fetch('get', 'http://127.0.0.1:8000/api/author/' . $id);
        // if author not found, return 404 error
        if (!$author['status']) return abort(404);

        return view('author.edit', [
            'author' => $author['data'],
        ]);
    }

    // TODO: show author detail by id
    public function show($id)
    {
        // get author data by specific id
        $author = HttpClient::fetch('get', 'http://127.0.0.1:8000/api/author/' . $id);

        // if author not found, return 404 error
        if (!$author['status']) return abort(404);

        return view('author.show', [
            'author' => $author['data']
        ]);
    }

    // TODO: update category data via api by id
    public function update(Request $request, $id)
    {
        $files = [];
        // if user upload an photo, append file input to files variable
        if ($request->file('photo')) $files['photo'] = $request->file('photo');
        $author =  HttpClient::fetch(url: "http://127.0.0.1:8000/api/author/$id/update", body: $request->all(), files: $files);
        // if author response status is false
        // redirect user with error message
        if (!$author['status']) return redirect()->back()->withInput()->withErrors($author['message']);
        //redirect and give feedback message when author data has successfully inserted, 
        return redirect()->route('author.index')->with('success', $author['message']);
    }

    // TODO: delete author data via api by id
    public function delete($id)
    {
        $author =  HttpClient::fetch(method: 'delete', url: "http://127.0.0.1:8000/api/author/$id/delete");
        // if author response status is false
        // redirect user with error message
        if (!$author['status']) return redirect()->back()->withErrors($author['message']);
        //redirect and give feedback message when author data has successfully inserted, 
        return redirect()->route('author.index')->with('success', $author['message']);
    }
}
