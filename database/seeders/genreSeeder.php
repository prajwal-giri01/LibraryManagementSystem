<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class genreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            'Fantasy',
            'Novel',
            'Adventure',
            'Science Fiction',
            'Mystery',
            'Thriller',
            'Romance',
            'Historical Fiction',
            'Horror',
            'Biography',
            'Autobiography',
            'Memoir',
            'Crime',
            'Suspense',
            'Young Adult',
            'Children',
            'Dystopian',
            'Action',
            'Comedy',
            'Satire',
            'Western',
            'Erotica',
            'Self-Help',
            'Cookbook',
            'Travel',
            'Science',
            'Philosophy',
            'Psychology',
            'Business',
            'Finance',
            'Economics',
            'Politics',
            'Sociology',
            'Anthropology',
            'History',
            'Art',
            'Music',
            'Film',
            'Theater',
            'Photography',
            'Fashion',
            'Architecture',
            'Design',
            'Crafts',
            'Gardening',
            'DIY',
            'Health',
            'Fitness',
            'Nutrition',
            'Medicine',
            'Wellness',
            'Spirituality',
            'Religion',
            'Esoteric',
            'Occult',
            'Paranormal',
            'UFOs',
            'Astrology',
            'Tarot',
            'Mythology',
            'Folklore',
            'Fairy Tale',
            'Legend',
            'Fable',
            'Short Stories',
            'Poetry',
            'Drama',
            'Classic',
            'Literary Fiction',
            'Experimental',
            'Absurdist',
            'Magical Realism',
            'Post-Apocalyptic',
            'Steampunk',
            'Cyberpunk',
            'Alternate History',
            'Time Travel',
            'Hard Science Fiction',
            'Soft Science Fiction',
            'Space Opera',
            'Military Science Fiction',
            'Biopunk',
            'Nanopunk',
            'Cli-fi',
            'Apocalyptic',
            'Gothic',
            'Neo-noir',
            'Legal Thriller',
            'Medical Thriller',
            'Political Thriller',
            'Psychological Thriller',
            'Techno-thriller',
            'Adventure Thriller',
            'Survival',
            'Nature',
            'Environmental',
            'Animal',
            'Plant',
            'Conservation',
            'Ecology',
            'Climate Change'
        ];

        foreach($genres as $genre){
        Genre::create([
            'name'=> $genre,
            'cId'=>1,
            'uId'=>1,
        ]);}
    }

}
