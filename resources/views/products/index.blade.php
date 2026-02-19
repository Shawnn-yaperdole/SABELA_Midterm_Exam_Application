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
            background: linear-gradient(135deg, #1e1e2f 0%, #2a2a40 100%);
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
            display: flex;
            flex-direction: column;
        }

        .movie-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        .movie-cover {
            height: 300px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(45deg, #3498db, #9b59b6);
        }

        .movie-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .movie-card:hover .movie-cover img {
            transform: scale(1.1);
        }

        .movie-cover-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .movie-info {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .movie-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .movie-title a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s;
        }

        .movie-title a:hover {
            color: #3498db;
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
            font-size: 0.95rem;
        }

        .movie-genre {
            display: inline-block;
            background: #ecf0f1;
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.8rem;
            color: #666;
            margin-bottom: 1rem;
            align-self: flex-start;
        }

        .movie-description {
            color: #555;
            line-height: 1.6;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
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
            margin-top: auto;
        }

        .btn:hover {
            background: #2980b9;
        }

        .btn-details {
            background: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .btn-details:hover {
            background: #34495e;
        }

        .image-format {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.7rem;
            text-transform: uppercase;
            z-index: 1;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }
            
            .header h1 {
                font-size: 2rem;
            }
            
            .movies-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1rem;
            }
            
            .movie-cover {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🎬 Sabela Movie Collection</h1>
            <p>Discover our selection of cinematic masterpieces</p>
        </div>

        @if(isset($products) && count($products) > 0)
            <div class="movies-grid">
                @foreach($products as $product)
                <div class="movie-card">
                    <div class="movie-cover">
                        @if(isset($product['cover_image']) && $product['cover_image'])
                            <img 
                                src="{{ $product['cover_image'] }}" 
                                alt="{{ $product['title'] }}"
                                loading="lazy"
                                onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.style.display='flex';"
                            >
                            <div class="movie-cover-placeholder" style="display: none;">
                                {{ substr($product['title'], 0, 2) }}
                            </div>
                            @php
                                $extension = pathinfo($product['cover_image'], PATHINFO_EXTENSION);
                            @endphp
                            @if(!empty($extension))
                                <span class="image-format">{{ strtoupper($extension) }}</span>
                            @endif
                        @else
                            <div class="movie-cover-placeholder">
                                {{ substr($product['title'], 0, 2) }}
                            </div>
                        @endif
                    </div>
                    <div class="movie-info">
                        <h2 class="movie-title">
                            <a href="{{ route('products.show', $product['id']) }}">
                                {{ $product['title'] }}
                            </a>
                        </h2>
                        
                        <div class="movie-meta">
                            <span class="movie-year">{{ $product['year'] }}</span>
                            <span class="movie-rating">⭐ {{ number_format($product['rating'], 1) }}/10</span>
                        </div>

                        <div class="movie-director">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline; margin-right: 4px;">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            {{ $product['director'] }}
                        </div>
                        
                        <span class="movie-genre">{{ $product['genre'] }}</span>
                        
                        <p class="movie-description">{{ $product['description'] }}</p>
                        
                        <div class="movie-price">${{ number_format($product['price'], 2) }}</div>
                        
                        <a href="{{ route('products.show', $product['id']) }}" class="btn btn-details">
                            View Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div style="text-align: center; color: white; padding: 3rem;">
                <h2>No movies found</h2>
            </div>
        @endif

        <div class="footer" style="text-align: center; margin-top: 3rem; color: rgba(255,255,255,0.8);">
            <p>&copy; 2026 Sabela Midterm Exam Application</p>
        </div>
    </div>
</body>
</html>