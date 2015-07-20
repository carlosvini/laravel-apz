<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthorRequest;
use App\Http\Controllers\Controller;
use App\Author;

class AuthorsController extends Controller
{

    public function index()
    {
        return Author::all();
    }

    public function store(AuthorRequest $request)
    {
        return Author::create($request->all());
    }

    public function show(Author $author)
    {
        return $author;
    }

    public function update(AuthorRequest $request, Author $author)
    {
        $author->update($request->all());
        return $author;
    }

    public function destroy(Author $author)
    {
        return (string) $author->delete();
    }

}
