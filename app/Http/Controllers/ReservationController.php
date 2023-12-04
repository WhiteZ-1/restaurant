<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.AddTable');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incoming = $request->validate([
            'table_name'=> 'required',
            'table_seats'=> 'required'
        ]);

        $incoming['table_name'] = strip_tags($incoming['table_name']);

        Table::create($incoming);

        return redirect('/dashboard/create-table');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reservation = Reservation::findOrFail($id);
        $table = Table::findOrFail($reservation->table->id);
        $table->update(['is_reserved'=>false]);
        $reservation->delete();
        return redirect()->route('admin.Reservation');
    }
}
