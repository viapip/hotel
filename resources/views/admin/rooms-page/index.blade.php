@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Roomspage</div>
                    <div class="card-body">
                        <a href="{{ route('admin.rooms-page.create') }}" class="btn btn-success btn-sm" title="Add New RoomsPage">
                            <i class="fa fa-plus" aria-hidden="true"></i> Create
                        </a>

                        <form method="GET" action="{{ url('/admin/rooms-page') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Title</th><th>Banner</th><th>Title Seo</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roomspage as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td><td><img src="{{ asset($item->banner) }}" width="200px" alt=""></td><td>{{ $item->title_seo }}</td>
                                        <td>

                                            {{--<a href="{{ url('/admin/rooms-page/' . $item->id) }}" title="Просмотр RoomsPage"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</button></a>--}}
                                            <a href="{{ url('/admin/rooms-page/' . $item->id . '/edit') }}" title="Edit RoomsPage"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/rooms-page' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete RoomsPage" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $roomspage->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
