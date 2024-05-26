<x-app-layout>
    <div class="pagetitle">
        <h1>{{ __('Post') }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Resources') }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('message'))
                <div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <script>
                    // Auto dismiss after 5 seconds
                    setTimeout(function () {
                        var alert = document.querySelector(".alert");
                        alert.classList.remove("show");
                        alert.classList.add("hide");
                    }, 5000);
                </script>
                @endif
                <div class="card p-5">
                    <div class="card-body">
                        <div class="text-end">
                            <a href="{{ route('post.create') }}" class="btn btn-primary"><i class="bi bi-file-earmark-plus-fill me-1"></i>Add a New Post</a>
                        </div>
                        <hr class="my-5" />
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Post</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($posts) 
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{$post->subject}}</td>
                                            <td>{{$post->post}}</td>
                                            <td>
                                                @if($post->status == 1)
                                                    <span> Published</span>
                                                @else
                                                    <span> Unpublished</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('post.show', $post) }}" class="btn btn-dark m-1"><i class="bi bi-folder-symlink"></i></a>
                                                <a href="{{ route('post.edit', $post) }}" type="button" class="btn btn-success m-1"><i class="bi bi-pencil-square"></i></a>
                                                <form id="delete-post-form-{{ $post->id }}" action="{{ route('post.destroy', $post) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger m-1" onclick="return confirmDelete();"><i class="bi bi-trash2-fill"></i></button>
                                                </form>
                                                <script>
                                                function confirmDelete() {
                                                    return confirm("Are you sure you want to delete this post?");
                                                }
                                                </script>
                                            </td>
                                        </tr>
                                    @endforeach 
                                @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
