<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Country;
use App\Category;
use App\JobVacancy;
use App\Applicant;

class DashboardController extends Controller
{
  //dashboard
  public function index()
  {
    $newApplicationsCount = Application::where('status', 1)->count();
    $countriesCount = Country::where('status', 1)->count();
    $categoriesCount = Category::where('status', 1)->count();
    $jobVacanciesCount = JobVacancy::where('status', 1)->count();
    $applicantsCount = Applicant::where('status', 1)->count();
    $jobVacancies = JobVacancy::get();
    $newApplications = Application::where('status', 1)->get();

    $pageConfigs = ['pageHeader' => false];

    return view('/content/dashboard/dashboard', [
      'pageConfigs' => $pageConfigs,
      'newApplicationsCount' => $newApplicationsCount,
      'countriesCount' => $countriesCount,
      'categoriesCount' => $categoriesCount,
      'jobVacanciesCount' => $jobVacanciesCount,
      'applicantsCount' => $applicantsCount,
      'jobVacancies' => $jobVacancies,
      'newApplications' => $newApplications
    ]);
  }


  public function userDashboard()
  {


    return view('/content/dashboard/dashboard-user');
  }
}
