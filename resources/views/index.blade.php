<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Collection - Sabela Midterm Exam</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .header h1 {
            font-size: 3rem;
            color: white;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .header p {
            color: rgba(255,255,255,0.9);
            font-size: 1.2rem;
        }

        .movies-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .movie-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .movie-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .movie-cover {
            height: 400px;
            background: linear-gradient(45deg, #3498db, #9b59b6);
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .movie-info {
            padding: 1.5rem;
        }

        .movie-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .movie-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
            color: #666;
            font-size: 0.9rem;
        }

        .movie-year {
            background: #3498db;
            color: white;
            padding: 0.2rem 0.5rem;
            border-radius: 5px;
        }

        .movie-rating {
            background: #f1c40f;
            color: #333;
            padding: 0.2rem 0.5rem;
            border-radius: 5px;
            font-weight: bold;
        }

        .movie-director {
            color: #7f8c8d;
            font-style: italic;
            margin-bottom: 0.5rem;
        }

        .movie-genre {
            display: inline-block;
            background: #ecf0f1;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            color: #666;
            margin-bottom: 1rem;
        }

        .movie-description {
            color: #555;
            line-height: 1.6;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .movie-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #27ae60;
            margin-bottom: 1rem;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            width: 100%;
            text-align: center;
        }

        .btn:hover {
            background: #2980b9;
        }

        .footer {
            text-align: center;
            margin-top: 3rem;
            color: rgba(255,255,255,0.8);
            padding: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Movie Collection</h1>
            <p>Discover our selection of cinematic masterpieces</p>
        </div>

        <div class="movies-grid">
            @foreach($products as $product)
            <div class="movie-card">
                <div class="movie-cover">
                    {{ substr($product['title'], 0, 2) }}
                </div>
                <div class="movie-info">
                    <h2 class="movie-title">{{ $product['title'] }}</h2>
                    
                    <div class="movie-meta">
                        <span class="movie-year">{{ $product['year'] }}</span>
                        <span class="movie-rating">⭐ {{ $product['rating'] }}/10</span>
                    </div>

                    <div class="movie-director">Directed by: {{ $product['director'] }}</div>
                    
                    <div class="movie-genre">{{ $product['genre'] }}</div>
                    
                    <p class="movie-description">{{ $product['description'] }}</p>
                    
                    <div class="movie-price">${{ number_format($product['price'], 2) }}</div>
                    
                    <button class="btn">Add to Cart</button>
                </div>
            </div>
            @endforeach
        </div>

        <div class="footer">
            <p>&copy; 2026 Sabela Midterm Exam Application. All rights reserved.</p>
        </div>
    </div>
</body>
</html>