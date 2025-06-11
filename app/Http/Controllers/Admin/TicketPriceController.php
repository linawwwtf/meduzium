<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TicketPrice;
class TicketPriceController extends Controller
{
    public function edit()
    {
        $prices = TicketPrice::firstOrCreate([]);
        return view('admin.ticket-prices.edit', compact('prices'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
        'adult_weekday_price' => 'required|integer|min:0',
        'adult_weekend_price' => 'required|integer|min:0',
        'child_weekday_price' => 'required|integer|min:0',
        'child_weekend_price' => 'required|integer|min:0',
        'group_price' => 'required|integer|min:0',
        'group_min_people' => 'required|integer|min:2',
        'school_group_price' => 'required|integer|min:0',
    ]);

    TicketPrice::firstOrCreate([])->update($validated);

        return back()->with('success', 'Цены успешно обновлены!');
    }
}
