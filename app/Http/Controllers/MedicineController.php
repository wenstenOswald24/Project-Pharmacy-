<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Medicines;

class MedicineController extends Controller{

    public function getMedicine(){
        $medicines = Medicines::latest()->get();
        return $medicines;
    }

    public function createMedicine(Request $request, $user_type){
        if($user_type == "OWNER"){
            $medicines = new Medicines();
            $medicines->name = $request->name;        
            $medicines->quantity = $request->quantity;
            $medicines->weight = $request->weight;
            $medicines->type = $request->type;
            $medicines->price = $request->price;
            $medicines->save();
        return "Successfully saved ";
        }
        else {
            return "User type = .$uses_type. is not allowed to create medicine"; 
        }
    }

    public function deleteMedicine($user_type,$id){
        if($user_type == "CASHIER"){
            Medicines::destroy($id);
            return "Succesfully deleted";
        } 
        else {
            return "Not Succesfully deleted";
        }
    }

    public function editMedicine(Request $request,$user_type, $id){
        if($user_type == "CASHIER"){
            $medicines = Medicines::findOrFail($id);
            $medicines->update($request->all());
        return $medicines;
        } 
        else {
            return "Not updated yet";
        }
    }
}
