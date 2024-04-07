<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class authorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $authors = [
            'J.K. Rowling',
            'Stephen King',
            'George R.R. Martin',
            'Agatha Christie',
            'J.R.R. Tolkien',
            'Dan Brown',
            'Haruki Murakami',
            'Jane Austen',
            'Mark Twain',
            'Charles Dickens',
            'Leo Tolstoy',
            'Ernest Hemingway',
            'F. Scott Fitzgerald',
            'Gabriel García Márquez',
            'William Shakespeare',
            'Neil Gaiman',
            'Margaret Atwood',
            'Terry Pratchett',
            'Arthur Conan Doyle',
            'Jodi Picoult',
            'James Patterson',
            'Suzanne Collins',
            'John Grisham',
            'Hermann Hesse',
            'Philip Pullman',
            'Roald Dahl',
            'Virginia Woolf',
            'Emily Brontë',
            'Charlotte Brontë',
            'Anne Rice',
            'Toni Morrison',
            'Ursula K. Le Guin',
            'Jorge Luis Borges',
            'Douglas Adams',
            'C.S. Lewis',
            'John Steinbeck',
            'Fyodor Dostoevsky',
            'Homer',
            'Kurt Vonnegut',
            'Ken Follett',
            'Michael Crichton',
            'Aldous Huxley',
            'Jack London',
            'Isaac Asimov',
            'George Orwell',
            'Ayn Rand',
            'Albert Camus',
            'Ray Bradbury',
            'Anton Chekhov',
            'Mikhail Bulgakov',
            'Oscar Wilde',
            'Mario Puzo',
            'Dante Alighieri',
            'Edgar Allan Poe',
            'Jonathan Swift',
            'Jules Verne',
            'H.G. Wells',
            'Robert Louis Stevenson',
            'Daphne du Maurier',
            'Walt Whitman',
            'Sylvia Plath',
            'Jack Kerouac',
            'Nathaniel Hawthorne',
            'Herman Melville',
            'Emily Dickinson',
            'Edith Wharton',
            'Zora Neale Hurston',
            'Ralph Ellison',
            'Harper Lee',
            'Maya Angelou',
            'Chinua Achebe',
            'Isabel Allende',
            'Salman Rushdie',
            'Vladimir Nabokov',
            'Milan Kundera',
            'Jean-Paul Sartre',
            'Franz Kafka',
            'Gustave Flaubert',
            'Lev Tolstoy',
            'Yukio Mishima',
            'Kenzaburo Oe',
            'Natsume Soseki',
            'Banana Yoshimoto',
            'Ryunosuke Akutagawa',
            'Yasunari Kawabata',
            'Kazuo Ishiguro',
            'Orhan Pamuk',
            'Naguib Mahfouz',
            'Ahmed Shawqi',
            'Tawfiq al-Hakim',
            'Kahlil Gibran'
        ];

        foreach ($authors as $author){
    Author::create([
        'name'=>$author,
        'cId'=>1,
        'uId'=>1,
    ]);
}
    }
}
