@extends('admin.admin_layout')
@section('admin_content')
    <div class="admin_index_page">
        <h2>Current MenuItems</h2>
        <div class="menuItems">
        @foreach ($menuItems as $item)
        <div class="each_menu_Items">
            <div>
                <p>{{$item->name}}</p>
                <p>Price: ${{$item->price}}</p>
                </div>
            <div class="menuItems_btn">
                <form action="/edit/{{$item->id}}">
                    @csrf
                    <button type="submit">Edit</button>
                </form>
                <form action="/delete/{{$item['id']}}" method="POST">
                    @csrf
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>
        <hr>
        @endforeach
    </div>
    </div>
@endsection