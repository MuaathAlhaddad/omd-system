<?php

namespace App;

use App\Invoice;
use App\ItemCategory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function invoices(){
        return $this.belongsToMany(Invoice::class, 'invoice_item');
    }

    public function itemCategories(){
        return $this->belongsTo(ItemCategory::class, 'item_categories_id');
    }
}
