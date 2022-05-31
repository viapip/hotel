@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">RoomsPage {{ $roomspage->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/rooms-page') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/rooms-page/' . $roomspage->id . '/edit') }}" title="Редактировать RoomsPage"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Редактировать</button></a>

                        <form method="POST" action="{{ url('/admin/roomspage' . '/' . $roomspage->id) }}" accept-charset="UTF-8" style="display:inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm" title="Удалить RoomsPage" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Удалить</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $roomspage->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $roomspage->title }} </td></tr><tr><th> Banner </th><td> {{ $roomspage->banner }} </td></tr><tr><th> Title Seo </th><td> {{ $roomspage->title_seo }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
