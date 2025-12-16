<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertGreaterThan;
use function PHPUnit\Framework\assertSame;

class LibraryTest extends TestCase {

    private Library $newLibrary;

    public function setUp() : void {
        $this->newLibrary = new Library();
        $this->newLibrary->setBooks([new Book("The Hobbit", "J.R.R. Tolkien", 9780618002213, "Fantasy", 510)]);
    }

    #[DataProvider('BooksDataProvider')]
    public function testAddBook(string $name, string $author, int $isbn, string $genre, int $pages) : void {
        $this->newLibrary->addBook($name, $author, $isbn, $genre, $pages); 
        $this->assertSame($name, $this->newLibrary->getBooks()[0]->getName());
        $this->assertSame($author, $this->newLibrary->getBooks()[0]->getAuthor());
        $this->assertSame($isbn, $this->newLibrary->getBooks()[0]->getIsbn());
        $this->assertSame($genre, $this->newLibrary->getBooks()[0]->getGenre());
        $this->assertSame($pages, $this->newLibrary->getBooks()[0]->getPages());
    }

    public function testDeleteBook(string $name, string $author, int $isbn, string $genre, int $pages) : void {
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

    public function testModifyBook(string $name, string $author, int $isbn, string $genre, int $pages) : void {
        // pendiente. a definir que parametro modificar, o quizas todos ellos? 
    }

    public function testSearchByName(string $name): void {
        $this->newLibrary->arrayPush(new Book($name, $author, $isbn, $genre, $pages));
        $bookFound = $newLibrary->searchByName($name);
        assertSame($name, $bookFound->getName());
    }

     public function testSearchByGenre(string $genre): void {
        $newLibrary = new Library();
        $newLibrary->arrayPush(new Book($name, $author, $isbn, $genre, $pages));
        $bookFound = $newLibrary->searchByGenre($genre);
        assertSame($genre, $bookFound->getGenre());
    }

    public function testSearchByIsbn(int $isbn): void {
        $newLibrary = new Library();
        $newLibrary->arrayPush(new Book($name, $author, $isbn, $genre, $pages));
        $bookFound = $newLibrary->searchByIsbn($isbn);
        assertSame($isbn, $bookFound->getIsbn());
    }

    public function testSearchByAuthor(string $author): void {
        $newLibrary = new Library();
        $newLibrary->arrayPush(new Book($name, $author, $isbn, $genre, $pages));
        $bookFound = $newLibrary->searchByAuthor($author);
        assertSame($author, $bookFound->getAuthor());
    }

    public function testReturnLargeBooks(string $name, string $author, int $isbn, string $genre, int $pages): void {
        $newLibrary = new Library();
        $newLibrary->arrayPush(new Book($name, $author, $isbn, $genre, $pages));
        $largebooks = $newLibrary->returnLargeBooks();

        assertGreaterThan(500, $largebooks[0]->getPages());
    }
   
}

?>