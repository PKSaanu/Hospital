<?php
  
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Patient;
use DB;
use Auth;
    
class ChartController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $patients = Patient::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(Admission_Date) as month_name"))
                    ->whereYear('Admission_Date', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy(DB::raw("MONTH(Admission_Date)"),'ASC')
                    ->pluck('count', 'month_name');
 
        $labels = $patients->keys();
        $data = $patients->values();


        $catpatients = Patient::select(
            DB::raw("COUNT(*) as count"),
            DB::raw("Patient_Category as category")
        )
            ->groupBy(DB::raw("category"))
            ->orderBy(DB::raw("MONTH(Admission_Date)"), 'ASC')
            ->pluck('count', 'category');
    
        $catlabels = $catpatients->keys();
        $catdata = $catpatients->values();

                          
        
        if (Auth::check()) {

            return view('chart', compact('labels', 'data','catlabels', 'catdata'));
                
        } else {
                
             return view('login');
        }
              
    }


    public function yearEntryChart()
    {
        $patients = Patient::select(
            DB::raw("COUNT(*) as count"),
            DB::raw("YEAR(Admission_Date) as year")
        )
            ->groupBy(DB::raw("year"))
            ->orderBy('year', 'ASC')
            ->pluck('count', 'year');
    
        $labels = $patients->keys();
        $data = $patients->values();

        $catpatients = Patient::select(
            DB::raw("COUNT(*) as count"),
            DB::raw("Patient_Category as category")
        )
            ->groupBy(DB::raw("category"))
            ->orderBy('id', 'ASC')
            ->pluck('count', 'category');
    
        $catlabels = $catpatients->keys();
        $catdata = $catpatients->values();

                               
        
        if (Auth::check()) {

            return view('chart', compact('labels', 'data','catlabels', 'catdata'));
                
        } else {
                
             return view('login');
        }
              
    }


}