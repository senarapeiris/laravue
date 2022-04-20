<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
  // country
  public function index()
  {
    $countries = Country::get();

    $breadcrumbs = [
    ['link' => "/", 'name' => "Home"], ['name' => "Country"]
    ];

    return view('/content/country/index', [
      'breadcrumbs' => $breadcrumbs,
      'countries' => $countries
    ]);
  }


  // add country
  public function addCountry()
  {
    $breadcrumbs = [
    ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Country"], ['name' => "Add Country"]
    ];

    return view('/content/country/add-country', ['breadcrumbs' => $breadcrumbs]);
  }


  public function createCountry(Request $request)
  {
    $country = new Country();
    $country->country_name_english = $request->country_name_english;
    $country->country_name_sinhala = $request->country_name_sinhala;
    $country->status = 1;

    $country->save();

    return redirect()->back()->with('success', 'Country added successfully !!!');
  }


  public function editCountry($id)
  {
    $country = Country::find($id);

    $breadcrumbs = [
    ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Country"], ['name' => "Edit Country"]
    ];

    return view('/content/country/edit-country', [
    'breadcrumbs' => $breadcrumbs,
    'country' => $country,
    ]);
  }


  public function updateCountry(Request $request)
  {
  $country = Country::find($request->country_id);
  $country->country_name_english = $request->country_name_english;
  $country->country_name_sinhala = $request->country_name_sinhala;

  $country->update();

  return redirect()->back()->with('success', 'Country updated successfully !!!');
  }


  public function inactivateCountry($id)
  {
  $country = Country::find($id);
  $country->status = 0;
  $country->update();

  return redirect()->back()->with('success', 'Country inactivated successfully !!!');
  }


  public function activateCountry($id)
  {
  $country = Country::find($id);
  $country->status = 1;
  $country->update();

  return redirect()->back()->with('success', 'Country activated successfully !!!');
  }
  

}