@extends('admin.admin_layout')
@section('admin_content')
    <div class="admin_index_page">
        <h2>Current Reservations</h2>
        <div class="menuItems">
        @if($reservations->isEmpty())
            <h2 style="margin-top: 3rem">No tables are currently Reserved.</h2>
        @else
            @foreach ($reservations as $reservation)
            <div class="each_menu_Items">
                <div>
                    <p>{{$reservation->name}}</p>
                    <p>Time: {{$reservation->reservation_datetime}}</p>
                </div>
                <div>
                    <p>{{$reservation->table->table_name}}</p>
                </div>
                <div class="menuItems_btn">
                    <form action="/delete-reservation/{{$reservation->id}}" method="POST">
                        @csrf
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </div>
            <hr>
            @endforeach
        @endif
    </div>
    </div>
@endsection