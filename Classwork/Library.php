<!-- // Create a class named Library with the following properties name, books, and add methods addBook($book) to add the book to the library and display books displayBooks() to show all books in the library. Write a progarm to create a library object add at least three books. Display all the books. -->

<?php
 class Library{
  public $name;
  public $books;

  public function __construct($name)
  {
    $this->name = $name;
    // $this -> books = $books;
  }

 public function addBooks($book)
 {
  $this->books[] = $book;
 }

 public function displayBooks() {

  echo "<br> <br> User:  " . $this->name . "<br> List of Books:<br>";

  foreach ($this->books as $book) {
      echo  $book. ", " ;
  }
}

 }

$bibek = new Library('Bibek');
// $ram = new Library('Ram');
// $samar = new Library('samar');

$bibek->addBooks('The god of war');
$bibek->addBooks('The Devil of war');
// $ram->addBooks('Harry Potter');
// $ram->addBooks('Raju Potter');
// $samar->addBooks('Marry Potter');

$bibek->displayBooks();
// $ram->displayBooks();
// $samar->displayBooks();






?>
