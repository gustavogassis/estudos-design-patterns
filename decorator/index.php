<?php

class Book
{
    private $author;
    private $title;

    function __construct($title_in, $author_in)
    {
        $this->author = $author_in;
        $this->title  = $title_in;
    }

    function getAuthor()
    {
        return $this->author;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getAuthorAndTitle()
    {
      return $this->getTitle().' by '.$this->getAuthor();
    }
}

class BookTitleDecorator
{
    protected $book;
    protected $title;

    public function __construct(Book $book_in)
    {
        $this->book = $book_in;
        $this->resetTitle();
    }

    function resetTitle()
    {
        $this->title = $this->book->getTitle();
    }

    function showTitle()
    {
        return $this->title;
    }
}

class BookTitleExclaimDecorator extends BookTitleDecorator
{
    private $bookTitleDecorator;

    public function __construct(BookTitleDecorator $bookTitleDecorator_in)
    {
        $this->bookTitleDecorator = $bookTitleDecorator_in;
    }

    function exclaimTitle()
    {
        $this->bookTitleDecorator->title = "!" . $this->bookTitleDecorator->title . "!";
    }
}

class BookTitleStarDecorator extends BookTitleDecorator
{
    private $bookTitleDecorator;

    public function __construct(BookTitleDecorator $bookTitleDecorator_in)
    {
        $this->bookTitleDecorator = $bookTitleDecorator_in;
    }

    function starTitle()
    {
        $this->bookTitleDecorator->title = Str_replace(" ","*",$this->bookTitleDecorator->title);
    }
}

writeln('BEGIN TESTING DECORATOR PATTERN');
writeln('');

$patternBook = new Book('Design Patterns', 'Gamma, Helm, Johnson, and Vlissides');

$decorator = new BookTitleDecorator($patternBook);
$starDecorator = new BookTitleStarDecorator($decorator);
$exclaimDecorator = new BookTitleExclaimDecorator($decorator);

writeln('showing title : ');
writeln($decorator->showTitle());
writeln('');

writeln('showing title after two exclaims added : ');
$exclaimDecorator->exclaimTitle();
$exclaimDecorator->exclaimTitle();
writeln($decorator->showTitle());
writeln('');

writeln('showing title after star added : ');
$starDecorator->starTitle();
writeln($decorator->showTitle());
writeln('');

writeln('showing title after reset: ');
writeln($decorator->resetTitle());
writeln($decorator->showTitle());
writeln('');

writeln('END TESTING DECORATOR PATTERN');

function writeln($line_in) {
    echo $line_in."<br/>";
  }