<x-app-layout>
<div class="pagetitle">
        <h1>{{ __('Dashboard') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                <!-- Add other breadcrumbs if necessary -->
            </ol>
        </nav>
    </div>
    <div class="row">
            <!-- Total Posts Card -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Number of Posts</h5>
                        <p class="card-text">{{ $totalPosts }}</p>
                    </div>
                </div>
            </div>
            <!-- Published Posts Card -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Number of Published Posts</h5>
                        <p class="card-text">{{ $publishedPosts }}</p>
                    </div>
                </div>
            </div>
            <!-- Unpublished Posts Card -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Total Number of Unpublished Posts</h5>
                        <p class="card-text">{{ $unpublishedPosts }}</p>
                    </div>
                </div>
            </div>
        </div>
    
</x-app-layout>
