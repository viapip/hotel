@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Aboutpage</div>
                    <div class="card-body">
                        <a href="{{ route('admin.about-page.create') }}" class="btn btn-success btn-sm" title="Add New AboutPage">
                            <i class="fa fa-plus" aria-hidden="true"></i> Create
                        </a>

                        <form method="GET" action="{{ url('/admin/about-page') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>#</th><th>Title</th><th>Description</th><th>Description Bottom</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($aboutpage as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <style>
                                            .descr-admin img{
                                                width: 100%;
                                            }
                                        </style>
                                        <td>{{ $item->title }}</td><td class="descr-admin" style="max-width: 300px">{!! $item->description !!}</td><td>{{ $item->description_bottom }}</td>
                                        <td>

                                            {{--<a href="{{ url('/admin/about-page/' . $item->id) }}" title="Просмотр AboutPage"><UI class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</UI></a>--}}
                                            <a href="{{ url('/admin/about-page/' . $item->id . '/edit') }}" title="Edit AboutPage"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/about-page' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete AboutPage" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $aboutpage->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
