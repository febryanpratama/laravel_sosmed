@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-xl-8 col-12">
                  <div class="row">						
                      <div class="col-xl-3 col-md-6 col-6">
                          <div class="box">
                              <div class="box-body text-center">
                                  <div class="bg-primary-light rounded10 p-20 mx-auto w-100 h-100">
                                      <img src="https://rhythm-admin-template.multipurposethemes.com/images/svg-icon/medical/icon-1.svg" class="" alt="" />
                                  </div>
                                  <p class="text-fade mt-15 mb-5">Total Patients</p>
                                  <h2 class="mt-0">1,548</h2>
                              </div>
                          </div>
                      </div>						
                      <div class="col-xl-3 col-md-6 col-6">
                          <div class="box">
                              <div class="box-body text-center">
                                  <div class="bg-danger-light rounded10 p-20 mx-auto w-100 h-100">
                                      <img src="https://rhythm-admin-template.multipurposethemes.com/images/svg-icon/medical/icon-2.svg" class="" alt="" />
                                  </div>
                                  <p class="text-fade mt-15 mb-5">Consulation</p>
                                  <h2 class="mt-0">448</h2>
                              </div>
                          </div>
                      </div>						
                      <div class="col-xl-3 col-md-6 col-6">
                          <div class="box">
                              <div class="box-body text-center">
                                  <div class="bg-warning-light rounded10 p-20 mx-auto w-100 h-100">
                                      <img src="https://rhythm-admin-template.multipurposethemes.com/images/svg-icon/medical/icon-3.svg" class="" alt="" />
                                  </div>
                                  <p class="text-fade mt-15 mb-5">Staff</p>
                                  <h2 class="mt-0">848</h2>
                              </div>
                          </div>
                      </div>						
                      <div class="col-xl-3 col-md-6 col-6">
                          <div class="box">
                              <div class="box-body text-center">
                                  <div class="bg-info-light rounded10 p-20 mx-auto w-100 h-100">
                                      <img src="https://rhythm-admin-template.multipurposethemes.com/images/svg-icon/medical/icon-4.svg" class="" alt="" />
                                  </div>
                                  <p class="text-fade mt-15 mb-5">Total Rooms</p>
                                  <h2 class="mt-0">3,100</h2>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-xl-6 col-12">						
                          <div class="box">
                              <div class="box-header">
                                  <h4 class="box-title">Daily Revenue Report</h4>
                              </div>
                              <div class="box-body">							
                                  <h3 class="text-primary mt-0">$32,485 <small class="text-muted">$12,458</small></h3>
                                  <div id="recent_trend"></div>							
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-6 col-12">						
                          <div class="box">
                              <div class="box-header">
                                  <h4 class="box-title">Payments history</h4>
                              </div>
                              <div class="box-body">	
                                  <div class="inner-user-div2">
                                      <div>
                                          <div class="d-flex justify-content-between align-items-end">
                                              <div>
                                                  <a href="#" class="text-muted hover-primary"><i class="fa fa-link"></i> Dr. Johen Doe</a>
                                                  <h5 class="my-5">Kidney function test</h5>
                                              </div>
                                              <div>
                                                  <h5 class="my-5">$ 25.15</h5>
                                              </div>
                                          </div>
                                          <div class="d-flex justify-content-between align-items-end mb-15 py-10 bb-dashed border-bottom">
                                              <div>
                                                  <p class="mb-0 text-muted"><i class="fa fa-clock-o"></i> Sunday, 16 May</p>
                                              </div>
                                              <div>
                                                  <div class="dropdown">
                                                      <a data-bs-toggle="dropdown" href="#" class="base-font"><i class="ti-more-alt text-muted"></i></a>
                                                      <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                                        <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                                        <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div>
                                          <div class="d-flex justify-content-between align-items-end">
                                              <div>
                                                  <a href="#" class="text-muted hover-primary"><i class="fa fa-link"></i> Dr. Michael Doe</a>
                                                  <h5 class="my-5">Emergency appointment</h5>
                                              </div>
                                              <div>
                                                  <h5 class="my-5">$ 99.15</h5>
                                              </div>
                                          </div>
                                          <div class="d-flex justify-content-between align-items-end mb-15 py-10 bb-dashed border-bottom">
                                              <div>
                                                  <p class="mb-0 text-muted"><i class="fa fa-clock-o"></i> Sunday, 16 May</p>
                                              </div>
                                              <div>
                                                  <div class="dropdown">
                                                      <a data-bs-toggle="dropdown" href="#" class="base-font"><i class="ti-more-alt text-muted"></i></a>
                                                      <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                                        <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                                        <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div>
                                          <div class="d-flex justify-content-between align-items-end">
                                              <div>
                                                  <a href="#" class="text-muted hover-primary"><i class="fa fa-link"></i> Dr. Bertie Maxwell</a>
                                                  <h5 class="my-5">Complementation test</h5>
                                              </div>
                                              <div>
                                                  <h5 class="my-5">$ 40.45</h5>
                                              </div>
                                          </div>
                                          <div class="d-flex justify-content-between align-items-end mb-15 py-10 bb-dashed border-bottom">
                                              <div>
                                                  <p class="mb-0 text-muted"><i class="fa fa-clock-o"></i> Sunday, 16 May</p>
                                              </div>
                                              <div>
                                                  <div class="dropdown">
                                                      <a data-bs-toggle="dropdown" href="#" class="base-font"><i class="ti-more-alt text-muted"></i></a>
                                                      <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                                        <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                                        <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div>
                                          <div class="d-flex justify-content-between align-items-end">
                                              <div>
                                                  <a href="#" class="text-muted hover-primary"><i class="fa fa-link"></i> Dr. Clyde Morales</a>
                                                  <h5 class="my-5">USG + Consultation</h5>
                                              </div>
                                              <div>
                                                  <h5 class="my-5">$ 29.90</h5>
                                              </div>
                                          </div>
                                          <div class="d-flex justify-content-between align-items-end mb-15 py-10 bb-dashed border-bottom">
                                              <div>
                                                  <p class="mb-0 text-muted"><i class="fa fa-clock-o"></i> Sunday, 16 May</p>
                                              </div>
                                              <div>
                                                  <div class="dropdown">
                                                      <a data-bs-toggle="dropdown" href="#" class="base-font"><i class="ti-more-alt text-muted"></i></a>
                                                      <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                                        <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                                        <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <div>
                                          <div class="d-flex justify-content-between align-items-end">
                                              <div>
                                                  <a href="#" class="text-muted hover-primary"><i class="fa fa-link"></i> Dr. Michael Doe</a>
                                                  <h5 class="my-5">Emergency appointment</h5>
                                              </div>
                                              <div>
                                                  <h5 class="my-5">$ 99.15</h5>
                                              </div>
                                          </div>
                                          <div class="d-flex justify-content-between align-items-end mb-15 py-10 bb-dashed border-bottom">
                                              <div>
                                                  <p class="mb-0 text-muted"><i class="fa fa-clock-o"></i> Sunday, 16 May</p>
                                              </div>
                                              <div>
                                                  <div class="dropdown">
                                                      <a data-bs-toggle="dropdown" href="#" class="base-font"><i class="ti-more-alt text-muted"></i></a>
                                                      <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                                        <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                                        <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-6 col-12">
                          <div class="box">
                              <div class="box-header with-border">
                                  <h4 class="box-title">Doctor List</h4>
                                  <p class="mb-0 pull-right">Today</p>
                              </div>
                              <div class="box-body">
                                  <div class="inner-user-div3">
                                      <div class="d-flex align-items-center mb-30">
                                          <div class="me-15">
                                              <img src="../images/avatar/avatar-1.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />
                                          </div>
                                          <div class="d-flex flex-column flex-grow-1 fw-500">
                                              <a href="#" class="text-dark hover-primary mb-1 fs-16">Dr. Jaylon Stanton</a>
                                              <span class="text-fade">Dentist</span>
                                          </div>
                                          <div class="dropdown">
                                              <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                              <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item flexbox" href="#">
                                                  <span>Inbox</span>
                                                  <span class="badge badge-pill badge-info">5</span>
                                                </a>
                                                <a class="dropdown-item" href="#">Sent</a>
                                                <a class="dropdown-item" href="#">Spam</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item flexbox" href="#">
                                                  <span>Draft</span>
                                                  <span class="badge badge-pill badge-default">1</span>
                                                </a>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="d-flex align-items-center mb-30">
                                          <div class="me-15">
                                              <img src="../images/avatar/avatar-10.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />
                                          </div>
                                          <div class="d-flex flex-column flex-grow-1 fw-500">
                                              <a href="#" class="text-dark hover-danger mb-1 fs-16">Dr. Carla Schleifer</a>
                                              <span class="text-fade">Oculist</span>
                                          </div>
                                          <div class="dropdown">
                                              <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                              <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item flexbox" href="#">
                                                  <span>Inbox</span>
                                                  <span class="badge badge-pill badge-info">5</span>
                                                </a>
                                                <a class="dropdown-item" href="#">Sent</a>
                                                <a class="dropdown-item" href="#">Spam</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item flexbox" href="#">
                                                  <span>Draft</span>
                                                  <span class="badge badge-pill badge-default">1</span>
                                                </a>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="d-flex align-items-center mb-30">
                                          <div class="me-15">
                                              <img src="../images/avatar/avatar-11.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />
                                          </div>
                                          <div class="d-flex flex-column flex-grow-1 fw-500">
                                              <a href="#" class="text-dark hover-success mb-1 fs-16">Dr. Hanna Geidt</a>
                                              <span class="text-fade">Surgeon</span>
                                          </div>
                                          <div class="dropdown">
                                              <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                              <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item flexbox" href="#">
                                                  <span>Inbox</span>
                                                  <span class="badge badge-pill badge-info">5</span>
                                                </a>
                                                <a class="dropdown-item" href="#">Sent</a>
                                                <a class="dropdown-item" href="#">Spam</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item flexbox" href="#">
                                                  <span>Draft</span>
                                                  <span class="badge badge-pill badge-default">1</span>
                                                </a>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="d-flex align-items-center mb-30">
                                          <div class="me-15">
                                              <img src="../images/avatar/avatar-12.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />
                                          </div>
                                          <div class="d-flex flex-column flex-grow-1 fw-500">
                                              <a href="#" class="text-dark hover-info mb-1 fs-16">Dr. Roger George</a>
                                              <span class="text-fade">General Practitioners</span>
                                          </div>
                                          <div class="dropdown">
                                              <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                              <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item flexbox" href="#">
                                                  <span>Inbox</span>
                                                  <span class="badge badge-pill badge-info">5</span>
                                                </a>
                                                <a class="dropdown-item" href="#">Sent</a>
                                                <a class="dropdown-item" href="#">Spam</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item flexbox" href="#">
                                                  <span>Draft</span>
                                                  <span class="badge badge-pill badge-default">1</span>
                                                </a>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="d-flex align-items-center">
                                          <div class="me-15">
                                              <img src="../images/avatar/avatar-15.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />
                                          </div>
                                          <div class="d-flex flex-column flex-grow-1 fw-500">
                                              <a href="#" class="text-dark hover-warning mb-1 fs-16">Dr. Natalie doe</a>
                                              <span class="text-fade">Physician</span>
                                          </div>
                                          <div class="dropdown">
                                              <a class="px-10 pt-5" href="#" data-bs-toggle="dropdown"><i class="ti-more-alt"></i></a>
                                              <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item flexbox" href="#">
                                                  <span>Inbox</span>
                                                  <span class="badge badge-pill badge-info">5</span>
                                                </a>
                                                <a class="dropdown-item" href="#">Sent</a>
                                                <a class="dropdown-item" href="#">Spam</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item flexbox" href="#">
                                                  <span>Draft</span>
                                                  <span class="badge badge-pill badge-default">1</span>
                                                </a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-6 col-12">						
                          <div class="box">
                              <div class="box-header">
                                  <h4 class="box-title">Balance</h4>
                              </div>
                              <div class="box-body">	
                                  <div class="d-flex align-items-center justify-content-between">										
                                      <div class="d-flex align-items-center">
                                          <div class="icon">
                                              <i class="fa fa-arrow-up text-primary me-10 fs-20 bg-primary-light rounded-circle text-center w-70 h-70 l-h-70"></i>
                                          </div>
                                          <div>
                                              <p class="text-muted mb-5">Income</p>
                                              <h4 class="my-0">$142K</h4>
                                          </div>
                                      </div>
                                      <div id="balance1"></div>	
                                  </div>	
                                  <div class="d-flex align-items-center justify-content-between">										
                                      <div class="d-flex align-items-center">
                                          <div class="icon">
                                              <i class="fa fa-arrow-down text-danger me-10 fs-20 bg-danger-light rounded-circle text-center w-70 h-70 l-h-70"></i>
                                          </div>
                                          <div>
                                              <p class="text-muted mb-5">Outcome</p>
                                              <h4 class="my-0">$43K</h4>
                                          </div>
                                      </div>
                                      <div id="balance2"></div>	
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="col-xl-6 col-12">						
                          <div class="box">
                              <div class="box-header">
                                  <h4 class="box-title">Patient Statistics</h4>
                              </div>
                              <div class="box-body">
                                  <div class="d-flex align-items-center">
                                      <div class="d-flex align-items-center me-30">
                                          <div class="bg-gradient-success overflow-h me-10 rounded10 w-50 h-50 l-h-50 fs-18 text-center text-white"><i class="fa fa-hospital-o"></i></div>
                                          <div>
                                              <p class="fs-14 text-fade mb-0">Admit</p>
                                              <h5 class="mb-0">2158</h5>
                                          </div>
                                      </div>
                                      <div class="d-flex align-items-center">
                                          <div class="bg-gradient-primary overflow-h me-10 rounded10 w-50 h-50 l-h-50 fs-18 text-center text-white"><i class="fa fa-home"></i></div>
                                          <div>
                                              <p class="fs-14 text-fade mb-0">Discharge</p>
                                              <h5 class="mb-0">1112</h5>
                                          </div>
                                      </div>
                                  </div>
                                  <div id="overview_trend"></div>						
                              </div>
                          </div>	
                      </div>
                      <div class="col-xl-6 col-12">
                          <div class="box">
                              <div class="box-header with-border">
                                  <h4 class="box-title">Patient Review</h4>
                              </div>
                              <div class="box-body p-0">
                                  <div class="inner-user-div">
                                    <div class="media-list bb-1 bb-dashed border-light">
                                      <div class="media align-items-center">
                                        <a class="avatar avatar-lg status-success" href="#">
                                          <img src="../images/avatar/1.jpg" class="bg-success-light" alt="...">
                                        </a>
                                        <div class="media-body">
                                          <p class="fs-16">
                                            <a class="hover-primary" href="#">Theron Trump</a>
                                          </p>
                                            <span class="text-muted">2 day ago</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="d-flex">
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star-o"></i>
                                            </div>
                                        </div>
                                      </div>					
                                      <div class="media pt-0">
                                          <p class="text-fade">Vestibulum tincidunt sit amet sapien et eleifend. Fusce pretium libero enim, nec lacinia est ultrices id. Duis nibh sapien, ultrices in hendrerit ac, pulvinar ut mauris. Quisque eu condimentum justo. </p>
                                      </div>
                                    </div>
                                    <div class="media-list bb-1 bb-dashed border-light">
                                      <div class="media align-items-center">
                                        <a class="avatar avatar-lg status-success" href="#">
                                          <img src="../images/avatar/3.jpg" class="bg-success-light" alt="...">
                                        </a>
                                        <div class="media-body">
                                          <p class="fs-16">
                                            <a class="hover-primary" href="#">Johen Doe</a>
                                          </p>
                                            <span class="text-muted">5 day ago</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="d-flex">
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                      </div>					
                                      <div class="media pt-0">
                                          <p class="text-fade">Praesent venenatis viverra turpis quis varius. Nullam ullamcorper congue urna, in sodales eros placerat non.</p>
                                      </div>
                                    </div>
                                    <div class="media-list">
                                      <div class="media align-items-center">
                                        <a class="avatar avatar-lg status-success" href="#">
                                          <img src="../images/avatar/4.jpg" class="bg-success-light" alt="...">
                                        </a>
                                        <div class="media-body">
                                          <p class="fs-16">
                                            <a class="hover-primary" href="#">Tyler Mark</a>
                                          </p>
                                            <span class="text-muted">7 day ago</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="d-flex">
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                            </div>
                                        </div>
                                      </div>					
                                      <div class="media pt-0">
                                          <p class="text-fade">Pellentesque a pretium orci. In hac habitasse platea dictumst. Nulla mattis odio enim, id euismod neque bibendum non.</p>
                                      </div>
                                    </div>
                                    <div class="media-list bb-1 bb-dashed border-light">
                                      <div class="media align-items-center">
                                        <a class="avatar avatar-lg status-success" href="#">
                                          <img src="../images/avatar/5.jpg" class="bg-success-light" alt="...">
                                        </a>
                                        <div class="media-body">
                                          <p class="fs-16">
                                            <a class="hover-primary" href="#">Theron Trump</a>
                                          </p>
                                            <span class="text-muted">2 day ago</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="d-flex">
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star-half-o"></i>
                                            </div>
                                        </div>
                                      </div>					
                                      <div class="media pt-0">
                                          <p class="text-fade">Curabitur condimentum molestie ligula iaculis euismod. Fusce nulla lectus, tincidunt eu consequat.</p>
                                      </div>
                                    </div>
                                    <div class="media-list bb-1 bb-dashed border-light">
                                      <div class="media align-items-center">
                                        <a class="avatar avatar-lg status-success" href="#">
                                          <img src="../images/avatar/6.jpg" class="bg-success-light" alt="...">
                                        </a>
                                        <div class="media-body">
                                          <p class="fs-16">
                                            <a class="hover-primary" href="#">Johen Doe</a>
                                          </p>
                                            <span class="text-muted">5 day ago</span>
                                        </div>
                                        <div class="media-right">
                                            <div class="d-flex">
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star"></i>
                                                <i class="text-warning fa fa-star-o"></i>
                                            </div>
                                        </div>
                                      </div>					
                                      <div class="media pt-0">
                                          <p class="text-fade">Proin lacinia eleifend nulla eu ornare. Integer commodo elit purus. Suspendisse mattis gravida interdum. In laoreet nisi eget felis ornare, tempus luctus nulla pellentesque. Donec maximus lobortis ullamcorper. </p>
                                      </div>
                                    </div>
                                  </div>
                              </div>
                              <div class="box-footer">
                                  <a href="#" class="waves-effect waves-light d-block w-p100 btn btn-primary">See More Reviews</a>
                              </div>
                          </div>
                      </div>
                  </div>					
              </div>
              <div class="col-xl-4 col-12">
                  <div class="box">
                      <div class="box-header">
                          <h4 class="box-title">Upcoming Appointments</h4>
                      </div>
                      <div class="box-body">
                          <div id="paginator1"></div>
                      </div>
                      <div class="box-body">
                          <div class="inner-user-div4">
                              <div>
                                  <div class="d-flex align-items-center mb-10">
                                      <div class="me-15">
                                          <img src="../images/avatar/avatar-1.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />
                                      </div>
                                      <div class="d-flex flex-column flex-grow-1 fw-500">
                                          <p class="hover-primary text-fade mb-1 fs-14">Shawn Hampton</p>
                                          <span class="text-dark fs-16">Emergency appointment</span>
                                      </div>
                                      <div>
                                          <a href="#" class="waves-effect waves-circle btn btn-circle btn-primary-light btn-sm"><i class="fa fa-phone"></i></a>
                                      </div>
                                  </div>
                                  <div class="d-flex justify-content-between align-items-end mb-15 py-10 bb-dashed border-bottom">
                                      <div>
                                          <p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 10:00 <span class="mx-20">$ 30</span></p>
                                      </div>
                                      <div>
                                          <div class="dropdown">
                                              <a data-bs-toggle="dropdown" href="#" class="base-font mx-10"><i class="ti-more-alt text-muted"></i></a>
                                              <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                                <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                                <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div>
                                  <div class="d-flex align-items-center mb-10">
                                      <div class="me-15">
                                          <img src="../images/avatar/avatar-2.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />
                                      </div>
                                      <div class="d-flex flex-column flex-grow-1 fw-500">
                                          <p class="hover-primary text-fade mb-1 fs-14">Polly Paul</p>
                                          <span class="text-dark fs-16">USG + Consultation</span>
                                      </div>
                                      <div>
                                          <a href="#" class="waves-effect waves-circle btn btn-circle btn-primary-light btn-sm"><i class="fa fa-phone"></i></a>
                                      </div>
                                  </div>
                                  <div class="d-flex justify-content-between align-items-end mb-15 py-10 bb-dashed border-bottom">
                                      <div>
                                          <p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 10:30 <span class="mx-20">$ 50</span></p>
                                      </div>
                                      <div>
                                          <div class="dropdown">
                                              <a data-bs-toggle="dropdown" href="#" class="base-font mx-10"><i class="ti-more-alt text-muted"></i></a>
                                              <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                                <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                                <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div>
                                  <div class="d-flex align-items-center mb-10">
                                      <div class="me-15">
                                          <img src="../images/avatar/avatar-3.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />
                                      </div>
                                      <div class="d-flex flex-column flex-grow-1 fw-500">
                                          <p class="hover-primary text-fade mb-1 fs-14">Johen Doe</p>
                                          <span class="text-dark fs-16">Laboratory screening</span>
                                      </div>
                                      <div>
                                          <a href="#" class="waves-effect waves-circle btn btn-circle btn-primary-light btn-sm"><i class="fa fa-phone"></i></a>
                                      </div>
                                  </div>
                                  <div class="d-flex justify-content-between align-items-end mb-15 py-10 bb-dashed border-bottom">
                                      <div>
                                          <p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 11:00 <span class="mx-20">$ 70</span></p>
                                      </div>
                                      <div>
                                          <div class="dropdown">
                                              <a data-bs-toggle="dropdown" href="#" class="base-font mx-10"><i class="ti-more-alt text-muted"></i></a>
                                              <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                                <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                                <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div>
                                  <div class="d-flex align-items-center mb-10">
                                      <div class="me-15">
                                          <img src="../images/avatar/avatar-4.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />
                                      </div>
                                      <div class="d-flex flex-column flex-grow-1 fw-500">
                                          <p class="hover-primary text-fade mb-1 fs-14">Harmani Doe</p>
                                          <span class="text-dark fs-16">Keeping pregnant</span>
                                      </div>
                                      <div>
                                          <a href="#" class="waves-effect waves-circle btn btn-circle btn-primary-light btn-sm"><i class="fa fa-phone"></i></a>
                                      </div>
                                  </div>
                                  <div class="d-flex justify-content-between align-items-end mb-15 py-10 bb-dashed border-bottom">
                                      <div>
                                          <p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 11:30 </p>
                                      </div>
                                      <div>
                                          <div class="dropdown">
                                              <a data-bs-toggle="dropdown" href="#" class="base-font mx-10"><i class="ti-more-alt text-muted"></i></a>
                                              <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                                <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                                <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div>
                                  <div class="d-flex align-items-center mb-10">
                                      <div class="me-15">
                                          <img src="../images/avatar/avatar-5.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />
                                      </div>
                                      <div class="d-flex flex-column flex-grow-1 fw-500">
                                          <p class="hover-primary text-fade mb-1 fs-14">Mark Wood</p>
                                          <span class="text-dark fs-16">Primary doctor consultation</span>
                                      </div>
                                      <div>
                                          <a href="#" class="waves-effect waves-circle btn btn-circle btn-primary-light btn-sm"><i class="fa fa-phone"></i></a>
                                      </div>
                                  </div>
                                  <div class="d-flex justify-content-between align-items-end mb-15 py-10 bb-dashed border-bottom">
                                      <div>
                                          <p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 12:00 <span class="mx-20">$ 30</span></p>
                                      </div>
                                      <div>
                                          <div class="dropdown">
                                              <a data-bs-toggle="dropdown" href="#" class="base-font mx-10"><i class="ti-more-alt text-muted"></i></a>
                                              <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                                <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                                <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div>
                                  <div class="d-flex align-items-center mb-10">
                                      <div class="me-15">
                                          <img src="../images/avatar/avatar-6.png" class="avatar avatar-lg rounded10 bg-primary-light" alt="" />
                                      </div>
                                      <div class="d-flex flex-column flex-grow-1 fw-500">
                                          <p class="hover-primary text-fade mb-1 fs-14">Shawn Marsh</p>
                                          <span class="text-dark fs-16">Emergency appointment</span>
                                      </div>
                                      <div>
                                          <a href="#" class="waves-effect waves-circle btn btn-circle btn-primary-light btn-sm"><i class="fa fa-phone"></i></a>
                                      </div>
                                  </div>
                                  <div class="d-flex justify-content-between align-items-end mb-15 py-10 bb-dashed border-bottom">
                                      <div>
                                          <p class="mb-0 text-muted"><i class="fa fa-clock-o me-5"></i> 13:00 <span class="mx-20">$ 90</span></p>
                                      </div>
                                      <div>
                                          <div class="dropdown">
                                              <a data-bs-toggle="dropdown" href="#" class="base-font mx-10"><i class="ti-more-alt text-muted"></i></a>
                                              <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
                                                <a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
                                                <a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="box">		
                      <div class="box-header no-border">
                          <h4 class="box-title">Appointments Overview</h4>
                      </div>
                      <div class="box-body">	
                          <div id="chart432"></div>
                      </div>																		
                  </div>					
                  <div class="box">		
                      <div class="box-header">
                          <h4 class="box-title">Recovery rate</h4>
                      </div>
                      <div class="box-body">
                          <div class="mb-30">
                               <div class="d-flex align-items-center justify-content-between mb-5"><h5>80 %</h5><h5>Cold</h5></div>
                               <div class="progress  progress-xs">
                                  <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                  </div>
                               </div>
                          </div>
                          <div class="mb-30">
                               <div class="d-flex align-items-center justify-content-between mb-5"><h5>24 %</h5><h5>Fracture</h5></div>
                               <div class="progress  progress-xs">
                                  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="24" aria-valuemin="0" aria-valuemax="100" style="width: 24%">
                                  </div>
                               </div>
                          </div>
                          <div>
                               <div class="d-flex align-items-center justify-content-between mb-5"><h5>91 %</h5><h5>Ache</h5></div>
                               <div class="progress  progress-xs">
                                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="91" aria-valuemin="0" aria-valuemax="100" style="width: 91%">
                                  </div>
                               </div>
                          </div>
                          <div>
                               <div class="d-flex align-items-center justify-content-between mb-5"><h5>50 %</h5><h5>Hematoma</h5></div>
                               <div class="progress  progress-xs">
                                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                  </div>
                               </div>
                          </div>
                          <div>
                               <div class="d-flex align-items-center justify-content-between mb-5"><h5>72 %</h5><h5>Caries</h5></div>
                               <div class="progress  progress-xs">
                                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                                  </div>
                               </div>
                          </div>							
                      </div>
                  </div>
              </div>
          </div>			
      </section>
      <!-- /.content -->
    </div>
</div>
@endsection