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
    <h2>Deleted Items</h2><br>
    {{--Show success message if restore/delete action was successful--}}
    @if(session('success'))
        <div style="color: green;">{{session('success')}}</div>
    @endif
    {{--Check if current user is admin--}}
    @if(auth()->user()->role==='admin')
        @if($deletedItems->isEmpty())
            <p>No deleted items.</p>
        {{--Show deleted item in table--}}
        @else
            <table>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Deleted At</th>
                    <th></th>
                </tr>
                {{--Loop through each deleted item--}}
                @foreach($deletedItems as $item)
                    <tr>
                        <td>{{$item->itemname}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->deleted_at->format('Y-m-d H:i')}}</td>
                        {{--Restore button--}}
                        <td><form action="{{route('items.restore',$item->id)}}" method="POST" onsubmit="return confirm('Restore this item?');" style="display: inline-block;">
                            @csrf
                            <button type="submit" style="background: none; border: none;"><img src="{{asset('restore.png')}}" width="25"></button></form>
                            {{--Permanent delete button--}}
                            <form action="{{route('items.forceDelete',$item->id)}}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none;"><img src="{{asset('bin.png')}}" width="25"></button></form>
                        </td>
                    </tr>
                    @endforeach
            </table>
            @endif
            {{--In case the user is not admin--}}
            @else
            <p>You are not authorized to view this page.</p>
           @endif
</div>
</main>
</body>
@endsection