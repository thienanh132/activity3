<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Services\Business\SecurityService;
//use App\Services\Data\CustomerDAO;

class CustomerController extends Controller
{
    //To obtain an instance of the current HTTP request from a post
    public function index(Request $request){
        //Test the form variables being passed in
       // $this->validateForm($request);
        // This is from the next step d in the activity.
        // Create a UserModel with username and password
        $customerData = new CustomerModel(request()->get('firstName'), request()->get('lastName'));
        
        // Testing
        $nextID = 0;
        
        //$firstName = request()->get('firstName');
       // $lastName = request()->get('lastName');
        
        
      //  $model= new CustomerModel($firstName, $lastName);
        
        // Instantiate the Business Logic Layer
        //$serviceCustomer = new SecurityService();
        // Pass the customer data to the Business Layer
       // $isValid = $serviceCustomer->addCustomer($customerData);
        
        // Determine with view to display;
        //if ($isValid)
       // {
       //     echo ("Customer Data Added Successfully");
           
       // }
       // else
       // {
       //     echo ("Customer Data Was Not Added");
           
       // }
            return redirect('neworder')->with('nextID', $nextID)
                                       ->with('firstName', request()->get('firstName'))
                                       ->with('lastName', request()->get('lastName'));
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

