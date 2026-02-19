<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Method to get all movie products
    public function index()
    {
        $products = [
            [
                'id' => 1,
                'title' => 'Orozco the Embalmer',
                'year' => 2001,
                'director' => 'Kiyotaka Tsurisaki',
                'genre' => 'Documentary/Horror/Body Horror',
                'price' => 39.99,
                'description' => 'About the grim work of an embalmer in one of the poorest and most dangerous parts in Colombia.',
                'rating' => 6.7,
                'cover_image' => asset('images/orozco.jfif')
            ],
            [
                'id' => 2,
                'title' => 'Ghost in the Shell/Kôkaku Kidôtai',
                'year' => 1995,
                'director' => 'Mamoru Oshii',
                'genre' => 'Thriller/Sci-Fi/Cyberpunk',
                'price' => 9.79,
                'description' => 'A cyborg policewoman and her partner hunt a mysterious and powerful hacker called the Puppet Master.',
                'rating' => 7.9,
                'cover_image' => asset('images/ghost.jpg')
            ],
            [
                'id' => 3,
                'title' => 'Maquia: When the Promised Flower Blooms',
                'year' => 2018,
                'director' => 'Mari Okada',
                'genre' => 'Fantasy/Drama/Adventure',
                'price' => 14.50,
                'description' => 'Maquia, a teenager, belongs to the Iorph community whose members can live for hundreds of years. But her life changes when the Iorph settlement is invaded and she comes across an orphan.',
                'rating' => 7.4,
                'cover_image' => asset('images/maquia.jpg')
            ],
            [
                'id' => 4,
                'title' => 'Lost and Found',
                'year' => 1996,
                'director' => 'Chi-Ngai Lee',
                'genre' => 'Drama/Romance',
                'price' => 12.99,
                'description' => 'Where is the end of the world? A rich girl diagnosed with leukemia wants to follow a sailor friend to St Kilda, Scotland to find out...but first she must search him out, who is missing.',
                'rating' => 7.2,
                'cover_image' => asset('images/laf.jfif')
            ],
            [
                'id' => 5,
                'title' => 'Pulse',
                'year' => 2001,
                'director' => 'Kiyoshi Kurosawa',
                'genre' => 'Thriller/Horror/Mystery',
                'price' => 8.50,
                'description' => 'Two groups of people discover evidence that suggests spirits may be trying to invade the human world through the Internet.',
                'rating' => 6.6,
                'cover_image' => asset('images/pulse.jfif')
            ],
            [
                'id' => 6,
                'title' => 'Se7en',
                'year' => 1995,
                'director' => 'David Fincher',
                'genre' => 'Tragedy/Crime/Mystery',
                'price' => 9.99,
                'description' => 'Two detectives, a rookie and a veteran, hunt a serial killer who uses the seven deadly sins as his motives.',
                'rating' => 8.6,
                'cover_image' => asset('images/7.jfif')
            ],
        ];

        return view('products.index', compact('products'));
    }

   
    public function show($id)
    {
        $products = [
        ];

        $product = collect($products)->firstWhere('id', $id);

        if (!$product) {
            abort(404);
        }

        return view('products.show', compact('product'));
    }
}