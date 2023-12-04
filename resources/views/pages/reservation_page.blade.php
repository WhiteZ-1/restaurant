@extends('layout')
@section('content')
    <div class='reservation-page'>
        <h1>Reservation</h1>
        <div class="reservation-info">
            <form class="reservation_fields" action="/reservation" method="post">
                @csrf
                <label for="name" >Name: </label><br/>
                <input type="text" name="name" value="{{old('name')}}"><br/>
                <span class="error"><strong>@error('name') {{$message}} @enderror</strong></span>
        

                <label for="phone">Phone Number: </label><br/>
                <input type="tel" value="{{old('phone_number')}}" name="phone_number"/><br/>
                <span class="error"><strong>@error('phone_number') {{$message}} @enderror</strong></span>


                <label for="reservation_datetime">Date and Time of Reservation: </label><br/>
                <input type="datetime-local" id="reservation_datetime" name="reservation_datetime"
                    min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                    max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                    value="{{old('reservation_datetime')}}"
                    /><br/>
                <span class="error"><strong>@error('reservation_datetime') {{$message}} @enderror</strong></span>

                <label for="num_of_guests">Party Size:</label><br>
                <input type="number" name="num_of_guests"
                 value="{{old('num_of_guests')}}" ><br/>
                 <span class="error"><strong>@error('num_of_guests') {{$message}} @enderror</strong></span>

                <label for="table_id">Available Tables</label><br/>
                @if($tables->isEmpty())
                    <p>No tables are currently available.</p>
                @else
                <select name="table_id">
                    @foreach ($tables as $table)
                            <option value={{$table->id}}>{{$table->table_seats}} Seats Table</option>
                    @endforeach
                @endif
                </select>
                @if(session()->has('error'))
                    <div class="error">
                        <strong>{{ session()->get('error') }}</strong>
                    </div>
                @endif
                @if(session()->has('success'))
                    <div class="alert_success">
                        <strong>{{ session()->get('success') }}</strong>
                    </div>
                @endif
                <input class="submit" type="submit">
            </form>
        </div>
    </div>
@endsection