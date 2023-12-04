@extends("layout")
@section("content")
<x-hero/>
<x-about/>
<div class="menu">
    <h2>{{$title ?? 'Have A Quick Look At Our Menu'}}</h2>
    <p class="about-menu">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente, consequuntur. Nostrum earum architecto ut illo, delectus repellendus reprehenderit ea tempora hic sed voluptatibus distinctio accusamus aperiam harum excepturi sapiente atque ipsa enim! Ipsa fugit voluptas, quas id praesentium, libero modi culpa dolorem animi esse eum.</p>
    <div class="menu-items">
        @foreach ($menuItems as $item)
            <div class="item">
                <h1>{{$item->name}}<span>{{$item->price}}</span></h1>
                <p>{{$item->description}}</p>
            </div>
        @endforeach
    </div>
</div>
<x-reservation/>
<x-reviews/>
@endsection