<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobVacancy;
use App\Country;
use App\Category;

class JobVacancyController extends Controller
{

// job vacancy
public function index()
{
    $jobVacancies = JobVacancy::get();

    $breadcrumbs = [
    ['link' => "/", 'name' => "Home"], ['name' => "Job Vacancy"]
    ];

    return view('/content/job-vacancy/index', [
    'breadcrumbs' => $breadcrumbs,
    'jobVacancies' => $jobVacancies,

    ]);
}


// add job vacancy
public function addJobVacancy()
{
    $countries = Country::where('status', 1)->get();
    $categories = Category::where('status', 1)->get();

    $breadcrumbs = [
    ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Job Vacancy"], ['name' =>"Add Job Vacancy"]
    ];

    return view('/content/job-vacancy/add-job-vacancy', [
    'breadcrumbs' => $breadcrumbs,
    'countries' => $countries,
    'categories' => $categories
    ]);
}


public function createJobVacancy(Request $request)
{
    $jobVacancy = new JobVacancy();
    $jobVacancy->country_id = $request->country_id;
    $jobVacancy->category_id = $request->category_id;
    $jobVacancy->job_vacancy_name_english = $request->job_vacancy_name_english;
    $jobVacancy->job_vacancy_name_sinhala = $request->job_vacancy_name_sinhala;
    $jobVacancy->job_vacancy_qualification = $request->job_vacancy_qualification;
    $jobVacancy->job_vacancy_experience = $request->job_vacancy_experience;
    $jobVacancy->salary = $request->salary;
    $jobVacancy->accommodation = $request->accommodation;
    $jobVacancy->food = $request->food;
    $jobVacancy->working_hours = $request->working_hours;
    $jobVacancy->medical = $request->medical;
    $jobVacancy->contract_duration = $request->contract_duration;
    $jobVacancy->charges = $request->charges;
    $jobVacancy->required_document = $request->required_document;
    $jobVacancy->status = 1;

    $jobVacancy->save();

    return redirect()->back()->with('success', 'Job vacancy added successfully !!!');
}


public function editJobVacancy($id)
{
    $jobVacancy = JobVacancy::find($id);
    $countries = Country::where('status', 1)->get();
    $categories = Category::where('status', 1)->get();

    $breadcrumbs = [
    ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Job Vacancy"], ['name' =>"Edit Job Vacancy"]
    ];

    return view('/content/job-vacancy/edit-job-vacancy', [
    'breadcrumbs' => $breadcrumbs,
    'jobVacancy' => $jobVacancy,
    'countries' => $countries,
    'categories' => $categories
    ]);
}


public function updateJobVacancy(Request $request)
{
    $jobVacancy = JobVacancy::find($request->job_vacancy_id);
    $jobVacancy->country_id = $request->country_id;
    $jobVacancy->category_id = $request->category_id;
    $jobVacancy->job_vacancy_name_english = $request->job_vacancy_name_english;
    $jobVacancy->job_vacancy_name_sinhala = $request->job_vacancy_name_sinhala;
    $jobVacancy->job_vacancy_qualification = $request->job_vacancy_qualification;
    $jobVacancy->job_vacancy_experience = $request->job_vacancy_experience;
    $jobVacancy->salary = $request->salary;
    $jobVacancy->accommodation = $request->accommodation;
    $jobVacancy->food = $request->food;
    $jobVacancy->working_hours = $request->working_hours;
    $jobVacancy->medical = $request->medical;
    $jobVacancy->contract_duration = $request->contract_duration;
    $jobVacancy->charges = $request->charges;
    $jobVacancy->required_document = $request->required_document;

    $jobVacancy->update();

    return redirect()->back()->with('success', 'Job vacancy updated successfully !!!');
}


public function inactivateJobVacancy($id)
{
    $jobVacancy = JobVacancy::find($id);
    $jobVacancy->status = 0;
    $jobVacancy->update();

    return redirect()->back()->with('success', 'Job vacancy inactivated successfully !!!');
}


public function activateJobVacancy($id)
{
    $jobVacancy = JobVacancy::find($id);
    $jobVacancy->status = 1;
    $jobVacancy->update();

    return redirect()->back()->with('success', 'Job vacancy activated successfully !!!');
}

}