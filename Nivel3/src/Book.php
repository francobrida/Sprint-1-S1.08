<?php
declare(strict_types=1);

enum Genre: string { 
        case Adventure = "Adventure";
        case ScienceFiction = "Science Fiction";
        case ShortStories = "Short Stories";
        case CrimeNovel = "Crime Novel";
        case Paranormal = "Paranormal";
        case Dystopia = "Dystopia";
        case Fantasy = "Fantasy";
    }

 class Book {

    private string $name;
    private string $author;
    private int $isbn;
    private Genre $genre;
    private int $pages;

    public function __construct(string $name, string $author, int $isbn, Genre $genre, int $pages) {
        $this->name = $name;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->genre = $genre;
        $this->pages = $pages;
    }

    // Getters
    public function getName(): string {
        return $this->name;
    }
    public function getAuthor(): string {
        return $this->author;
    }
    public function getIsbn(): int {
        return $this->isbn;
    }
    public function getGenre(): Genre {
        return $this->genre;
    }
    public function getPages(): int {
        return $this->pages;
    }
    
    // Setters
    public function setName(string $name): void {
        $this->name = $name;
    }
    public function setAuthor(string $author): void {
        $this->author = $author;
    }

    public function setIsbn(int $isbn): void {
        $this->isbn = $isbn;
    }
    public function setGenre(Genre $genre): void {
        $this->genre = $genre;
    }

 }

?>