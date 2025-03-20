<?php
class Library
{
    public $name;
    public $books = []; // Initialize as an empty array

    public function __construct($name)
    {
        $this->name = $name;
    }

    // Add a single book or multiple books at once
    public function addBooks($books)
    {
        if (is_array($books)) {
            // If an array of books is passed, merge them into the current list
            $this->books = array_merge($this->books, $books);
        } else {
            // If a single book is passed, add it to the list
            $this->books[] = $books;
        }
    }

    // Delete a specific book
    public function deleteBook($book)
    {
        $key = array_search($book, $this->books); // Find the index of the book
        if ($key !== false) {
            unset($this->books[$key]); // Remove the book
            $this->books = array_values($this->books); // Re-index the array
        } else {
            echo "Book '{$book}' not found in the library.<br>";
        }
    }

    // Display all books
    public function displayBooks()
    {
        echo "<br><br>User: " . $this->name . "<br>List of Books:<br>";

        if (empty($this->books)) {
            echo "No books in the library.<br>";
        } else {
            echo implode(", ", $this->books) . "<br>";
        }
    }
}

// Create a Library object
$bibek = new Library('Bibek');

// Add multiple books at once
$bibek->addBooks(['The God of War', 'The Devil of War', 'Harry Potter']);

// Display all books
$bibek->displayBooks();

// Add a single book
$bibek->addBooks('Percy Jackson');

// Display books after adding one
$bibek->displayBooks();

// Delete a book
$bibek->deleteBook('Harry Potter');

// Display books after deletion
$bibek->displayBooks();

// Try to delete a non-existing book
$bibek->deleteBook('Non-Existing Book');
?>
