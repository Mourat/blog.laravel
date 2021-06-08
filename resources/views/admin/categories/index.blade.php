@extends('admin.layouts.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Category list</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add new</a>
                @if ( count($categories) )
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm float-left mr-1"><i class="fas fa-pencil-alt fa-fw"></i></a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="post" class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Please confirm removing')"><i class="fas fa-trash fa-fw"></i></button>
                                    </form>
                                    <a href="#"></a>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                @else
                    <p>There is not categories yet.</p>
                @endif
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <nav aria-label="Page navigation example">
                    {{ $categories->links() }}
                </nav>
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
