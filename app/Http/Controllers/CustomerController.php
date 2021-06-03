<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
   
    public function getCustomer(){
        $customer = Customer::latest()->get();
        return $customer;
    }

    public function createCustomer(Request $request, $user_type){
        if($user_type == "OWNER"){
            $customer = new Customer();
            $customer->name = $request->name;        
            $customer->email = $request->email;
            $customer->password = $request->password;
            $customer->phone = $request->phone;
            $customer->save();
        return "Successfully saved ";
        }
        else{
            return "User type is not allowed to create customer"; 
        }
    }

    public function deleteCustomer($user_type,$id){
        if($user_type == "MANAGER"){
            Customer::destroy($id);
            return "Succesfully deleted";
        } 
        else {
            return "Not Succesfully deleted";
        }
    }

    public function editCustomer(Request $request,$user_type, $id){
        if($user_type == "MANAGER"){
            $customer = Customer::findOrFail($id);
            $customer->update($request->all());
            return $customer;
        } 
        else {
            return "Not updated yet";
        }
    }
}
