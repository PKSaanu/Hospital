<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use validator;
use Auth;
use App\Models\Staff;
use App\Models\Patient;
use App\Models\Treatment;

class pageController extends Controller
{
    //
    function Home()
    {
        if (Auth::check()) {

            return view('home');
                
        } else {
                
             return view('login');
        }

    }
    

    function Contactus()
    {
        if (Auth::check()) {

            return view('contactus');
                
        } else {
                
            return view('login');
        }

    }

    function Documentation()
    {
         if (Auth::check()) {

            return view('documentation');
                
        } else {
                
             return view('login');
        }

    }

    function Admission()
    {
        $consultant = User::where('user_position','Consultant')->get();
        if (Auth::check()) {

            return view('admission',Compact('consultant'));
                
        } else {
                
             return view('login');
        }

    }
    function Staff()
    {
        $staffs = User::where('role', '<>', 'superadmin')->get();
        if (Auth::check()) {

            return view('StaffDetails',Compact('staffs'));
                
        } else {
                
             return view('login');
        }

    }

  /* function PatientFeature($id)
    {
        $patient=Patient::where('id',$id);
        return view('patient_feature',compact('patient'));
    }*/
    function dischargedView(Request $request )
    {
        $search = $request['search'] ?? "";

        if($search != "")
        {
            $patients =Patient::where('NIC_No',"=",$search)->orWhere('Full_name',"LIKE","%$search%")
                        ->orWhere('PHN',"=","$search")
                        ->orWhere('BHT',"=","$search")
                        ->where('Status','Discharged')
                        ->get();
            
        }else{

            $patients =Patient::where('Status','Discharged')->get();

        }
        
        if (Auth::check()) {

            return view('Patients_Detail',compact('patients'));
                
        } else {
                
             return view('login');
        }

    }
    function admittedView(Request $request )
    {
        $search = $request['search'] ?? "";

        if($search != "")
        {
            $patients =Patient::where('NIC_No',"=",$search)->orWhere('Full_name',"LIKE","%$search%")
                        ->orWhere('PHN',"=","$search")
                        ->orWhere('BHT',"=","$search")
                        ->where('Status','Admitted')
                        ->get();
            
        }else{

            $patients =Patient::where('Status','Admitted')->get();

        }

        if (Auth::check()) {
        
            return view('Patients_Detail',compact('patients'));
                
        } else {
                
             return view('login');
        }

    }
    function PatientDetail(Request $request )
    {
       // $treatments=Treatment::all();
       if (Auth::check()) {

            if(Auth::user()->role == 'admin') 
            {

                $search = $request['search'] ?? "";

                if($search != "")
                {
                    $patients =Patient::where('NIC_No',"=",$search)->orWhere('Full_name',"LIKE","%$search%")
                        ->orWhere('PHN',"=","$search")
                        ->orWhere('BHT',"=","$search")
                        ->get();
                                            
                     }else{

                            $patients =Patient::where('Status','Admitted')->get();

                             }

                            return view('Patients_Detail',compact('patients'));
                                                                            
            }
            elseif(Auth::user()->role == 'superadmin') 
                {
                    $search = $request['search'] ?? "";

                    if($search != "")
                    {
                        $patients =Patient::where('NIC_No',"=",$search)->orWhere('Full_name',"LIKE","%$search%")
                            ->orWhere('PHN',"=","$search")
                            ->orWhere('BHT',"=","$search")
                            ->get();
                                                
                    }else{

                        $patients =Patient::all();

                        }
                                            
                                                    
                                        
                                            
                    return view('Patients_Detail',compact('patients'));
                                                    
                }
                
        } else {
                        
                return view('login');
                }
    }
}
