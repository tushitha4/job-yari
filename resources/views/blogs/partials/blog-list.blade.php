@foreach($blogs as $blog)
    <div class="col-lg-4 col-md-6 mb-4">
        <div class="blog-card">
            @if($blog->image)
                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
            @else
                <div style="height: 250px; background: linear-gradient(135deg, #667eea, #764ba2); display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-image fa-3x text-white"></i>
                </div>
            @endif
            <div class="blog-card-body">
                <span class="blog-category">{{ $blog->category }}</span>
                <a href="{{ route('blogs.show', $blog->slug) }}" class="blog-title">
                    {{ $blog->title }}
                </a>
                <p class="blog-description">{{ $blog->short_description }}</p>
                <div class="blog-meta">
                    <span><i class="fas fa-calendar me-1"></i>{{ $blog->date->format('M d, Y') }}</span>
                    <a href="{{ route('blogs.show', $blog->slug) }}" class="btn btn-sm btn-outline-primary">
                        Read More <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
