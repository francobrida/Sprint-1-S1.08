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
        array_push($this->books, new Book($name, $author, $isbn, $genre, $pages));
    }

    public function deleteBook(string $name): void{
        foreach ($this->books as $index => $book){
            if ($book->getName() === $name){
                unset($this->books[$index]);
                $this->books = array_values($this->books); 
                break;
            }
        }
    }

    function modifyBook(string $name,string $author) : void {
        foreach ($this->books as $book){
            if ($book->getName() === $name){
                $book->setAuthor($author);
            }
        }
    }

    function searchByName(string $name) : ?Book{ // From what I've read, this "?Book" allows to return null if no book is found.
        foreach ($this->books as $book){
            if ($book->getName() === $name){
                return $book;
            } 
        }
        return null;
    }

    function searchByGenre(Genre $genre) : ?Book{
        foreach ($this->books as $book){
            if ($book->getGenre() === $genre){
                return $book;
            } 
        }
        return null;
    }

    function searchByIsbn(int $isbn) : ?Book{
        foreach ($this->books as $book){
            if ($book->getIsbn() === $isbn){
                return $book;
            } 
        }
        return null;
    }

    function searchByAuthor(string $author) : ?Book{
        foreach ($this->books as $book){
            if ($book->getAuthor() === $author){
                return $book;
            } 
        }
        return null;
    }

    function returnLargeBooks() : array {
        $largePages = 500;
        $arrayOfLargeBooks = [];
        foreach ($this->books as $book){
            if ($book->getPages() > $largePages){
                array_push($arrayOfLargeBooks, $book);
            }
        } 
        return $arrayOfLargeBooks;
    }



}

?>