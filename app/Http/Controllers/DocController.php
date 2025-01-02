<?php

namespace App\Http\Controllers;
use App\Exports\PatientsExport;
use App\Exports\PohExport;
use App\Exports\HistoryExport;
use App\Exports\TreatmentsExport;
use App\Exports\DeliveryHistoryExport;
use App\Models\Poh;
use App\Models\History;
use App\Models\DeliveryHistory;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use validator;
use Auth;
use App\Models\Staff;
use App\Models\Patient;
use App\Models\Treatment;
use App\Models\BackupDetail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use ZipArchive;
use Carbon\Carbon;
class DocController extends Controller
{
    public function Doc(Request $request)
    {
        $formSubmitted = $request->input('form_submitted');

        // Set default start_date and end_date

        $minAdmissionDate = Patient::min('Admission_Date');
        $start_date = $minAdmissionDate ?? Carbon::now()->toDateString();
        $end_date = Carbon::today()->toDateString();
    
        // If the form is submitted, get start_date and end_date from the form
        if ($formSubmitted) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
        }
        $lastBackupDetail = BackupDetail::latest()->first();
        if ($lastBackupDetail) {
            $date = $lastBackupDetail->date;
            $time = $lastBackupDetail->time;
        } else {
            $date = 'N/A';
            $time = 'N/A';
        }
        // Use $start_date and $end_date to filter patients and treatments
        $patients = Patient::all();
        //$treatments = Treatment::all();
        $filterpatients = Patient::whereBetween('Admission_Date', [$start_date, $end_date])->get();
        $filtertreatments = Treatment::whereBetween('Date', [$start_date, $end_date])->get();
        $Count = $patients->count();
        $Count1 =$filterpatients->count();
        $Count2=$filtertreatments->count();


        if (Auth::check()) {

            return view('documentation', compact('Count', 'start_date', 'end_date','date','time','Count1','Count2'));
                
        } else {
                
             return view('login');
        }
    }
    public function downloadPatientsPDF($start_date, $end_date)
    {
        ini_set('memory_limit', '-1');
        $patients = Patient::whereBetween('Admission_Date', [$start_date, $end_date])->get();
        //$treatments = Treatment::whereBetween('Date', [$start_date, $end_date])->get();
        $date = Carbon::now()->format('Y-m-d');
        $pdf = new Dompdf();
    
        $html = view('patients.pdf', compact('patients'))->render();
    
        $pdf->loadHtml($html);
    
        $options = new Options();
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true);
    
        // Set custom margins (in inches)
        $options->set('margin_top', 12);
        $options->set('margin_right', 12);
        $options->set('margin_bottom', 12);
        $options->set('margin_left', 12);
    
        $pdf->setOptions($options);
    
        $pdf->setPaper('A4', 'landscape');
    
        $pdf->render();
    
        $output = $pdf->output();
        if (Auth::check()) {

            return Response::streamDownload(
                function () use ($output) {
                    echo $output;
                },
                "patients_{$date}.pdf"
            );
                
        } else {
                
             return view('login');
        }

    }
    public function downloadPatientsExcel($start_date, $end_date)
    {
        $patients = Patient::whereBetween('Admission_Date', [$start_date, $end_date])->get();
       // $treatments = Treatment::whereBetween('Date', [$start_date, $end_date])->get();
       $date = Carbon::now()->format('Y-m-d');
       if (Auth::check()) {

        return Excel::download(new PatientsExport($patients), "patients_{$date}.xlsx");
            
        } else {
                
            return view('login');
        }
    }
    public function downloadTreatmentsExcel($start_date, $end_date)
    {
       // $patients = Patient::whereBetween('Admission_Date', [$start_date, $end_date])->get();
        $treatments = Treatment::whereBetween('Date', [$start_date, $end_date])->get();
        $date = Carbon::now()->format('Y-m-d');
        if (Auth::check()) {

            return Excel::download(new TreatmentsExport($treatments), "treatments_{$date}.xlsx");
                
        } else {
                
             return view('login');
        }
        
    }
    public function downloadCombinedExcel($start_date, $end_date)
    {
        // Fetch data from your models
        $date = Carbon::now()->format('Y-m-d');
        $patients = Patient::whereBetween('Admission_Date', [$start_date, $end_date])->get();
        $patientIds = $patients->pluck('id');
        $pohs = Poh::whereHas('patients', function ($query) use ($patientIds) {
            $query->whereIn('Patient_ID', $patientIds);
        })->get();
        $histories = History::whereHas('patients', function ($query) use ($patientIds) {
            $query->whereIn('Patient_ID', $patientIds);
        })->get();
        $deliveryHistories = DeliveryHistory::whereHas('patients', function ($query) use ($patientIds) {
            $query->whereIn('Patient_ID', $patientIds);
        })->get();
    
        // Create a zip archive
        $zip = new ZipArchive();
        $zipFileName = "combined_excels_{$date}.zip";
        $zipFilePath = public_path($zipFileName);
    
        if ($zip->open($zipFilePath, ZipArchive::CREATE) !== true) {
            return response()->json(['error' => 'Failed to create zip archive'], 500);
        }
    
        // Export and add the first file directly to the zip
        $pohExport = new PohExport($pohs);
        $pohContent = Excel::download($pohExport, 'poh.xlsx')->getFile()->getContent();
        $zip->addFromString('poh.xlsx', $pohContent);
    
        // Export and add the second file directly to the zip
        $historyExport = new HistoryExport($histories);
        $historyContent = Excel::download($historyExport, 'history.xlsx')->getFile()->getContent();
        $zip->addFromString('history.xlsx', $historyContent);
    
        // Export and add the third file directly to the zip
        $deliveryHistoryExport = new DeliveryHistoryExport($deliveryHistories);
        $deliveryHistoryContent = Excel::download($deliveryHistoryExport, 'delivery_history.xlsx')->getFile()->getContent();
        $zip->addFromString('delivery_history.xlsx', $deliveryHistoryContent);
    
        // Close the zip archive
        $zip->close();
    
        // Set headers for zip file download
        $zipHeaders = [
            'Content-Type' => 'application/zip',
            'Content-Disposition' => "attachment; filename=combined_excels_{$date}.zip",
        ];
    
        // Stream the zip archive for download
        if (Auth::check()) {
            return response()->download($zipFilePath, "combined_excels_{$date}.zip", $zipHeaders)->deleteFileAfterSend(true);
                
        } else {
                
             return view('login');
        }
    }
    public function downloadTreatmentsPDF($start_date, $end_date)
    {
        // Increase memory limit if needed
        ini_set('memory_limit', '-1');
        $date = Carbon::now()->format('Y-m-d');
        $patients = Patient::all();
        $treatments = Treatment::whereBetween('Date', [$start_date, $end_date])->get();

        $pdf = new Dompdf();

        $html = view('treatments.pdf', compact('treatments', 'patients'))->render();

        $pdf->loadHtml($html);

        $options = new Options();
        $options->set('isPhpEnabled', false);
        $options->set('isHtml5ParserEnabled', true); // Enable HTML5 parsing
        $pdf->setOptions($options);

        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        $output = $pdf->output();

        // Stream the PDF output to the browser
       /* return response()->stream(
            function () use ($output) {
                echo $output;
            },
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="treatments.pdf"',
            ]
        );*/
        if (Auth::check()) {

            return Response::streamDownload(
                function () use ($output) {
                    echo $output;
                },
                "treatments_{$date}.pdf"
            );
                
        } else {
                
             return view('login');
        }
    }
    public function downloadCombinedPdf($start_date, $end_date)
    {
        // Increase memory limit if needed
        ini_set('memory_limit', -1);
        $date = Carbon::now()->format('Y-m-d');
        $patients = Patient::whereBetween('Admission_Date', [$start_date, $end_date])->get();
        $patientIds = $patients->pluck('id');
       // $treatments = Treatment::whereBetween('Date', [$start_date, $end_date])->get();
        $pohs = Poh::whereHas('patients', function ($query) use ($patientIds) {
            $query->whereIn('Patient_ID', $patientIds);
        })->get();
        $histories = History::whereHas('patients', function ($query) use ($patientIds) {
            $query->whereIn('Patient_ID', $patientIds);
        })->get();
        $deliveryhistories = DeliveryHistory::whereHas('patients', function ($query) use ($patientIds) {
            $query->whereIn('Patient_ID', $patientIds);
        })->get();

        $pdf1 = new Dompdf();
        $pdf2 = new Dompdf();
        $pdf3 = new Dompdf();

        $html1 = view('birth.pohpdf', compact('pohs', 'patients'))->render();
        $html2 = view('birth.historypdf', compact('histories', 'patients'))->render();
        $html3 = view('birth.deliverypdf', compact('deliveryhistories', 'patients'))->render();

        $pdf1->loadHtml($html1);
        $pdf2->loadHtml($html2);
        $pdf3->loadHtml($html3);

        $options = new Options();
        $options->set('isPhpEnabled', false);
        $options->set('isHtml5ParserEnabled', true); // Enable HTML5 parsing
        $pdf1->setOptions($options);
        $pdf2->setOptions($options);
        $pdf3->setOptions($options);

        $pdf1->setPaper('A4', 'landscape');
        $pdf2->setPaper('A4', 'landscape');
        $pdf3->setPaper('A4', 'landscape');

        $pdf1->render();
        $pdf2->render();
        $pdf3->render();

        $output1 = $pdf1->output();
        $output2 = $pdf2->output();
        $output3 = $pdf3->output();

        $zip = new ZipArchive();
        $zipFileName = "combined_pdfs_{$date}.zip";
        $zipFilePath = public_path($zipFileName);
    
        if ($zip->open($zipFilePath, ZipArchive::CREATE) === true) {
            $zip->addFromString('pohs.pdf', $pdf1->output());
            $zip->addFromString('histories.pdf', $pdf2->output());
            $zip->addFromString('deliveryhistories.pdf', $pdf3->output());
            $zip->close();
        }
    
        // Stream the zip archive for download
        if (Auth::check()) {

            return response()->download($zipFilePath)->deleteFileAfterSend(true);
                
        } else {
                
             return view('login');
        }
        
    }
   public function downloadSqlDump()
    {
        // List of tables to backup
        $tables = ['patients', 'treatments', 'delivery_histories', 'histories', 'pohs', 'users'];

        // Specify the directory where you want to save the SQL dump files and the zip file
        $backupDirectory = storage_path('app/sql_backups');
        $date = Carbon::now()->format('Y-m-d');
        $zipFilePath = storage_path("app/sql_backup_{$date}.zip");

        // Create the backup directory if it doesn't exist
        if (!file_exists($backupDirectory)) {
            mkdir($backupDirectory, 0755, true);
        }

        // Create a zip archive
        $zip = new ZipArchive();

        if ($zip->open($zipFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            return response()->json(['error' => 'Failed to create zip archive'], 500);
        }

        // Iterate through each table
        foreach ($tables as $tableName) {
            // Retrieve data from the table
            $data = DB::table($tableName)->get();

            // Get the column names of the table
            $columns = DB::getSchemaBuilder()->getColumnListing($tableName);

            // Specify the path where you want to save the SQL dump file
            $dumpFilePath = "{$backupDirectory}/{$tableName}_backup.sql";

            // Open the SQL dump file for writing
            $fileHandle = fopen($dumpFilePath, 'w');

            // Iterate through the data and write INSERT statements to the file
            foreach ($data as $row) {
                // Construct the INSERT statement with dynamic column names
                $insertStatement = "INSERT INTO $tableName (".implode(', ', $columns).") VALUES (";

                // Iterate through the columns and add values to the INSERT statement
                foreach ($columns as $column) {
                    $insertStatement .= "'".$row->$column."', ";
                }

                // Remove the trailing comma and add the closing parenthesis
                $insertStatement = rtrim($insertStatement, ', ') . ");";

                // Write the INSERT statement to the file
                fwrite($fileHandle, $insertStatement . PHP_EOL);
            }

            // Close the file handle
            fclose($fileHandle);

            // Add the SQL dump file to the zip archive
            $zip->addFile($dumpFilePath, "{$tableName}_backup.sql");
        }

        // Close the zip archive
        $zip->close();

        // Set headers for zip file download
        $headers = [
            'Content-Type' => 'application/zip',
            'Content-Disposition' => "attachment; filename=sql_backup_{$date}.zip",
        ];

        // Return the response with the zip file
        if (Auth::check()) {

            BackupDetail::create([
                'username' => auth()->user()->username,
                'date' => Carbon::now()->tz('Asia/Colombo')->format('Y-m-d'),
                'time' => Carbon::now()->tz('Asia/Colombo')->format('H:i:s'),
            ]);
            return Response::download($zipFilePath, "sql_backup_{$date}.zip", $headers)->deleteFileAfterSend(true);
        } else {
                
             return view('login');
        }
        
    }

}
