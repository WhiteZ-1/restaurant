<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function destroy($id){
        $table = Table::findOrFail($id);
        $table->delete();
        return redirect()->route('admin.Table');
    }
}
