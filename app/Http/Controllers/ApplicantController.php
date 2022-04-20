<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;

class ApplicantController extends Controller
{
  // applicant
  public function index()
  {
  $applicants = Applicant::get();

  $breadcrumbs = [
  ['link' => "/", 'name' => "Home"], ['name' => "Applicant"]
  ];

  return view('/content/applicant/index', [
  'breadcrumbs' => $breadcrumbs,
  'applicants' => $applicants
  ]);
  }


  public function editApplicant($id)
  {
  $applicant = Applicant::find($id);

  $breadcrumbs = [
  ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Country"], ['name' => "Edit Applicant"]
  ];

  return view('/content/applicant/edit-applicant', [
  'breadcrumbs' => $breadcrumbs,
  'applicant' => $applicant,
  ]);
  }


  public function updateApplicant(Request $request)
  {
  $applicant = Applicant::find($request->applicant_id);
  $applicant->applicant_name = $request->applicant_name;
  $applicant->address = $request->address;
  $applicant->phone_no_1 = $request->phone_no_1;
  $applicant->phone_no_2 = $request->phone_no_2;
  $applicant->passport_no = $request->passport_no;

  $applicant->update();

  return redirect()->back()->with('success', 'Applicant updated successfully !!!');
  }


  public function inactivateApplicant($id)
  {
  $applicant = Applicant::find($id);
  $applicant->status = 0;
  $applicant->update();

  return redirect()->back()->with('success', 'Applicant inactivated successfully !!!');
  }


  public function activateApplicant($id)
  {
  $applicant = Applicant::find($id);
  $applicant->status = 1;
  $applicant->update();

  return redirect()->back()->with('success', 'Applicant activated successfully !!!');
  }

}