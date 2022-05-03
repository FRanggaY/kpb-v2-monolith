@extends('layouts.main_page')
@section('custom-style')

<style>
   // custom style
</style>

@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1 class="section-title">Documentation</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
              <h4>Tutorial</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-4">
                  <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab">Introduction</a>
                    <a class="list-group-item list-group-item-action" id="list-user-list" data-toggle="list" href="#list-user" role="tab">Create User (Admin Role Only)</a>
                    <a class="list-group-item list-group-item-action" id="list-activity-list" data-toggle="list" href="#list-activity" role="tab">Create Activity</a>
                    <a class="list-group-item list-group-item-action" id="list-gallery-list" data-toggle="list" href="#list-gallery" role="tab">Create Gallery</a>
                    <a class="list-group-item list-group-item-action" id="list-advertise-list" data-toggle="list" href="#list-advertise" role="tab">Create Advertise</a>
                  </div>
                </div>
                <div class="col-lg-8">
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        This is a simple step-by-step documentation for using this website
                    </div>
                    <div class="tab-pane fade" id="list-user" role="tabpanel" aria-labelledby="list-user-list">
                        <p>These are the steps to create an activity</p>
                        <ol>
                            <li>Enter your <code>username and password</code> on the login page, then press the <code>login button</code>
                                <br> <span class="font-weight-bold">Note : account must have admin role</span>
                            </li>
                            <li>On the dashboard page, click the <code>user button</code> in the sidebar</li>
                            <li>After that, press the <code>create user button</code> </li>
                            <li>Fill in the required data, after that click the <code>register button</code> </li>
                            <li>User created successfully</li>
                            <li>To display the data to the active and useable, look for the data that has been created in the table, then click the <code>button with the green list logo</code> and select <code>change status</code></li>
                            <li>A notification message will appear after that, press <code>yes</code></li>
                            <li>User successfully appeared actively and ready to use</li>
                        </ol>
                    </div>
                    <div class="tab-pane fade" id="list-activity" role="tabpanel" aria-labelledby="list-activity-list">
                        <p>These are the steps to create an activity</p>
                        <ol>
                            <li>Enter your <code>username and password</code> on the login page, then press the <code>login button</code> </li>
                            <li>On the dashboard page, click the <code>activity button</code> in the sidebar</li>
                            <li>After that, press the <code>create activity button</code> </li>
                            <li>Fill in the required data, after that click the <code>publish button</code> </li>
                            <li>Activity created successfully</li>
                        </ol>
                    </div>
                    <div class="tab-pane fade" id="list-gallery" role="tabpanel" aria-labelledby="list-gallery-list">
                        <p>These are the steps to create an gallery</p>
                        <ol>
                            <li>Enter your <code>username and password</code> on the login page, then press the <code>login button</code> </li>
                            <li>On the dashboard page, click the <code>gallery button</code> in the sidebar</li>
                            <li>After that, press the <code>create gallery button</code> </li>
                            <li>Fill in the required data, after that click the <code>publish button</code> </li>
                            <li>gallery created successfully</li>
                            <li>To display the data to the public, look for the data that has been created in the table, then click the <code>button with the green list logo</code> and select <code>change status</code></li>
                            <li>A notification message will appear after that, press <code>yes</code></li>
                            <li>gallery successfully appeared publicly</li>
                        </ol>
                    </div>
                    <div class="tab-pane fade" id="list-advertise" role="tabpanel" aria-labelledby="list-advertise-list">
                        <p>These are the steps to create an advertise</p>
                        <ol>
                            <li>Enter your <code>username and password</code> on the login page, then press the <code>login button</code> </li>
                            <li>On the dashboard page, click the <code>advertise button</code> in the sidebar</li>
                            <li>After that, press the <code>create advertise button</code> </li>
                            <li>Fill in the required data, after that click the <code>publish button</code> </li>
                            <li>Advertise created successfully</li>
                            <li>To display the data to the public, look for the data that has been created in the table, then click the <code>button with the green list logo</code> and select <code>change status</code></li>
                            <li>A notification message will appear after that, press <code>yes</code></li>
                            <li>Advertise successfully appeared publicly</li>
                        </ol>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </section>


@endsection
@section('script')
<script>
    //custom script
</script>
@endsection
