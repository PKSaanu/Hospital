<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Staff;
use App\Models\Treatment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use validator;
use Auth;


class TreatmentController extends Controller
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
    public function edit(Treatment $treatment)
    {
        //
        if (Auth::check()) {

            return view('visitEdit',compact('treatment'));
                
        } else {
                
             return view('login');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'Date' => "required",
                'Staff_Name' => "required",
                'Visit_No' => "required",
                
            ]);

            $Exam_Bloods = $request->input('Exam_Blood');

            if (!empty($request->input('Complaint'))) {
                $Complaints = $request->input('Complaint');
            }
            else
            {
                $Complaints=[];
            }
            

           
           // $other_Complaints = $request->input('Complaints');

            $Decisions = $request->input('Decision');
           // $other_Decisions = $request->input('Decisions');

           /* if (!empty($other_Complaints)) {
                $Complaints[] = $other_Complaints;
            }

            if (!empty($other_Decisions)) {
                $Decisions[] = $other_Decisions;
            }*/

           /* $other_Exams = $request->input('other_Exam');
            $Manages = $request->input('Manage');
            $other_Manages = $request->input('other_Manage');

            if (!empty($other_Invests )) {
                $Invests[] = $other_Invests;
            }
            if (!empty($other_Manages)) {
                $Manages[] = $other_Manages;
            }*/
            
            if (!$Decisions) {
                return redirect()->back()->with('error', 'Fill the Decision !!');
            }

            $treatment = new Treatment([
                'Date' => $request->get('Date'),
                'Staff_Name' => $request->get('Staff_Name'),
                'Visit_No' => $request->get('Visit_No'),
                'Patient_ID' => $request->get('patient_No'),
                'Basic_Complaint' => implode(',', $Complaints),
                'Complaints' =>  $request->get('Complaints'),
                'Exam_Blood' => implode('/', $Exam_Bloods),
                'Exam_Pulse' =>  $request->get('Exam_Pulse'),
                'Symphysis_fundal_height' =>  $request->get('Symphysis_fundal_height'),
                'Head' =>  $request->get('Head'),
                'Head2' =>  $request->get('Head2'),
                'Exam_Other' =>  $request->get('Exam_Other'),
                'Manage_WBC' => $request->get('Manage_WBC'),
                'Manage_Hb' => $request->get('Manage_Hb'),
                'Manage_p_t' => $request->get('Manage_p_t'),
                'Manage_WhiteCells' => $request->get('Manage_WhiteCells'),
                'Manage_Redcells' => $request->get('Manage_Redcells'),
                'Manage_Protein' => $request->get('Manage_Protein'),
                'Manage_K' => $request->get('Manage_K'),
                'Manage_Na' => $request->get('Manage_Na'),
                'Manage_CRP' => $request->get('Manage_CRP'),
                'Manage_FBS' => $request->get('Manage_FBS'),
                'Manage_AB' => $request->get('Manage_AB'),
                'Manage_AL' => $request->get('Manage_AL'),
                'Manage_AD' => $request->get('Manage_AD'),
                'Manage_Other' => $request->get('Manage_Other'),
                'Basic_Decision' => implode(',', $Decisions),
                'Decisions' => $request->get('Decisions'),
            ]);
            $treatment->save(); 
           // $patient = Patient::find($request->get('patient_No'));
            $patient_id=$request->get('patient_No');
            $date=$request->get('Date');
            return redirect()->route('DayShow', compact('date','patient_id'))->with('success', 'Treatment Record added!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
   /* public function show(Treatment $treatment)
    {
        //
        $patient = Patient::where('id', $treatment->Patient_ID)->first();
        return view('dayView',compact('treatment','patient'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function TreatmentEdit($date,$patient_id,$visit)
    {
        $treatment = Treatment::where('Date', $date)
        ->where('Patient_ID', $patient_id)
        ->where('Visit_No',$visit)
        ->first(); 

        if (!$treatment) {
            return redirect()->back()->with('error', 'Treatment not found');
        }

        $patient = Patient::where('id', $patient_id)->first();
        $staff =User::where('role','admin')->get();

        if (Auth::check()) {

            return view('visitEdit', compact('treatment','patient','staff'));
                
        } else {
                
             return view('login');
        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Treatment $treatment)
    {
        $request->validate(
            [
                'Date' => 'required',
               // 'visit' => 'required',
                "Staff_Name"=>'required',
            ]);
            $Exam_Bloods = $request->input('Exam_Blood');
            $Complaints = $request->input('Complaint');
            $Decisions = $request->input('Decision');
            $treatment->update([
                'Date' => $request->get('Date'),
                'Staff_Name' => $request->get('Staff_Name'),
                'Visit_No' => $request->get('Visit_No'),
                'Patient_ID' => $request->get('patient_No'),
                'Basic_Complaint' => implode(',', $Complaints),
                'Complaints' =>  $request->get('Complaints'),
                'Exam_Blood' => implode('/', $Exam_Bloods),
                'Exam_Pulse' =>  $request->get('Exam_Pulse'),
                'Symphysis_fundal_height' =>  $request->get('Symphysis_fundal_height'),
                'Head' =>  $request->get('Head'),
                'Head2' =>  $request->get('Head2'),
                'Exam_Other' =>  $request->get('Exam_Other'),
                'Manage_WBC' => $request->get('Manage_WBC'),
                'Manage_Hb' => $request->get('Manage_Hb'),
                'Manage_p_t' => $request->get('Manage_p_t'),
                'Manage_WhiteCells' => $request->get('Manage_WhiteCells'),
                'Manage_Redcells' => $request->get('Manage_Redcells'),
                'Manage_Protein' => $request->get('Manage_Protein'),
                'Manage_K' => $request->get('Manage_K'),
                'Manage_Na' => $request->get('Manage_Na'),
                'Manage_CRP' => $request->get('Manage_CRP'),
                'Manage_FBS' => $request->get('Manage_FBS'),
                'Manage_AB' => $request->get('Manage_AB'),
                'Manage_AL' => $request->get('Manage_AL'),
                'Manage_AD' => $request->get('Manage_AD'),
                'Manage_Other' => $request->get('Manage_Other'),
                'Basic_Decision' => implode(',', $Decisions),
                'Decisions' => $request->get('Decisions')
            ]);;
            return redirect()->route('DayShow', [
                'date' => $treatment->Date,
                'patient_id' => $treatment->Patient_ID,
            ])->with('success', 'Treatment Record updated!');
    }
    public function treatupdate(Request $request,$date,$patient_id,$visit)
    {

        $request->validate(
            [
                'Date' => 'required',
                "Staff_Name"=>'required',
            ]);
            $Exam_Bloods = $request->input('Exam_Blood');
            $Complaints = $request->input('Complaint');
            $Decisions = $request->input('Decision');

        DB::table('treatments')
        ->where('Date', $date)
        ->where('Patient_ID', $patient_id)
        ->where('Visit_No',$visit)
        ->update([
            'Date' => $request->get('Date'),
            'Staff_Name' => $request->get('Staff_Name'),
            'Visit_No' => $request->get('Visit_No'),
            'Patient_ID' => $request->get('patient_No'),
            'Basic_Complaint' => implode(',', $Complaints),
            'Complaints' =>  $request->get('Complaints'),
            'Exam_Blood' => implode('/', $Exam_Bloods),
            'Exam_Pulse' =>  $request->get('Exam_Pulse'),
            'Symphysis_fundal_height' =>  $request->get('Symphysis_fundal_height'),
            'Head' =>  $request->get('Head'),
            'Head2' =>  $request->get('Head2'),
            'Exam_Other' =>  $request->get('Exam_Other'),
            'Manage_WBC' => $request->get('Manage_WBC'),
            'Manage_Hb' => $request->get('Manage_Hb'),
            'Manage_p_t' => $request->get('Manage_p_t'),
            'Manage_WhiteCells' => $request->get('Manage_WhiteCells'),
            'Manage_Redcells' => $request->get('Manage_Redcells'),
            'Manage_Protein' => $request->get('Manage_Protein'),
            'Manage_K' => $request->get('Manage_K'),
            'Manage_Na' => $request->get('Manage_Na'),
            'Manage_CRP' => $request->get('Manage_CRP'),
            'Manage_FBS' => $request->get('Manage_FBS'),
            'Manage_AB' => $request->get('Manage_AB'),
            'Manage_AL' => $request->get('Manage_AL'),
            'Manage_AD' => $request->get('Manage_AD'),
            'Manage_Other' => $request->get('Manage_Other'),
            'Basic_Decision' => implode(',', $Decisions),
            'Decisions' => $request->get('Decisions')
        ]);
            //$treatment->save();
            return redirect()->route('DayShow', [
                'date' =>$date,
                'patient_id' => $patient_id,
            ])->with('success', 'Treatment Record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Treatment  $treatment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Treatment $treatment)
    {
        //
    }
}
