@extends('layouts.app') {{--Extend main layout from app.blade.php--}}
@section('content') 
<head>
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
            border: 2px solid black;
        }
        th,td{
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th{
            background-color: #113c6c;
            color: white;
        }
        p.center-text{
            text-align: center;
        }
    </style>
</head>
<body>
<main>
    <div class="box">
        {{--Lost items section--}}
        <h2>Item Lost</h2><br>
        @if($itemlost->isEmpty())
        <p style="text-align: center;">No lost items yet.</p>
        @else
        <table>
            <tr>
                <th>Item Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Location</th>
                <th>Date</th>
                <th>Image</th>
                <th></th>
            </tr>
            {{--Loop through each item--}}
            @foreach ($itemlost as $item)
            <tr>
                <td>{{$item->itemname}}</td>
                <td>{{$item->category->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->location}}</td>
                <td>{{\Carbon\Carbon::parse($item->date)->format('d F Y')}}</td> {{--Format date--}}
                <td>
                    @if($item->image)
                        <img src="{{asset('storage/'.$item->image)}}" width="80">
                    @else
                        No image
                    @endif
                </td>
                <td>
                    {{--Both admin and user can edit item--}}
                    @if(auth()->user()->role==='user'||auth()->user()->role==='admin') 
                    <a href="{{route('items.edit',$item->id) }}"><img src="{{asset('editing.png')}}" width="25"></a>
                    @endif
                    {{--Only admin can delete item--}}
                    @if(auth()->user()->role==='admin')
                    <form action="{{route('items.destroy',$item->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this item?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none;"><img src="{{asset('bin.png')}}" width="25"></button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    @endif
    </div>
    <div class='box'>
        {{--Found items section--}}
        <h2>Item Found</h2><br>
        @if($itemfound->isEmpty())
        <p style="text-align: center;">No found items yet.</p>
        @else
        <table>
            <tr>
                <th>Item Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Location</th>
                <th>Date</th>
                <th>Image</th>
                <th></th>
            </tr>
            {{--Loop through each item--}}
            @foreach ($itemfound as $item)
            <tr>
                <td>{{$item->itemname}}</td>
                <td>{{$item->category->name}}</td>
                <td>{{$item->description}}</td>
                <td>{{$item->location}}</td>
                <td>{{\Carbon\Carbon::parse($item->date)->format('d F Y')}}</td> {{--Format date--}}
                <td>
                    @if($item->image)
                        <img src="{{asset('storage/'.$item->image)}}" width="80">
                    @else
                        No image
                    @endif
                </td>
                <td>
                    {{--Both admin and user can edit item--}}
                    @if(auth()->user()->role==='user'||auth()->user()->role==='admin') 
                    <a href="{{route('items.edit',$item->id) }}"><img src="{{asset('editing.png')}}" width="25"></a>
                    @endif
                    {{--Only admin can delete item--}}
                    @if(auth()->user()->role==='admin')
                    <form action="{{route('items.destroy',$item->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this item?');">
                        @csrf
                            @method('DELETE')
                        <button type="submit" style="background: none; border: none;"><img src="{{ asset('bin.png') }}" width="25"></button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    @endif
    </div>
</main>
</body>
@endsection