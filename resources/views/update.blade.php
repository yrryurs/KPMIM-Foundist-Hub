@extends('layouts.app') {{--Extend main layout from app.blade.php--}}
@section('content')
<main>
    <div class="box">
        <h2>Edit Item</h2><br>
        {{--Display validation error--}}
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{--Form to update an existing item--}}
        <form action="{{route('items.update', $item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{--Use PUT method for updating the item--}}
            <table> 
                <tr>
                    <th>Item Name</th>
                    <td><input type="text" name="itemname" value="{{old('itemname',$item->itemname)}}" required></td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td><select name="category_id" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}"{{old('category_id', $item->category_id)==$category->id ?'selected':''}}>{{$category->name}}</option>
                        @endforeach
                    </select></td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td><input type="text" name="description" value="{{old('description',$item->description)}}" required></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <select name="status" required>
                            <option value="lost" {{$item->status=='lost'?'selected':'' }}>Lost</option>
                            <option value="found" {{$item->status=='found'?'selected':'' }}>Found</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Location</th>
                    <td><input type="text" name="location" value="{{old('location',$item->location)}}" required></td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td><input type="date" name="date" value="{{old('date',$item->date)}}" required></td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        @if ($item->image)
                            {{--Display current image--}}
                            <img src="{{asset('storage/'.$item->image)}}" width="80"><br>
                            {{--Option to delete current image--}}
                            <label><input type="checkbox" name="deleteImage" value="1">Delete image</label><br><br>
                        @endif
                        {{--New image upload input--}}
                        <input type="file" name="image" accept="image/*">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <br>
                        <button type="submit">Update</button>
                        <a href="{{ route('items.view') }}">Cancel</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</main>
@endsection