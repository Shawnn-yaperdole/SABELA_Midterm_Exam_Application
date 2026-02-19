<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product['title'] }} - Sabela Movie Collection</title>
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
            max-width: 1000px;
            margin: 0 auto;
        }

        .back-link {
            margin-bottom: 2rem;
        }

        .back-link a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: rgba(255,255,255,0.1);
            border-radius: 5px;
            transition: background 0.3s;
        }

        .back-link a:hover {
            background: rgba(255,255,255,0.2);
        }

        .movie-details {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 2rem;
        }

        .movie-cover {
            height: 100%;
            min-height: 500px;
            position: relative;
            overflow: hidden;
            background: linear-gradient(45deg, #3498db, #9b59b6);
        }

        .movie-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .movie-cover-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 4rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .movie-info {
            padding: 2rem 2rem 2rem 0;
        }

        .movie-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }

        .movie-meta {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .movie-year {
            background: #3498db;
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 5px;
            font-weight: bold;
        }

        .movie-rating {
            background: #f1c40f;
            color: #333;
            padding: 0.3rem 1rem;
            border-radius: 5px;
            font-weight: bold;
        }

        .movie-director {
            font-size: 1.2rem;
            color: #7f8c8d;
            font-style: italic;
            margin-bottom: 1rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #ecf0f1;
        }

        .movie-genre {
            display: inline-block;
            background: #ecf0f1;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-size: 1rem;
            color: #666;
            margin-bottom: 1.5rem;
        }

        .movie-description {
            color: #555;
            line-height: 1.8;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        .movie-price {
            font-size: 2rem;
            font-weight: bold;
            color: #27ae60;
            margin-bottom: 2rem;
            padding: 1rem 0;
            border-top: 2px dashed #ecf0f1;
            border-bottom: 2px dashed #ecf0f1;
        }

        .button-group {
            display: flex;
            gap: 1rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 1rem 2rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s;
            flex: 1;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #2c3e50;
            color: white;
        }

        .btn-secondary:hover {
            background: #34495e;
            transform: translateY(-2px);
        }

        .image-format {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background: rgba(0,0,0,0.7);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.8rem;
            text-transform: uppercase;
            z-index: 1;
        }

        @media (max-width: 768px) {
            body {
                padding: 1rem;
            }

            .movie-details {
                grid-template-columns: 1fr;
            }

            .movie-info {
                padding: 2rem;
            }

            .movie-cover {
                min-height: 300px;
            }

            .movie-title {
                font-size: 2rem;
            }

            .button-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="back-link">
            <a href="{{ route('products.index') }}">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Back to Movie Collection
            </a>
        </div>

        <div class="movie-details">
            <div class="movie-cover">
                @if(isset($product['cover_image']) && $product['cover_image'])
                    <img 
                        src="{{ $product['cover_image'] }}" 
                        alt="{{ $product['title'] }}"
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
                <h1 class="movie-title">{{ $product['title'] }}</h1>
                
                <div class="movie-meta">
                    <span class="movie-year">{{ $product['year'] }}</span>
                    <span class="movie-rating">⭐ {{ number_format($product['rating'], 1) }}/10</span>
                </div>

                <div class="movie-director">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline; margin-right: 8px;">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    Directed by {{ $product['director'] }}
                </div>
                
                <span class="movie-genre">{{ $product['genre'] }}</span>
                
                <p class="movie-description">{{ $product['description'] }}</p>
                
                <div class="movie-price">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="display: inline; margin-right: 8px;">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 6v6l4 2"></path>
                    </svg>
                    ${{ number_format($product['price'], 2) }}
                </div>

                <div class="button-group">
                    <button class="btn btn-primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                        Add to Cart
                    </button>
                    <button class="btn btn-secondary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4v16h16"></path>
                            <polyline points="20 10 12 18 8 14"></polyline>
                        </svg>
                        Add to Wishlist
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>