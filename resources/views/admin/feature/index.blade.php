@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Feature</div>
                    <div class="card-body">
                        <a href="{{ route('admin.feature.create') }}" class="btn btn-success btn-sm" title="Add New Feature">
                            <i class="fa fa-plus" aria-hidden="true"></i> Create
                        </a>

                        <form method="GET" action="{{ url('/admin/feature') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Title</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($feature as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>

                                            {{--<a href="{{ url('/admin/feature/' . $item->id) }}" title="Просмотр Feature"><UI class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</UI></a>--}}
                                            <a href="{{ url('/admin/feature/' . $item->id . '/edit') }}" title="Edit Feature"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/feature' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Feature" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $feature->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
