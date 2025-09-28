<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'books';  // Name of your table
    protected $allowedFields = ['title', 'author'];  // Fields you can save

    // Get all books (READ)
    public function getBooks()
    {
        return $this->findAll();
    }

    // Get one book by ID (for EDIT)
    public function getBook($id)
    {
        return $this->find($id);
    }

    // Add a new book (CREATE)
    public function addBook($data)
    {
        return $this->insert($data);
    }

    // Update a book (UPDATE)
    public function updateBook($id, $data)
    {
        return $this->update($id, $data);
    }

    // Delete a book (DELETE)
    public function deleteBook($id)
    {
        return $this->delete($id);
    }
}