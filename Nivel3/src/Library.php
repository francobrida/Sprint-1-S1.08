<?php
declare(strict_types=1);

class Library {

    private array $books;

    public function __construct(array $books = []) {
        $this->books = $books;
    }

    public function getBooks() : array {
        return $this->books;
    }

    public function setBooks(array $books): void {
        $this->books = $books;
    }

    public function addBook(string $name, string $author, int $isbn, Genre $genre, int $pages):void {
        $this->books[] = new Book($name, $author, $isbn, $genre, $pages);
    }

    public function deleteBook(string $name): string {
        foreach ($this->books as $index => $book){
            if ($book->getName() === $name){
                unset($this->books[$index]);
                $this->books = array_values($this->books); 
                return "$name succesfully deleted";
            } 
        }
        return "Book not found";
    }

    function modifyBook(string $name,string $author) : string {
        foreach ($this->books as $book){
            if ($book->getName() === $name){
                $book->setAuthor($author);
                return "Success.";
            }
        }
        return "Book not found. Could not modify.";
    }

    function searchByName(string $name) : ?Book { 
        foreach ($this->books as $book){
            if ($book->getName() === $name){
                return $book;
            } 
        }
        return null;
    }

    function searchByGenre(Genre $genre) : array {
        $foundBooks = [];
        foreach ($this->books as $book){
            if ($book->getGenre() === $genre){
                $foundBooks[] = $book;
            } 
        }
        return $foundBooks;
    }

    function searchByIsbn(int $isbn) : ?Book{
        foreach ($this->books as $book){
            if ($book->getIsbn() === $isbn){
                return $book;
            } 
        }
        return null;
    }

    function searchByAuthor(string $author) : array {
        $foundBooks = [];
        foreach ($this->books as $book){
            if ($book->getAuthor() === $author){
                $foundBooks[] = $book;
            } 
        }
        return $foundBooks;
    }

    function returnLargeBooks() : array {
        $largePages = 500;
        $arrayOfLargeBooks = [];
        foreach ($this->books as $book){
            if ($book->getPages() > $largePages){
                $arrayOfLargeBooks[] = $book;
            }
        } 
        return $arrayOfLargeBooks;
    }



}

?>