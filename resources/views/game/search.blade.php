@extends('layouts.main')

@section('title')
    Search Results
@endsection
<title align="center">Search Results</title>
@section('content')
<body style="background-color:rgb(151, 208, 223);">
    <div class="text-end mb-3" align="right" >
        <a href="{{ route('games')}}" class="button">Back to All Games </a>
    </div>
    @if($results_search)
    <h3>   Search For: {{$search}} </h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Total Results: {{$results_search->count()}} </th>
        </tr>
        </thead>
        <tbody>
            @foreach($results_search as $searched)
            <tr>
                <td>
                    <strong style="font-size:20px;">
                        <a href="{{ route('games.show', ['id' => $searched->id ])}}" style="color: #570a46c9">{{$searched->name}} </a></strong>
                    <br/>
                </td>    
            </tr>
            @endforeach

        </tbody>
    </table>
    @endif
    @if($category)
    <h3>   Category Results: {{$category->name}} </h3>
    <div class="text-end mb-3">
   <table class="table table-striped">
        <thead>
        <tr>
            <th>Total Results: {{$results_category->count()}} </th>
        </tr>
        </thead>
        <tbody>
            @foreach($results_category as $cResult)
            <tr>
                <td>
                    <strong style="font-size:20px;">
                        <a href="{{ route('games.show', ['id' => $cResult->id ])}}" style="color: #570a46c9">{{$cResult->name}} </a></strong>
                    <br/>
                </td>    
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    @endif

</body>
@endsection