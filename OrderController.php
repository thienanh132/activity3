<?php

namespace App\Http\Controllers;

use App\Services\Business\SecurityService;
use App\Services\Data\CustomerDAO;


use Illuminate\Http\Request;
use App\Models\CustomerModel;


class OrderController extends Controller
{
    // since we are not using a model this time
    public function index(Request $request){
        $customerData = new CustomerModel(request()->get('firstName'), request()->get('lastName'));
        $product = request()->get('product');
        // This is more efficient since it is not calling a method
        $customerID = $request->input('customerID');
        
        // Instantiate the Business Logic Layer
        $serviceOrder = new SecurityService();
        // Pass the credentials to the Business Layer
        $isValid = $serviceOrder->addAllInformation($product, $customerID, $customerData);
        
        
        // Determine with view to display;
        if ($isValid)
        {
            echo ("Order Data Committed Successfully");
            
        }
        else
        {
            echo ("Order Data Was Rolled Back");
           
        }
            return view('order');
    }
    // Validation added for Activity 3
    public function validateForm(Request $request)
    {
        // setup Data Validation Rules for Login Form
        $rules = ['user_name' => 'Required|Between: 4,10|Alpha',
            'password' => 'Required|Between: 4,10'];
        // Run Data Validation Rules
        $this->validate($request, $rules);
    }
}

