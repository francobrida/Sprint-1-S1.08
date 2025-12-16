<?php

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

    public function addBook(string $name, string $author, int $isbn, string $genre, int $pages):void {
        array_push($this->books, new Book($name, $author, $isbn, $genre, $pages));
    }

    public function deleteBook(string $name): void{
        foreach ($this->books as $book){
            if ($book->getName() === $name){
                unset($this->books[$book]);
                $this->books = array_values($this->books); 
                break;
            }
        }
    }

    function returnLargeBooks() : array {
        $largePages = 500;
        $arrayOfLargeBooks = [];
        foreach ($this->books as $book){
            if ($book->getPages > $largePages){
                array_push($arrayOfLargeBooks, $book);
            }
        } 
        return $arrayOfLargeBooks;
    }


}

?>