@extends('admin.admin_layout')
@section('admin_content')
    <div class="admin_menu_page">
        <h2>Enter Table Info</h2>
        <div class="menu_form">
            <form class="admin_menu_dish_add" action="/add-table" method="post" >
            @csrf
            <label for="table_name">Table Name: </label>
            <input type="text" name="table_name" id="table_name">
            <label for="table_seats">Num of Guests</label>
            <select class="chef_recommend_option" name="table_seats" id="table_seats">
                <option value="2">2</option>
                <option value="4">4</option>
                <option value="6">6</option>
                <option value="8">8</option>
            </select>
            <input class="submit" type="submit" value="Save Table">
        </div>
    </div>
@endsection