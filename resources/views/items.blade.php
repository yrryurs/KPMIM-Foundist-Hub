@extends('layouts.app') {{--Extend main layout from app.blade.php--}}
@section('content')
<head>
    <script>
        //Validation form before submission
        function validateForm(){
            const itemName=document.getElementById("itemName").value;
            const desc=document.getElementById("description").value;
            const loc=document.getElementById("location").value;
            if (itemName.length<3 || desc.length<3 || loc.length<3){
                alert("Item name, description, and location must be at least 3 characters");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<main>
    <div class="box">
        <h2>Add Item</h2>
        {{--Form to submit a lost/found item--}}
        <form action="{{route('items.store')}}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            @csrf {{--Token for security--}}
            <table>
                <tr>
                    <td><label for="itemName">Item Name:</label></td>
                    <td><input type="text" name="itemname" id="itemName" required></td>
                </tr>
                <tr>
                    <td>Category</td>
                    {{--Show categories from database "category"--}}
                    <td><select name="category_id">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}"{{old('category_id', $item->category_id ??'')==$category->id?'selected':''}}>
                            {{$category->name}}
                        </option>
                        @endforeach
                    </select></td>
                </tr>
                <tr>
                    <td><label for="description">Description:</label></td>
                    <td><input type="text" name="description" id="description" required></td>
                </tr>
                <tr>
                    <td><label for="status">Status:</label></td>
                    <td>
                        <select name="status" id="status" required>
                            <option value="lost">Lost</option>
                            <option value="found">Found</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="location">Location:</label></td>
                    <td><input type="text" name="location" id="location" required></td>
                </tr>
                <tr>
                    <td><label for="date">Date:</label></td>
                    <td><input type="date" name="date" id="date" required></td>
                </tr>
                <tr>
                    <td><label for="itemImage">Upload Image (optional):</label></td>
                    <td><input type="file" name="image" id="itemImage" accept="image/*"></td>
                </tr><br>
                <tr>
                    <td colspan="2" style='text-align: center;'><br>
                        <button type="submit">Submit</button>
                        <button type="reset">Reset</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</main>
</body>
@endsection