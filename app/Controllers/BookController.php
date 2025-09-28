<?php

namespace App\Controllers;

use App\Models\BookModel;
use CodeIgniter\Controller;

class BookController extends Controller
{
    protected $bookModel;

    public function __construct()
    {
        $this->bookModel = new BookModel();  // Load the model

        helper('form');
    }

    // Show list of books (READ)
    public function index()
    {
        $data['books'] = $this->bookModel->getBooks();
        return view('book_list', $data);  // Send to view
    }

    // Show form to add new book
    public function create()
{
    return view('book_form');
}

    // Save new book (CREATE)
    public function store()
{
    // Set validation rules
    $rules = [
        'title' => 'required|min_length[3]',
        'author' => 'required|min_length[3]'
    ];

    // Check if data passes rules
    if (!$this->validate($rules)) {
        // If fails, show form again with errors
        return view('book_form', ['validation' => $this->validator]);
    }

    // If good, save to database
    $data = [
        'title' => $this->request->getPost('title'),
        'author' => $this->request->getPost('author')
    ];
    $this->bookModel->addBook($data);
    return redirect()->to('/books');  // Go back to list
}

    // Show form to edit book
    public function edit($id)
{
    $data['book'] = $this->bookModel->getBook($id);
    return view('book_form', $data);
}

    // Update book (UPDATE)
    public function update($id)
{
    // Set validation rules (same as store)
    $rules = [
        'title' => 'required|min_length[3]',
        'author' => 'required|min_length[3]'
    ];

    // Check if data passes rules
    if (!$this->validate($rules)) {
        // If fails, get the current book data and show form with errors
        $data['book'] = $this->bookModel->getBook($id);
        $data['validation'] = $this->validator;
        return view('book_form', $data);
    }

    // If good, update database
    $data = [
        'title' => $this->request->getPost('title'),
        'author' => $this->request->getPost('author')
    ];
    $this->bookModel->updateBook($id, $data);
    return redirect()->to('/books');  // Go back to list
}

    // Delete book (DELETE)
    public function delete($id)
    {
        $this->bookModel->deleteBook($id);
        return redirect()->to('/books');  // Go back to list
    }
}