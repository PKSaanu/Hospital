<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $fillable = [
        'Patient_ID',
        'Date',
        'Staff_Name',
        'Visit_No',
        'Basic_Complaint',
        'Complaints',
        'Exam_Blood',
        'Exam_Pulse',
        'Symphysis_fundal_height',
        'Head',
        'Head2',
        'Exam_Other',
        'Manage_WBC',
        'Manage_Hb',
        'Manage_p_t',
        'Manage_WhiteCells',
        'Manage_Redcells',
        'Manage_Protein',
        'Manage_K',
        'Manage_Na',
        'Manage_CRP',
        'Manage_FBS',
        'Manage_AB',
        'Manage_AL',
        'Manage_AD',
        'Manage_Other',
        'Basic_Decision',
        'Decisions'
    ];
    protected $hidden=[
         'Patient_ID'
    ];
}
