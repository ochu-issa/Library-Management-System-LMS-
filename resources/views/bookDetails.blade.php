@extends('layout/app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Book Details</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Book Details</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    @if (session('success'))
        <script>
            $(document).ready(function() {
                toastr.success('{{ session('success') }}');
            });
        </script>
    @elseif (session('error'))
        <script>
            $(document).ready(function() {
                toastr.error('{{ session('error') }}');
            });
        </script>
    @endif

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('book.png') }}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $book->booktitle }}</h3>

                            <p class="text-muted text-center">{{ $book->user->created_at->diffForHumans() }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Book Author</b> <a class="float-right">{{ $book->bookauthor }} </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Book Type</b> <a class="float-right">{{ $book->booktype }}</a>
                                </li>
                            </ul>
                            <div class="row">
                                <div class="col col-md-4">
                                    <button class="btn btn-app bg-info" onclick="likeBook('{{ $book->id }}')">
                                        <span class="badge bg-danger">531</span>
                                        <i class="fas fa-heart"></i> Favorites
                                    </button>
                                </div>
                                <div class="col col-md-2"></div>
                                <div class="col col-md-4">
                                    <button class="btn btn-app bg-secondary" onclick="likeBook('{{ $book->id }}')">
                                        <span class="badge bg-danger">531</span>
                                        <i class="fas fa-thumbs-up"></i> Likes
                                    </button>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#timeline"
                                        data-toggle="tab">Description</a></li>
                                <li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">Comments</a>
                                </li>

                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                @include('comment')
                                <!-- /.tab-pane -->
                                <div class=" active tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline item -->
                                        <div>
                                            <div class="timeline-item">
                                                <span class="time"><i
                                                        class="far fa-clock"></i>{{ $book->created_at->format('H:i') }}
                                                </span>

                                                <h3 class="timeline-header"><a href="#"> {{ $book->booktype }}</a>
                                                    Description</h3>

                                                <div class="timeline-body">
                                                    {{ $book->description }}
                                                </div>
                                                <div class="timeline-footer">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- timeline item -->
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>

    <script>
        function likeBook() {
            // Send an AJAX request to the server.
            $.ajax({
                url: '/like',
                method: 'POST',
                data: {
                    // The ID of the book to like
                    bookId: {{ $book->id }},
                },
                success: function(response) {
                    // Update the status of the buttons
                    if (response.success) {
                        // The book was successfully liked
                        $(".btn-app.bg-secondary").html('<span class="badge bg-danger">'
                            '</span> <i class="fas fa-thumbs-up"></i> Likes');
                    } else {
                        // The book was not successfully liked
                        alert('Something went wrong');
                    }
                },
                error: function(error) {
                    // Handle the error
                    alert(error);
                },
            });
        }
    </script>
@endsection
