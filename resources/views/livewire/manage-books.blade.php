<div>
    @include('livewire.manageBookModal')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><span class="fa fa-book"></span> Books</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Book</li>
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
                    <h3 class="card-title">All Book (s)</h3>
                    <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addbook"><span
                            class="fa fa-plus"> Add book</span></button>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S/No</th>
                                <th>Book Title</th>
                                <th>Book Author</th>
                                <th>Book Type</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $index => $book)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $book->booktitle }}</td>
                                    <td>{{ $book->bookauthor }} </td>
                                    <td>{{ $book->booktype }}</td>
                                    <td>{{ $book->user->full_name }} -
                                        <small>{{ $book->user->created_at->diffForHumans() }}</small></td>
                                    <td>

                                        <button type="button" data-toggle="modal" data-target="#updatesubject"
                                            class="btn btn-sm btn-info"><span class="fa fa-folder"></span> view</button>
                                        <button type="button" data-toggle="modal" data-target="#editbook"
                                            class="btn btn-sm btn-primary"><span class="fa fa-edit"></span> edit</button>
                                        <button type="button" data-toggle="modal" data-target="#deletesubject"
                                            class="btn btn-sm btn-danger"><span class="fa fa-trash"></span> trash</button>

                                    </td>
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
