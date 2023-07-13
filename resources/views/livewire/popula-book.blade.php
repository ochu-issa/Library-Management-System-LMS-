<div>
    @include('livewire.managePopulaBookModal')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><span class="fa fa-book-open"></span>Popular Books</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Popular Book</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
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
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Popular Book (s)</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S/No</th>
                                <th>Book Title</th>
                                <th>Likes</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($books as $index => $book)
                                {{-- <p>Book: '{{ $book->booktitle }}', Likes: {{ $book->likes_count }}</p> --}}
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{ $book->booktitle }}</td>
                                    <td>{{ $book->likes_count }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            {{-- your codes comes here --}}
        </div>
    </section>
</div>
