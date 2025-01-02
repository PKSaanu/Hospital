<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use App\Models\Poh;
use App\Models\History;
use App\Models\DeliveryHistory;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use validator;
use Auth;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'date' => 'required',
                'time' => 'required',
                'fullname' => 'required',
                'address' => 'required',
                //'nic' => 'required',
                'phn' => 'required|unique:patients,PHN',
               // 'phone' => 'required',
                'age' => 'required',
                'maritial_status' => 'required',
                'consultant' => 'required',
                //'Patient_Category'=>'required',
                'bht' => 'required',
                'ward_no' => 'required',

            ]);

            $patient = new Patient([
                'Admission_Date' => $request->get('date'),
                'Admission_Time' => $request->get('time'),
                'Full_name' => $request->get('fullname'),
                'BloodGroup' => $request->get('blood_group'),               
                'Address' => $request->get('address'),
                'NIC_No' => $request->get('nic'),
                'PHN' => $request->get('phn'), 
                'Phone_No' => $request->get('phone'),
                'Age'=>$request->get('age'),
                'Marital_Status' => $request->get('maritial_status'),             
                'ConsultantID' => $request->get('consultant'),
                'BHT' => $request->get('bht'), 
                'Ward_No' => $request->get('ward_no'),
                'Patient_Category'  =>$request->get('patient_category'),         
                'Allergies_Drugs' => $request->get('drugs'),
                'Allergies_Foods' => $request->get('food'),
                'Allergies_Specify' => $request->get('specify'),
                'Status'=>$request->get('Status')
            ]);
            $patient->save();

            
            $patients =Patient::all();

            return redirect()->route('patients',compact('patients'))->with('success','Patient added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
        if (Auth::check()) {

            return view('patient_feature',compact('patient'));
                
        } else {
                
             return view('login');
        }

    }

    public function Detailshow(Patient $patient)
    {
        //
        if (Auth::check()) {

            return view('infopage',compact('patient'));
                
        } else {
                
             return view('login');
        }

    }

    public function DayToDay(Patient $patient)
    {
        //
        $treatments=Treatment::where('Patient_ID',$patient->id)->get();
        if (Auth::check()) {

            return view('daypage',compact('patient','treatments'));
                
        } else {
                
             return view('login');
        }

    }

    public function Visit(Patient $patient)
    {
        //
        $treatment=Treatment::where('Patient_ID',$patient->id)->get(); //Thanush 3 visit
        $staff =User::where('role','admin')->get();
        $visit = null; 
        $date = null; 
        if (Auth::check()) {

            return view('visitpage',compact('patient','staff','visit', 'date'));
                
        } else {
                
             return view('login');
        }

    }
    public function SubVisit($date,$patient_id,$visit)
    {
        //
        $patient = Patient::where('id', $patient_id)->first();
        $staff =User::where('role','admin')->get();
        if (Auth::check()) {

            return view('visitpage',compact('patient','staff','date','visit'));
                
        } else {
                
             return view('login');
        }
    }
    public function DayShow($date,$patient_id)
    {
        $treatments = Treatment::where('Date', $date)
        ->where('Patient_ID', $patient_id)
        ->get();
        $patient = Patient::where('id', $patient_id)->first();

        if (Auth::check()) {

            return view('dayView', compact('treatments','patient')); 
                
        } else {
                
             return view('login');
        }
 
    }
 /*  public function DayVisit(Patient $patient,)
    {
        //
        $staff =User::where('role','admin')->get();
        return view('dayview',compact('patient','staff'));  
    }*/

    public function Poh(Patient $patient)
    {
        //
        $pohs=Poh::where('Patient_ID',$patient->id)->get();
        if (Auth::check()) {

            return view('pohpage',compact('patient','pohs'));
                
        } else {
                
             return view('login');
        }

    }
    public function History(Patient $patient)
    {
        //
        $histories=History::where('Patient_ID',$patient->id)->get();
        if (Auth::check()) {

            return view('history',compact('patient','histories'));
                
        } else {
                
             return view('login');
        }
    }
    public function DeliveryHistory(Patient $patient)
    {
        //
        $deliveryhistories=DeliveryHistory::where('Patient_ID',$patient->id)->get();
        if (Auth::check()) {

            return view('deliveryhistory',compact('patient','deliveryhistories'));
                
        } else {
                
             return view('login');
        }

    }

    public function Addpoh(Patient $patient)
    {
        //
        //$pohs=Poh::where('Patient_ID',$patient->id)->get();
        if (Auth::check()) {

            return view('pohform',compact('patient'));
                
        } else {
                
             return view('login');
        }

    }
    public function AddHistory(Patient $patient)
    {
        //
        //$pohs=Poh::where('Patient_ID',$patient->id)->get();
        if (Auth::check()) {

            return view('historyform',compact('patient'));
                
        } else {
                
             return view('login');
        }

    }
    public function AddDeliveryHistory(Patient $patient)
    {
        //
        //$pohs=Poh::where('Patient_ID',$patient->id)->get();
        if (Auth::check()) {

            return view('deliveryhistoryform',compact('patient'));
                
        } else {
                
             return view('login');
        }

    }

    public function PohStore(Request $request)
    {
        $request->validate(
            [
                'pregnancy' => 'required',
            ]);

            $poh = new Poh([
                'pregnancy' => $request->get('pregnancy'),
                'antenatal_complications' => $request->get('antenatal_complications'),
                'place_of_delivery' => $request->get('place_of_delivery'),
                'mode_of_delivery' => $request->get('mode_of_delivery'),
                'outcome' => $request->get('outcome'),               
                'birth_weight' => $request->get('birth_weight'),
                'postnatal_complication' => $request->get('postnatal_complication'),
                'sex' => $request->get('sex'),
                'age' => $request->get('age'),
                'Patient_ID' => $request->get('patient_No'),
            ]);
            $poh->save();
           // $pohs = Poh::all();
            $patient = Patient::find($request->get('patient_No'));
            return redirect()->route('poh', compact('patient'))->with('success', 'POH Record added!');;
    } 
    public function HistoryStore(Request $request)
    {

            $history = new History([
                'MHx' => $request->get('MHx'),
                'FHx' => $request->get('FHx'),
                'SHx' => $request->get('SHx'),
                'Risk_Factor' => $request->get('Risk_Factor'),
                'BMI' => $request->get('BMI'),               
                'LMP' => $request->get('LMP'),
                'EDD' => $request->get('EDD'),
                'Parity' => $request->get('Parity'),
                'Past_obs_Hx' => $request->get('Past_obs_Hx'),
                'Past_obs_complication' => $request->get('Past_obs_complication'),
                'Patient_ID' => $request->get('patient_No'),
            ]);
            $history->save();
            $patient = Patient::find($request->get('patient_No'));
            return redirect()->route('history', compact('patient'))->with('success', 'History Record added!');;
    }
    public function DeliveryHistoryStore(Request $request)
    {

            $deliveryhistory = new DeliveryHistory([
                'Delivery_Hx' => $request->get('Delivery_Hx'),
                'Time' => $request->get('Time'),
                'Date' => $request->get('Date'),
                'Birth_Weight' => $request->get('Birth_Weight'),
                'Gender' => $request->get('Gender'),               
                'ACMN' => $request->get('ACMN'),
                'Patient_ID' => $request->get('patient_No'),
            ]);
            $deliveryhistory->save();
            $patient = Patient::find($request->get('patient_No'));
            return redirect()->route('deliveryhistory', compact('patient'))->with('success', 'Delivery History Record added!');;
    }
    public function PohEdit($id,$patient_id)
    {
        $pohs=Poh::where('Patient_ID',$patient_id)
        ->where('id',$id)
        ->get();
        $patient = Patient::where('id',$patient_id)->first();
        if (Auth::check()) {

            return view('poheditpage',compact('pohs','patient'));
                
        } else {
                
             return view('login');
        }

    }
    public function HistoryEdit($id,$patient_id)
    {
        $histories=History::where('Patient_ID',$patient_id)
        ->where('id',$id)
        ->get();
        $patient = Patient::where('id',$patient_id)->first();
        if (Auth::check()) {

            return view('historyedit',compact('histories','patient'));
                
        } else {
                
             return view('login');
        }

    }
    public function DeliveryHistoryEdit($id,$patient_id)
    {
        $deliveryhistories=DeliveryHistory::where('Patient_ID',$patient_id)
        ->where('id',$id)
        ->get();
        $patient = Patient::where('id',$patient_id)->first();
        if (Auth::check()) {

            return view('deliveryhistoryedit',compact('deliveryhistories','patient'));
                
        } else {
                
             return view('login');
        }

    }
    public function updatepoh(Request $request,$id,$patient_id)
    {
        $request->validate(
            [
                'pregnancy' => 'required',
            ]);

            DB::table('pohs')
            ->where('id', $id)
            ->where('Patient_ID', $patient_id)
            ->update([
                'pregnancy' => $request->get('pregnancy'),
                'antenatal_complications' => $request->get('antenatal_complications'),
                'place_of_delivery' => $request->get('place_of_delivery'),
                'mode_of_delivery' => $request->get('mode_of_delivery'),
                'outcome' => $request->get('outcome'),               
                'birth_weight' => $request->get('birth_weight'),
                'postnatal_complication' => $request->get('postnatal_complication'),
                'sex' => $request->get('sex'),
                'age' => $request->get('age'),
                'Patient_ID' => $request->get('patient_No'),
            ]);
            //$poh->save();
           // $pohs = Poh::all();
            $patient = Patient::find($request->get('patient_No'));
            return redirect()->route('poh', compact('patient'))->with('success', 'POH Record Updated!');;
    }
    public function updatehistory(Request $request,$id,$patient_id)
    {

            DB::table('histories')
            ->where('id', $id)
            ->where('Patient_ID', $patient_id)
            ->update([
                'MHx' => $request->get('MHx'),
                'FHx' => $request->get('FHx'),
                'SHx' => $request->get('SHx'),
                'Risk_Factor' => $request->get('Risk_Factor'),
                'BMI' => $request->get('BMI'),               
                'LMP' => $request->get('LMP'),
                'EDD' => $request->get('EDD'),
                'Parity' => $request->get('Parity'),
                'Past_obs_Hx' => $request->get('Past_obs_Hx'),
                'Past_obs_complication' => $request->get('Past_obs_complication'),
                'Patient_ID' => $request->get('patient_No'),
            ]);
            //$poh->save();
           // $pohs = Poh::all();
            $patient = Patient::find($request->get('patient_No'));
            return redirect()->route('history', compact('patient'))->with('success', 'History Record Updated!');;
    }
    public function updatedeliveryhistory(Request $request,$id,$patient_id)
    {

            DB::table('delivery_histories')
            ->where('id', $id)
            ->where('Patient_ID', $patient_id)
            ->update([
                'Delivery_Hx' => $request->get('Delivery_Hx'),
                'Time' => $request->get('Time'),
                'Date' => $request->get('Date'),
                'Birth_Weight' => $request->get('Birth_Weight'),
                'Gender' => $request->get('Gender'),               
                'ACMN' => $request->get('ACMN'),
                'Patient_ID' => $request->get('patient_No'),
            ]);
            //$poh->save();
           // $pohs = Poh::all();
            $patient = Patient::find($request->get('patient_No'));
            return redirect()->route('deliveryhistory', compact('patient'))->with('success', 'Delivery History Record Updated!');;
    }

    public function Admit(Patient $patient)
    {
        //
        //$admits=Admit::where('Patient_ID',$patient->id)->get(); // some doubts are there , So i wait for it
        if (Auth::check()) {

            return view('admit',compact('patient'));
                
        } else {
                
             return view('login');
        }

    }
    public function discharge($id)
    {
        //
        DB::table('patients')
        ->where('id', $id)
        ->update(['Status' => 'Discharged']);
        return redirect()->route('patients');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        // 
        $consultant = User::where('user_position','Consultant')->get();
        if (Auth::check()) {

            return view('editadmission',compact('patient','consultant'));
                
        } else {
                
             return view('login');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
        
          $rules=  [
                'date' => 'required',
                'time' => 'required',
                'fullname' => 'required',
                'address' => 'required',
                'nic' => 'required',
                'phone' => 'required',
                'age' => 'required',
                'maritial_status' => 'required',
                //'admission_type' => 'required',
                'patient_category' => 'required',
                'consultant' => 'required',
                'bht' => 'required',
                'ward_no' => 'required',
          ];
            if ($request->has('phn') && $request->phn != $patient->PHN) {
                $rules['phn'] = 'required|unique:patients,PHN';
            }
            $request->validate($rules );

            $patient->update([
                'Admission_Date' => $request->get('date'),
                'Admission_Time' => $request->get('time'),
                'Full_name' => $request->get('fullname'),
                'BloodGroup' => $request->get('blood_group'),               
                'Address' => $request->get('address'),
                'NIC_No' => $request->get('nic'),
                'PHN' => $request->get('phn'), 
                'Phone_No' => $request->get('phone'),
                'Age'=>$request->get('age'),
                'Marital_Status' => $request->get('maritial_status'),
                //'Admission_Type' => $request->get('admission_type'),               
                'Patient_Category' => $request->get('patient_category'),
                'Consultantname' => $request->get('consultant'),
                'BHT' => $request->get('bht'), 
                'Ward_No' => $request->get('ward_no'),             
                'Allergies_Drugs' => $request->get('drugs'),
                'Allergies_Foods' => $request->get('food'),
                'Allergies_Specify' => $request->get('specify'),
                'Status'=>$request->get('Status')
            ]);



            

            $patient->save();


        $patients =Patient::all();
        return redirect()->route('patients',compact('patients'))->with('success','Patient Details updated!!!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }

    

}
