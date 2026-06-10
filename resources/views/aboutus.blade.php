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
<h2>About Us</h2><br>
<table>
    <tr>
        <th>Email</th>
        <td>lostfoundkpmim@gmail.com</td>
    </tr>
    <tr>
        <th>Location</th>
        <td>Beside parcel room</td>
    </tr>
</table><br>
<h2>Comment</h2><br>
{{--Show success message after a comment is submitted--}}
@if(session('success'))
<p style="color: green;">{{session('success')}}</p>
@endif
@auth
{{--If user is a regular user, show comment form--}}
@if(auth()->user()->role==='user')
<form action="{{route('comments.store')}}" method="POST">
  @csrf
  <textarea name="message" rows="4" style="width:100%;" placeholder="Write your comment..." required></textarea><br><br>
  <button type="submit">Submit</button>
</form>
@endif
{{--If user is an admin, display all submitted comments--}}
@if(auth()->user()->role==='admin')
<table>
  <tr>
    <th>User</th>
    <th>Comment</th>
    <th>Time</th>
  </tr>
  {{--Loop through each comment--}}
  @forelse($comments as $comment)
  <tr>
      <td>{{$comment->user->email}}</td>
      <td>{{$comment->message}}</td>
      <td>{{$comment->created_at->format('Y-m-d H:i')}}</td>
  </tr>
  @empty
  <tr>
      <td colspan="3">No comments yet.</td>
  </tr>
  @endforelse
</table>
@endif
@endauth
</div>
</main>
</body>
@endsection