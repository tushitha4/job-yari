<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }} - BlogYaari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --text-dark: #2d3748;
            --text-light: #718096;
            --bg-light: #f7fafc;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.8;
            color: var(--text-dark);
            background-color: var(--bg-light);
        }

        /* Header Styles */
        .navbar {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white !important;
        }

        .navbar-brand i {
            margin-right: 10px;
        }

        /* Blog Header */
        .blog-header {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 60px 0;
            text-align: center;
        }

        .blog-category {
            display: inline-block;
            background: rgba(255,255,255,0.2);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: bold;
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
        }

        .blog-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            line-height: 1.3;
        }

        .blog-meta {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .blog-meta i {
            margin-right: 8px;
        }

        /* Blog Content */
        .blog-content {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.1);
            padding: 40px;
            margin: -30px auto 50px;
            position: relative;
            z-index: 10;
        }

        .blog-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 30px;
        }

        .blog-body {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-dark);
        }

        .blog-body h1,
        .blog-body h2,
        .blog-body h3,
        .blog-body h4,
        .blog-body h5,
        .blog-body h6 {
            color: var(--text-dark);
            margin-top: 30px;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .blog-body h2 {
            font-size: 1.8rem;
            border-bottom: 3px solid var(--primary-color);
            padding-bottom: 10px;
        }

        .blog-body h3 {
            font-size: 1.5rem;
        }

        .blog-body p {
            margin-bottom: 20px;
        }

        .blog-body ul,
        .blog-body ol {
            margin-bottom: 20px;
            padding-left: 30px;
        }

        .blog-body li {
            margin-bottom: 10px;
        }

        .blog-body blockquote {
            border-left: 4px solid var(--primary-color);
            padding-left: 20px;
            margin: 30px 0;
            font-style: italic;
            color: var(--text-light);
            background: var(--bg-light);
            padding: 20px;
            border-radius: 5px;
        }

        .blog-body img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 20px 0;
        }

        /* Related Posts */
        .related-posts {
            background: white;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.1);
            margin-bottom: 50px;
        }

        .related-post-card {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 20px;
            transition: all 0.3s ease;
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .related-post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            color: inherit;
            text-decoration: none;
        }

        .related-post-title {
            font-weight: bold;
            color: var(--text-dark);
            margin-bottom: 10px;
        }

        .related-post-meta {
            color: var(--text-light);
            font-size: 0.9rem;
        }

        /* Back to Blogs Button */
        .back-button {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: bold;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            margin-bottom: 30px;
        }

        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
            color: white;
            text-decoration: none;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            color: white;
            padding: 50px 0 30px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .blog-title {
                font-size: 2rem;
            }
            
            .blog-content {
                padding: 25px;
                margin: -20px 15px 30px;
            }
            
            .blog-image {
                height: 250px;
            }
            
            .blog-body {
                font-size: 1rem;
            }
            
            .related-posts {
                padding: 25px;
                margin: 0 15px 30px;
            }
        }

        @media (max-width: 576px) {
            .blog-header {
                padding: 40px 0;
            }
            
            .blog-title {
                font-size: 1.8rem;
            }
            
            .blog-content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('blogs.index') }}">
                <i class="fas fa-blog"></i>BlogYaari
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blogs.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Blog Header -->
    <div class="blog-header">
        <div class="container">
            <span class="blog-category">{{ $blog->category }}</span>
            <h1 class="blog-title">{{ $blog->title }}</h1>
            <div class="blog-meta">
                <i class="fas fa-calendar"></i> {{ $blog->date->format('F d, Y') }}
                @if($blog->created_at)
                    <span class="ms-3"><i class="fas fa-clock"></i> Published {{ $blog->created_at->diffForHumans() }}</span>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Back Button -->
                <a href="{{ route('blogs.index') }}" class="back-button">
                    <i class="fas fa-arrow-left me-2"></i> Back to Blogs
                </a>

                <!-- Blog Content -->
                <div class="blog-content">
                    @if($blog->image)
                        <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="blog-image">
                    @endif
                    
                    <div class="blog-body">
                        {!! $blog->content !!}
                    </div>
                </div>

                <!-- Related Posts (Optional - can be enhanced later) -->
                @if(false) <!-- Disabled for now, can be enabled with related posts logic -->
                <div class="related-posts">
                    <h3 class="mb-4">Related Posts</h3>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <a href="#" class="related-post-card">
                                <div class="related-post-title">Sample Related Post 1</div>
                                <div class="related-post-meta">
                                    <i class="fas fa-calendar me-1"></i> January 15, 2024
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 mb-3">
                            <a href="#" class="related-post-card">
                                <div class="related-post-title">Sample Related Post 2</div>
                                <div class="related-post-meta">
                                    <i class="fas fa-calendar me-1"></i> January 10, 2024
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4>BlogYaari</h4>
                    <p>Your platform for amazing stories and insights</p>
                    <div class="mt-3">
                        <a href="{{ route('admin.login') }}" class="btn btn-outline-light btn-sm">
                            <i class="fas fa-cog me-1"></i>Admin Panel
                        </a>
                    </div>
                    <hr class="my-4" style="border-color: rgba(255,255,255,0.3);">
                    <p class="mb-0">&copy; {{ date('Y') }} BlogYaari. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
</body>
</html>
