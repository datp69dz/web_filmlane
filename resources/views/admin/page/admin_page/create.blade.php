<!-- resources/views/movies/index.blade.php -->
@extends('admin.layout.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="row">
            <div class="col-x">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Basic Layout</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class=" col-lg-6 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Username</label>
                                        <input type="username" class="form-control" id="username"
                                            placeholder="John Doe" />
                                    </div>
                                </div>

                                <div class=" col-lg-6  col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-company">Password</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="ACME Inc." />
                                    </div>
                                </div>
                              </div>

                              <div class=" col-lg-6  col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-company">Email</label>
                                    <input type="email" class="form-control" id="email"
                                        placeholder="ACME Inc." />
                                </div>
                            </div>
                          </div>

                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
