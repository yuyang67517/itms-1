<?php

namespace App\Http\Controllers;
use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class GoodController extends Controller
{
    public function index()
    {
        $goods = Good::all();
        return view('goods.index', compact('goods'));
    }

    public function create()
    {
        return view('goods.create');
    }

    public function store(Request $request)
    {
        // Validation (customize as needed)
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

     // Create a new Good
     Good::create($request->all());

     return redirect()->route('goods.index')
         ->with('success', 'Good created successfully.');
 }

 public function edit(Good $good)
 {
     return view('goods.edit', compact('good'));
 }

 public function update(Request $request, Good $good)
 {
     // Validation (customize as needed)
     $request->validate([
         'name' => 'required|string|max:255',
         'description' => 'required|string',
         'price' => 'required|numeric',
         'quantity' => 'required|integer',
     ]);

     // Update the Good
     $good->update($request->all());

     return redirect()->route('goods.index')
         ->with('success', 'Good updated successfully.');
 }

 public function destroy(Good $good)
 {
     $good->delete();

     return redirect()->route('goods.index')
         ->with('success', 'Good deleted successfully.');
 }
}
