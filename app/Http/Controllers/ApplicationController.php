<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\User;

class ApplicationController extends Controller
{
  // new applications
  public function newApplication()
  {
    $newApplications = Application::where('status', 1)->get();
    $users = User::where('status', 1)->get();

    $breadcrumbs = [
    ['link' => "/", 'name' => "Home"], ['name' => "Application"]
    ];

    return view('/content/application/new-applications', [
    'breadcrumbs' => $breadcrumbs,
    'newApplications' => $newApplications,
    'users' => $users
    ]);
  }


  public function assignNewApplication(Request $request)
  {
    $newApplication = Application::find($request->application_id);
    $newApplication->assigned_to = $request->assigned_to;
    $newApplication->status = 2;

    $newApplication->update();

    return redirect()->back()->with('success', 'Application assigned successfully !!!');
  }


  public function rejectApplication($id)
  {
    $newApplication = Application::find($id);
    $newApplication->status = 6;
    $newApplication->update();

    return redirect()->back()->with('success', 'Application rejected successfully !!!');
  }


  public function assignedApplication()
  {
    $assignedApplications = Application::where('status', 2)->get();

    $breadcrumbs = [
    ['link' => "/", 'name' => "Home"], ['name' => "Application"]
    ];

    return view('/content/application/assigned-applications', [
    'breadcrumbs' => $breadcrumbs,
    'assignedApplications' => $assignedApplications
    ]);
  }


  public function selectedApplication()
  {
    $selectedApplications = Application::where('status', 3)->get();

    $breadcrumbs = [
    ['link' => "/", 'name' => "Home"], ['name' => "Application"]
    ];

    return view('/content/application/selected-applications', [
    'breadcrumbs' => $breadcrumbs,
    'selectedApplications' => $selectedApplications
    ]);
  }


  public function waitingApplication()
  {
    $waitingApplications = Application::where('status', 4)->get();

    $breadcrumbs = [
    ['link' => "/", 'name' => "Home"], ['name' => "Application"]
    ];

    return view('/content/application/waiting-applications', [
    'breadcrumbs' => $breadcrumbs,
    'waitingApplications' => $waitingApplications
    ]);
  }


  public function completedApplication()
  {
    $completedApplications = Application::where('status', 5)->get();

    $breadcrumbs = [
    ['link' => "/", 'name' => "Home"], ['name' => "Application"]
    ];

    return view('/content/application/completed-applications', [
    'breadcrumbs' => $breadcrumbs,
    'completedApplications' => $completedApplications
    ]);
  }



    public function rejectedApplication()
    {
    $rejectedApplications = Application::where('status', 6)->get();

    $breadcrumbs = [
    ['link' => "/", 'name' => "Home"], ['name' => "Application"]
    ];

    return view('/content/application/rejected-applications', [
    'breadcrumbs' => $breadcrumbs,
    'rejectedApplications' => $rejectedApplications
    ]);
    }


}