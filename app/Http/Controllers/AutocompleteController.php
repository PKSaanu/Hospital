<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Treatment;


class AutocompleteController extends Controller
{
    public function searchComp(Request $request)
{
    $term = $request->input('term');
    $treatments = Treatment::all()->pluck('Complaints')->toArray();
    $suggestions = [];
    $searchTerms = explode(',', $term);
    $lastTerm = strtolower(trim(end($searchTerms)));

    foreach ($treatments as $treatment) {
        $subComplaints = explode(',', $treatment);

        foreach ($subComplaints as $subComplaint) {
            $lowercaseSubComplaint = strtolower(trim($subComplaint)); 
            if (strpos($lowercaseSubComplaint, $lastTerm) === 0&& !in_array($lowercaseSubComplaint, $suggestions)) {
                $suggestions[] = $lowercaseSubComplaint;
            }
        }
    }

    return response()->json($suggestions);
}

    
    public function searchExam(Request $request)
    {
        $term = $request->input('term');
        $treatments = Treatment::all()->pluck('Exam_Other')->toArray();
        $suggestions = [];
        $searchTerms = explode(',', $term);
        $lastTerm = strtolower(trim(end($searchTerms)));
    
        foreach ($treatments as $treatment) {
            $subComplaints = explode(',', $treatment);
    
            foreach ($subComplaints as $subComplaint) {
                $lowercaseSubComplaint = strtolower(trim($subComplaint)); 
                if (strpos($lowercaseSubComplaint, $lastTerm) === 0 && !in_array($lowercaseSubComplaint, $suggestions)) {
                    $suggestions[] = $lowercaseSubComplaint;
                }
            }
        }
    
        return response()->json($suggestions);
    }
    public function searchManage(Request $request)
    {
        $term = $request->input('term');
        $treatments = Treatment::all()->pluck('Manage_Other')->toArray();
        $suggestions = [];
        $searchTerms = explode(',', $term);
        $lastTerm = strtolower(trim(end($searchTerms)));
    
        foreach ($treatments as $treatment) {
            $subComplaints = explode(',', $treatment);
    
            foreach ($subComplaints as $subComplaint) {
                $lowercaseSubComplaint = strtolower(trim($subComplaint)); 
                if (strpos($lowercaseSubComplaint, $lastTerm) === 0 && !in_array($lowercaseSubComplaint, $suggestions)) {
                    $suggestions[] = $lowercaseSubComplaint;
                }
            }
        }
    
        return response()->json($suggestions);
    }
    public function searchDecision(Request $request)
    {
        $term = $request->input('term');
        $treatments = Treatment::all()->pluck('Decisions')->toArray();
        $suggestions = [];
        $searchTerms = explode(',', $term);
        $lastTerm = strtolower(trim(end($searchTerms)));
    
        foreach ($treatments as $treatment) {
            $subComplaints = explode(',', $treatment);
    
            foreach ($subComplaints as $subComplaint) {
                $lowercaseSubComplaint = strtolower(trim($subComplaint)); 
                if (strpos($lowercaseSubComplaint, $lastTerm) === 0 && !in_array($lowercaseSubComplaint, $suggestions)) {
                    $suggestions[] = $lowercaseSubComplaint;
                }
            }
        }
    
        return response()->json($suggestions);
    }
}
