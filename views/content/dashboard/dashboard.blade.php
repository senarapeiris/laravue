@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard')

@section('vendor-style')
{{-- vendor css files --}}
<link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/toastr.min.css')) }}">
@endsection
@section('page-style')
{{-- Page css files --}}
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/dashboard-ecommerce.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/charts/chart-apex.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/extensions/ext-component-toastr.css')) }}">
@endsection

@section('content')

<div class="row match-height">

    <!-- Medal Card -->
    <div class="col-xl-4 col-md-6 col-12">
        <div class="card card-congratulation-medal">
            <div class="card-body">
                <h5>New Applications</h5>
                <p class="card-text font-small-3">Count as of {{ date('Y-m-d') }}</p>
                <h3 class="mb-75 mt-2 pt-50">
                    <a href="">{{ $newApplicationsCount }} Applications</a>
                </h3>
                <a class="btn btn-primary" href="{{ route('new-application') }}">View All</a>
                <img src="{{asset('images/illustration/badge.svg')}}" class="congratulation-medal" alt="Medal Pic" />
            </div>
        </div>
    </div>
    <!--/ Medal Card -->

    <!-- Statistics Card -->
    <div class="col-xl-8 col-md-6 col-12">
        <div class="card card-statistics">
            <div class="card-header">
                <h4 class="card-title">Statistics</h4>
                <div class="d-flex align-items-center">
                    <p class="card-text font-small-2 mr-25 mb-0">Updated on {{ date('Y-m-d') }}</p>
                </div>
            </div>
            <div class="card-body statistics-body">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="media">
                            <div class="avatar bg-light-primary mr-2">
                                <div class="avatar-content">
                                    <i data-feather="globe" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <h4 class="font-weight-bolder mb-0">{{ $countriesCount }}</h4>
                                <p class="card-text font-small-3 mb-0">Countries</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                        <div class="media">
                            <div class="avatar bg-light-info mr-2">
                                <div class="avatar-content">
                                    <i data-feather="grid" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <h4 class="font-weight-bolder mb-0">{{ $categoriesCount }}</h4>
                                <p class="card-text font-small-3 mb-0">Categories</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                        <div class="media">
                            <div class="avatar bg-light-danger mr-2">
                                <div class="avatar-content">
                                    <i data-feather="briefcase" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <h4 class="font-weight-bolder mb-0">{{ $jobVacanciesCount }}</h4>
                                <p class="card-text font-small-3 mb-0">Job Vacancies</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12">
                        <div class="media">
                            <div class="avatar bg-light-success mr-2">
                                <div class="avatar-content">
                                    <i data-feather="users" class="avatar-icon"></i>
                                </div>
                            </div>
                            <div class="media-body my-auto">
                                <h4 class="font-weight-bolder mb-0">{{ $applicantsCount }}</h4>
                                <p class="card-text font-small-3 mb-0">Applicants</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Statistics Card -->
</div>



<div class="row match-height">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Latest Job Vacancies</h4>
                <div class="dt-action-buttons text-right">
                    <a class="btn create-new btn-primary" href="{{ route('job-vacancy') }}">View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="job-vacancies-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Country</th>
                                <th>Category</th>
                                <th>Job Vacancy Name (English)</th>
                                <th>Job Vacancy Name (Sinhala)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jobVacancies as $key=>$jobVacancy)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $jobVacancy->country->country_name_english }}</td>
                                <td>{{ $jobVacancy->category->category_name_english }}</td>
                                <td>{{ $jobVacancy->job_vacancy_name_english }}</td>
                                <td>{{ $jobVacancy->job_vacancy_name_sinhala }}</td>
                                <td>
                                    @if($jobVacancy->status == 1)
                                    <span class="badge badge-pill badge-light-success">Active</span>
                                    @else
                                    <span class="badge badge-pill badge-light-danger">Closed</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row match-height">
    <div class="col-lg-12 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Latest Applications</h4>
                <div class="dt-action-buttons text-right">
                    <a class="btn create-new btn-primary" href="{{ route('new-application') }}">View All</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="job-vacancies-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Applicant</th>
                                <th>Country</th>
                                <th>Category</th>
                                <th>Job Vacancy</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($newApplications as $key=>$newApplication)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $newApplication->created_at->toDateString() }}</td>
                                <td>{{ $newApplication->applicant->applicant_name }}</td>
                                <td>{{ $newApplication->country->country_name_english }}</td>
                                <td>{{ $newApplication->category->category_name_english }}</td>
                                <td>{{ $newApplication->jobVacancy->job_vacancy_name_english }}</td>
                                <td>
                                    @if($newApplication->status == 1)
                                    <span class="badge badge-pill badge-light-dark">New</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</section>

@endsection

@section('vendor-script')
{{-- vendor files --}}
<script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
