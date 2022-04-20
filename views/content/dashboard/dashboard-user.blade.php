@extends('layouts/contentLayoutMasterUser')

@section('title', 'User Dashboard')

@section('vendor-style')
vendor css files
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
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
    <div class="row match-height">

        <!-- view card -->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar bg-light-info p-50 mb-1">
                        <div class="avatar-content">
                            <i data-feather="briefcase" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder">10</h2>
                    <p class="card-text">Newly Added Jobs</p>
                </div>
            </div>
        </div>
        <!-- view card -->


        <!-- view card -->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar bg-light-danger p-50 mb-1">
                        <div class="avatar-content">
                            <i data-feather="file-text" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder">30</h2>
                    <p class="card-text">New Applications</p>
                </div>
            </div>
        </div>
        <!-- view card -->


        <!-- view card -->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar bg-light-success p-50 mb-1">
                        <div class="avatar-content">
                            <i data-feather="users" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder">15</h2>
                    <p class="card-text">New Users</p>
                </div>
            </div>
        </div>
        <!-- view card -->


        <!-- view card -->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar bg-light-warning p-50 mb-1">
                        <div class="avatar-content">
                            <i data-feather="layers" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder">5</h2>
                    <p class="card-text">Pending Applications</p>
                </div>
            </div>
        </div>
        <!-- view card -->
    </div>

    <div class="row match-height">
        <div class="col-lg-7 col-12">
        <div class="card">
        <div class="card-header">
          <h4 class="card-title">Newly Added Jobs</h4>
        </div>
        <div class="card-body">
          <p class="card-text">Add nearly any HTML within, even for linked list groups like the one below.</p>
          <div class="list-group">
            <a href="javascript:void(0)" class="list-group-item list-group-item-action active">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 text-white">List group item heading</h5>
                <small class="text-secondary">3 days ago</small>
              </div>
              <p class="card-text">
                Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.
              </p>
              <small class="text-secondary">Donec id elit non mi porta.</small>
            </a>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5>
                <small class="text-secondary">3 days ago</small>
              </div>
              <p class="card-text">
                Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.
              </p>
              <small class="text-secondary">Donec id elit non mi porta.</small>
            </a>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5>
                <small class="text-secondary">3 days ago</small>
              </div>
              <p class="card-text">
                Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.
              </p>
              <small class="text-secondary">Donec id elit non mi porta.</small>
            </a>
          </div>
        </div>
</div>
        </div>

        <!-- Revenue Report Card -->
        <div class="col-lg-5 col-12">
        <div class="card">
        <div class="card-header">
          <h4 class="card-title">Recent Application</h4>
        </div>
        <div class="card-body">
          <p class="card-text">Add nearly any HTML within, even for linked list groups like the one below.</p>
          <div class="list-group">
            <a href="javascript:void(0)" class="list-group-item list-group-item-action active">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1 text-white">List group item heading</h5>
                <small class="text-secondary">3 days ago</small>
              </div>
              <p class="card-text">
                Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.
              </p>
              <small class="text-secondary">Donec id elit non mi porta.</small>
            </a>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5>
                <small class="text-secondary">3 days ago</small>
              </div>
              <p class="card-text">
                Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.
              </p>
              <small class="text-secondary">Donec id elit non mi porta.</small>
            </a>
            <a href="javascript:void(0)" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">List group item heading</h5>
                <small class="text-secondary">3 days ago</small>
              </div>
              <p class="card-text">
                Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.
              </p>
              <small class="text-secondary">Donec id elit non mi porta.</small>
            </a>
          </div>
        </div>
</div>
        </div>
        <!--/ Revenue Report Card -->
    </div>

    
</section>
<!-- Dashboard Ecommerce ends -->

<script>
  x = document.getElementByClassName(".buy-now");
alert(x);

window.onload = function() {
  
  
}

</script>

@endsection

@section('vendor-script')
{{-- vendor files --}}
<script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
@endsection
@section('page-script')
{{-- Page js files --}}
<script src="{{ asset(mix('js/scripts/pages/dashboard-ecommerce.js')) }}"></script>
@endsection