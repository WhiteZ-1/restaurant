<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RestaurantController extends Controller
{
    public function home(){
        return view('pages.home' , ['menuItems' => Menu::all()]);
    }
    public function menu(){
        return view('pages.menu_page' , [
            'menuItems'=>Menu::all(),
            'allItems' => Menu::all()
        ]);
    }
    public function reservation(){
        $availableTables = Table::where('is_reserved', false)->get();
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('pages.reservation_page' , [ 
            'tables'=> $availableTables,
            'min_date' => Carbon::today(),
            'max_date' => Carbon::now()->addWeek()
         ]);
    }

    public function show($category)
    {
        $menuItems = Menu::where('category', $category)->get();
        return view('pages.menu_page', [
            'menuItems' => $menuItems,
            'allItems' => Menu::all()
    ]);
    }

    public function contact(){
        return view('pages.contact');
    }
    public function send(Request $request){

        Mail::to("zarar2018@gmail.com")->send(new ContactMail($request));

        return redirect()->route('contact');
    }

    public function create(Request $request)
    {   
        // dd($request->input());
        $incoming = $request->validate([
            'name' => 'required|unique:reservations',
            'phone_number' => 'required',
            'reservation_datetime' => 'required|date',
            'num_of_guests' => 'required|integer|min:1',
            'table_id' => 'required|min:1'
        ],[
            "table_id"=>'Check Seats!'
        ]);
        // Check if there are available tables
        if (!$this->checkTableAvailability()) {
            return redirect()->route('reservation')->with('error', 'Sorry, all tables are reserved at the selected time.');
        }

        $selectedTable = Table::find($request->input('table_id'));
        $selectedTable->update([
            'is_reserved' => true,
            'table_res_datetime'=> $incoming['reservation_datetime']
        ]);

        // Create the reservation

        Reservation::create($incoming);

        return redirect()->route('reservation')->with('success' , "Table has been reserved");

    }

    private function checkTableAvailability()
    {
        // You can customize this logic based on your specific requirements
        $totalTables = 8;
        $reservedTables = Reservation::where('reservation_datetime', request('reservation_datetime'))
            ->count();

        return $reservedTables < $totalTables;
    }

}

