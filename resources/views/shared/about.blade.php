@extends('layouts.main_page')
@section('custom-style')

<style>
   // custom style
</style>

@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1 class="section-title">About</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
              <h4>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Neque, porro.</h4>
            </div>
            <div class="card-body">
              <p>Sunt in culpa qui officia deserunt mollit anim id est laborum:</p>
              <ol>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</li>
                <li>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</li>
                <li>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</li>
                <li>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</li>
                <li>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</li>
                <li>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
                <li>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse</li>
              </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="accordion">
                    <div class="accordion">
                      <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                        <h4>Vision</h4>
                      </div>
                      <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                      </div>
                    </div>
                    <div class="accordion">
                      <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-2">
                        <h4>Mission</h4>
                      </div>
                      <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
