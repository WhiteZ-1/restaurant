<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class AdminController extends Controller
{   
    public function index(){
        return view("admin.MenuItems" , ['menuItems' => Menu::all()]);
    }
    
    public function reservation(){
        return view("admin.Reservation" , ['reservations' => Reservation::all()]);
    }
    public function table(){
        return view("admin.Table" , ['tables' => Table::all()]);
    }
}
