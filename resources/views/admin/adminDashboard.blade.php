@extends('admin.sideMenu')
@section("main-content")
    <div class="ad_displayDetails col-10 ">

        <div class="row text-center ">
            <div class="col-xl-4 col-sm-6 mb-xl-0 ">
                <div class="card pl-5 pt-2 pb-2" style="background-color: rgba(248, 119, 119, 0.808); color:white;">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-12 text-center">
                                <div class="numbers">
                                    <h5 class="text mb-0 text-uppercase font-weight-bold">Admin</h5>
                                    <h3 class="font-weight-bolder mt-3 mb-0" style="font-size: 2.5rem;">
                                        {{$adminUsersCount}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 ">
                <div class="card pl-5 pt-2 pb-2" style="background-color: rgba(248, 197, 119, 0.856); color:white;">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-12 text-center">
                                <div class="numbers">
                                    <h5 class="text mb-0 text-uppercase font-weight-bold">Users</h5>
                                    <h3 class="font-weight-bolder mt-3 mb-0" style="font-size: 2.5rem;">
                                        {{$usersCount}}
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 ">
                <div class="card pt-2 pb-2"
                     style="background-color: rgba(24, 202, 1, 0.486); color:white;">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-12 text-center">
                                <div class="numbers">
                                    <h5 class="text mb-0 text-uppercase font-weight-bold">Membership</h5>
                                    <h3 class="font-weight-bolder mt-3 mb-0" style="font-size: 2.5rem;">
                                        {{$membershipsCount}}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 ">
                <div class="card pt-2 pb-2"
                     style="background-color: rgba(130, 247, 208, 0.87); color:white;">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-12 text-center">
                                <div class="numbers">
                                    <h5 class="text mb-0 text-uppercase font-weight-bold">Author</h5>
                                    <h3 class="font-weight-bolder mt-3 mb-0" style="font-size: 2.5rem;">
                                        {{$authorsCount}}
                                    </h3>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 ">
                <div class="card pt-2 pb-2"
                     style="background-color: rgba(119, 201, 248, 0.884); color:white;">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-12 text-center">
                                <div class="numbers">
                                    <h5 class="text mb-0 text-uppercase font-weight-bold">Genre</h5>
                                    <h3 class="font-weight-bolder mt-3 mb-0" style="font-size: 2.5rem;">
                                       {{$genresCount}}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 mb-xl-0 ">
                <div class="card pl-5 pt-2 pb-2" style="background-color: rgba(119, 171, 248, 0.753); color:white;">
                    <div class="card-body p-3">
                        <div class="row align-items-center">
                            <div class="col-12 text-center">
                                <div class="numbers">
                                    <h5 class="text mb-0 text-uppercase font-weight-bold">Books</h5>
                                    <h3 class="font-weight-bolder mt-3 mb-0" style="font-size: 2.5rem;">
                                       {{$booksCount}}
                                    </h3>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
