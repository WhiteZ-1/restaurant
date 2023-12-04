@extends('admin.admin_layout')
@section('admin_content')
    <div class="admin_index_page">
        <h2>Current Tables</h2>
        <div class="menuItems">
        @foreach ($tables as $table)
        <div class="each_menu_Items">
            <div>
                <p>{{$table->table_name}}</p>
                <p>Capacity: {{$table->table_seats}}</p>
            </div>
            <div class="menuItems_btn">
                <form action="/delete-table/{{$table['id']}}" method="POST">
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