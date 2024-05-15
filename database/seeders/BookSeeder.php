<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            ['To Kill a Mockingbird', 73, 22, 61],
            ['1984', 25, 22, 16],
            ['The Catcher in the Rye', 12, 22, 82],
            ['The Great Gatsby', 81, 22, 37],
            ['One Hundred Years of Solitude', 56, 58, 45],
            ['The Lord of the Rings', 45, 30, 64],
            ['Brave New World', 68, 77, 24],
            ['The Hobbit', 37, 30, 70],
            ['Animal Farm', 20, 78, 86],
            ['The Grapes of Wrath', 9, 18, 28],
            ['Fahrenheit 451', 84, 77, 33],
            ['Moby-Dick', 17, 3, 19],
            ['Catch-22', 33, 68, 15],
            ["The Hitchhiker's Guide to the Galaxy", 76, 77, 4],
            ['The Bell Jar', 65, 23, 58],
            ['Beloved', 41, 18, 85],
            ['Slaughterhouse-Five', 53, 77, 52],
            ['The Picture of Dorian Gray', 28, 20, 81],
            ['Crime and Punishment', 60, 57, 72],
            ['War and Peace', 89, 18, 13]
        ];
        $extra= "Lorem Ipsum is simply dummy text of the printing and typesetting industry.
         Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
         when an unknown printer took a galley of type and scrambled it to make a type specimen book.
         It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
          It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and
           more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum";

        foreach ($books as $book) {
            Book::create([
                'title' => $book[0],
                'author' => $book[1],
                'genre' => $book[2],
                'quantity' => $book[3],
                'cId' => 1,
                'uId' => 1,
                'Extra' => $extra,
            ]);
        }
    }
}
