<?php

namespace App\Http\Controllers;
use App\Currency;
use App\Customer;
use App\Company_details;
use Illuminate\Http\Request;
use App\Http\Resources\Currency as ResourcesCurrency;
use App\Http\Resources\Company_details as Company_detailsResource;

class ApiController extends Controller
{
    public function getCompany_details()
    {
        return new Company_detailsResource(Company_details::find(1));
    }
    public function updateCompany_details()
    {
        $company_details = Company_details::find(1);
        $company_details->update(request()->all());
        $company_details->save();
        return new Company_detailsResource($company_details);
    }
    public function getCurrencies(){
        return ResourcesCurrency::collection(Currency::all());
    }

    public function validator($email)
    {
        $exists = Customer::where('email', $email)->exists();

        return response()->json(['unique' => !$exists ]); 
    }
}
