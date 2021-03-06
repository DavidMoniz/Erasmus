<?php

namespace App\Http\Controllers;

use App\Address;
use App\City;
use Illuminate\Http\Request;

class AddressesController extends Controller
{
    public function Add(Request $request){
        $address = new Address;
        $address->name = $request->address;
        $address->city_id = $this->GetCityId($request);
        //$address->city_id = $request->city_id;
        $address->save();
        return $address->id;
    }
//    public function RemoveAddress(Request $request){
//        Address::RemoveAddressbyId($request->id);
//    }
    public function Index(Request $request){
    }
    public function ChangeProperty(Request $request){
        $property = $request->change;
        $address = Address::where('id',$request->id)->get();//Address::GetAddressById($request->id);
        if($property == "name"){
            $address->name=$request->name;
        }else{
            $address->city_id = $this->GetCityId($request);
        }
    }
    private function GetCityId(Request $request){
        $city_result = City::where('name',$request->city)->first();
        if($city_result){
            return $city_result->id;
        }else{
            return app('App\Http\Controllers\CitiesController')->Add($request);
        }
    }
}
