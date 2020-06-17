<?php

namespace App\Http\Controllers\Items;

use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Item as ResourcesItem;

class ApiController extends Controller
{
    public function index()
    {
        return ResourcesItem::collection(Item::all())
        ->additional(['meta' => [
            'item_id' => Item::latest()->first()->id
        ]]);   
    }
    
    public function store(Request $request)
    {
        $request->merge([
            'created_at' => date("Y-m-d", strtotime(request('created_at')))
        ]);
        return new  ResourcesItem(Item::create($request->all()));
    }

    public function update(Request $request, Item $item)
    {   
        $request->merge([
            'updated_at' => date("Y-m-d", strtotime(request('created_at')))
        ]);
        $item->update($request->all());
        $item->save();
    
        return new ResourcesItem($item);
    }

    public function destroy(Item $item, Request $request)
    {
        $item->delete();
        return new ResourcesItem($item);
    }
}
