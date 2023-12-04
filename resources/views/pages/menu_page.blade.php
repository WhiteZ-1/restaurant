@extends('layout')
@section('content')
    <div class="menu-page">
        <div class="menu-hero">
            <h2>Our Menu</h2>
        </div>
        <div class="menu">
            <h2>{{$title ?? 'Chef Recommend'}}</h2>
            <p class="about-menu">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente, consequuntur. Nostrum earum architecto ut illo, delectus repellendus reprehenderit ea tempora hic sed voluptatibus distinctio accusamus aperiam harum excepturi sapiente atque ipsa enim! Ipsa fugit voluptas, quas id praesentium, libero modi culpa dolorem animi esse eum.</p>
            <div class="menu-items">
                @foreach ($menuItems as $item)
                    @if ($item->chef_recommend == 1)
                    <div class="item">
                        <h1>{{$item->name}}<span>${{$item->price}}</span></h1>
                        <p>{{$item->description}}</p>
                    </div>
                    @endif
                @endforeach   
            </div>
        
        </div>
        <div class="menu-2nd-hero">
        </div>
        <div class="menu">
            <h2>{{$title ?? 'Main Course'}}</h2>
            <p class="about-menu">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente, consequuntur. Nostrum earum architecto ut illo, delectus repellendus reprehenderit ea tempora hic sed voluptatibus distinctio accusamus aperiam harum excepturi sapiente atque ipsa enim! Ipsa fugit voluptas, quas id praesentium, libero modi culpa dolorem animi esse eum.</p>
            <div class="menu-items">
                <div class="category">
                    <div class="category_list">
                        <a href="/menu">All</a>
                        @foreach ($allItems as $item)
                            <a href="/menu/{{$item->category}}">{{$item->category}}</a>
                        @endforeach
                    </div>
                    @foreach ($menuItems as $item)
                        <div class="item">
                            <h1>{{$item->name}}<span>${{$item->price}}</span></h1>
                            <p>{{$item->description}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection