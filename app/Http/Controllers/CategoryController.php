<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\HttpClient;

class CategoryController extends Controller
{
    // TODO: show all category
    public function index()
    {
        // fetch api
        $categories = HttpClient::fetch('get', 'http://127.0.0.1:8000/api/category');

        return view(
            'category.index',
            [
                'categories' => $categories['data'],
            ]
        );
    }
    // TODO: show create category form
    public function create()
    {
        return view('category.create');
    }
    // TODO: show edit category form
    public function edit($id)
    {
        // get category data by specific id
        $category = HttpClient::fetch('get', 'http://127.0.0.1:8000/api/category/' . $id);
        // if category not found, return 404 error
        if (!$category['status']) return abort(404);

        return view('category.edit', [
            'category' => $category['data'],
        ]);
    }
    // TODO: store category data via api
    public function store(Request $request)
    {
        $files = [];
        // if user upload an logo, append file input to files variable
        if ($request->file('logo')) $files['logo'] = $request->file('logo');
        $category =  HttpClient::fetch(url: 'http://127.0.0.1:8000/api/category/', body: $request->all(), files: $files);
        // if category response status is false
        // redirect user with error message
        if (!$category['status']) return redirect()->back()->withErrors($category['message']);

        //redirect and give feedback message when category data has successfully inserted, 
        return redirect()->route('category.index')->withInput()->with('success', $category['message']);
    }
    // TODO: update category data via api by id
    public function update(Request $request, $id)
    {
        $files = [];
        // if user upload an logo, append file input to files variable
        if ($request->file('logo')) $files['logo'] = $request->file('logo');
        $category =  HttpClient::fetch(url: "http://127.0.0.1:8000/api/category/$id/update", body: $request->all(), files: $files);

        // if category response status is false
        // redirect user with error message
        if (!$category['status']) return redirect()->back()->withErrors($category['message']);
        //redirect and give feedback message when category data has successfully inserted, 
        return redirect()->route('category.index')->with('success', $category['message']);
    }
    // TODO: delete category data via api by id
    public function delete($id)
    {
        $category =  HttpClient::fetch(method: 'delete', url: "http://127.0.0.1:8000/api/category/$id/delete");
        // if category response status is false
        // redirect user with error message
        if (!$category['status']) return redirect()->back()->withErrors($category['message']);
        //redirect and give feedback message when category data has successfully inserted, 
        return redirect()->route('category.index')->with('success', $category['message']);
    }
}
