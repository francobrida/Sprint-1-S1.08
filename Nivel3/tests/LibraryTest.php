<?php

use PHPUnit\Framework\TestCase;
include __DIR__ . '/../src/Library.php';
include __DIR__ . '/../src/Book.php';
use function PHPUnit\Framework\assertGreaterThan;
use function PHPUnit\Framework\assertSame;

class LibraryTest extends TestCase {

    private Library $newLibrary;
    
    /* I started coding this test with DataProviders, but switched to this hardcoded setUp() way, since I needed the 
    library to have already some books to test functions properly. A combination of this and DataProviders seemed too complex?
    */
    public function setUp() : void {
        $this->newLibrary = new Library();
        $this->newLibrary->setBooks([
            new Book("The Hobbit", "J.R.R. Tolkien", 9780618002213, Genre::Fantasy, 510),
            new Book("1984", "George Orwell", 9780451524935, Genre::Dystopia, 328),
            new Book("El Aleph", "Jorge Luis Borges", 9789500732211, Genre::ShortStories, 600)
        ]);
    }

    public function testAddBook() : void {
        $name = "Dune";
        $author = "Frank Herbert";
        $isbn = 9780441013593;
        $genre = Genre::ScienceFiction;
        $pages = 688;
        $this->newLibrary->addBook($name, $author, $isbn, $genre, $pages); 
        $this->assertSame($name, $this->newLibrary->getBooks()[count($this->newLibrary->getBooks())-1]->getName());
    }

    public function testDeleteBook() : void {
        $name = "1984";
        $this->newLibrary->deleteBook($name); 
        $found = false;
        
        foreach ($this->newLibrary->getBooks() as $book){
            if ($book->getName() === $name){
                $found = true;
                break;
            }
        }

    $this->assertFalse($found);
    }

    public function testModifyBook() : void {
        // Which parameter to modify?? -- for this exercise, I'll modify just the author...
        $name = "The Hobbit";
        $newAuthor = "Stephen King";
        $this->newLibrary->modifyBook($name, $newAuthor);
        
        foreach ($this->newLibrary->getBooks() as $book){
            if ($book->getName() === $name){
                $this->assertSame($newAuthor,$book->getAuthor());
            }
        }
    }

    public function testSearchByName(): void {
        $name = "El Aleph";
        $bookFound = $this->newLibrary->searchByName($name);
        $this->assertSame($name, $bookFound->getName());
    }

     public function testSearchByGenre(): void {
        $genre = Genre::Dystopia;
        $bookFound = $this->newLibrary->searchByGenre($genre);
        $this->assertSame($genre, $bookFound->getGenre());
    }

    public function testSearchByIsbn(): void {
        $isbn = 9780451524935;
        $bookFound = $this->newLibrary->searchByIsbn($isbn);
        $this->assertSame($isbn, $bookFound->getIsbn());
    }

    public function testSearchByAuthor(): void {
        $author = "George Orwell";
        $bookFound = $this->newLibrary->searchByAuthor($author);
        $this->assertSame($author, $bookFound->getAuthor());
    }

    public function testReturnLargeBooks(): void {
        $largebooks = $this->newLibrary->returnLargeBooks();
        foreach ($largebooks as $book){
            $this->assertGreaterThan(500, $book->getPages());
        }
    }
   
}

?>