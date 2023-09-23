<?php

namespace App\Listeners;

use App\Events\SendPayslip;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Carbon\Carbon;
use PDF;
use Storage;
use App\PayrollDetails;

class SendIndividualPayslip
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\SendPayslip  $event
     * @return void
     */
    public function handle(SendPayslip $event)
    {
        //(URL('public/payslip/Payslip_Oct_2022.pdf'));

        $date_of_payment = $event->date_of_payment;
        $month = date('m', strtotime($date_of_payment));
        $year = date('Y', strtotime($date_of_payment));
        $paydate = date('Y-m-d', strtotime($date_of_payment));
       $payrollDetail = $event->payrollDetail;

                $data['userProperty'] = $payrollDetail->user->getPropertys();
        $data['user'] = $payrollDetail->user;
        $data['payrollDetail'] = $payrollDetail;
        $data['start_date'] = Carbon::create($payrollDetail->payslip_date_from)->startOfMonth();
        $data['end_date'] = Carbon::create($payrollDetail->payslip_date_to)->lastOfMonth();
        // $data['payslip_date'] = date("M Y", strtotime($payrollDetail->payslip_date_from ." -1 month"));
        // $data['payslip_on_date'] = date("M Y", strtotime($payrollDetail->payslip_date_from));
        $data['payslip_date'] = date("d-m-Y", strtotime($payrollDetail->payslip_start_date));
        $data['payslip_on_date'] = date("d-m-Y", strtotime($payrollDetail->payslip_end_date));

        

        $user  = $data['user'];
        //dd($user->user_id);
        $PaySlipName = @$user->first_name."_" . $user->user_id."_".date('M-Y',strtotime($payrollDetail->payslip_start_date))."_PaySlip.pdf";
        
         $pdf = PDF::loadView('payroll.pdf.UserPayslipPdf',$data)->setOptions(['defaultFont' => 'sans-serif']);
         
           $dom_pdf = $pdf->getDomPDF()->set_option("enable_php", true);
         $dom_pdf = $pdf->getDomPDF()->set_option('isHtml5ParserEnabled', true);
         $dom_pdf = $pdf->getDomPDF()->set_option('isRemoteEnabled', true);

         $pdf->showImageErrors = true;
         $canvas  = $dom_pdf->get_canvas();
         $footer  = $canvas->open_object();
         $w          = $canvas->get_width();
         $h          = $canvas->get_height();
         $canvas->page_text($w - 100, $h - 28, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
         $canvas->close_object();
         $canvas->add_object($footer, "all");

        Storage::put('public/payslip/'.$PaySlipName, $pdf->output());

    

    }
}
