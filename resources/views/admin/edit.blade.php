@extends('admin.admin_layout')
@section('admin_content')
    <div class="admin_menu_page">
        <h2>Enter Menu Dishes</h2>
        <div class="menu_form">
            <form class="admin_menu_dish_add" action="/edit/{{$item->id}}" method="post" >
            @csrf
            <label for="name" >Name: </label>
            <input type="text" name="name" id="name" value ="{{$item->name}}">
            <label for="price">Price: </label>
            <input type="text"  name="price" id="price" value ="{{$item->price}}">
            <label for="category">Category: </label>
            <input type="text" name="category" id="category" value ="{{$item->category}}">
            <label for="description">Description: </label>
            <textarea name="description" id="description">{{$item->description}}</textarea>
            <label for="chef_recommend">Chef Recommend</label>
            <select value ="{{$item->chef_recommend}}" class="chef_recommend_option" name="chef_recommend" id="chef_recommend">
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>
            <input class="submit" type="submit" value="Save Dish">
        </div>
    </div>
@endsection