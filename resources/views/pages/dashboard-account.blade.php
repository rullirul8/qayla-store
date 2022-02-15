@extends('layouts.dashboard')

@section('title')
    Account Setting
@endsection

@section('content') 

          <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">Update your current profile</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <!--Nama-->
                            <div class="col-md-6">
                            <div class="form-group">
                              <label for="name">Your Name</label>
                              <input 
                                type="text" 
                                class="form-control" 
                                id="name" 
                                name="name" 
                                value="Rull Irul"/>
                            </div>
                          </div>
                          <!--email-->
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input 
                                type="email" 
                                class="form-control" 
                                id="email" 
                                name="email" 
                                value="rull@gmail.com"/>
                            </div>
                          </div>
                          <!--Alamat 1-->
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="addressOne">Address 1</label>
                              <input 
                                type="text" 
                                class="form-control" 
                                id="AddressOne" 
                                name="AddressOne" 
                                value="Borobudur Timur"/>
                            </div>
                          </div>
                          <!--Alamat 2-->
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="addressTwo">Address 2</label>
                              <input 
                                type="text" 
                                class="form-control" 
                                id="AddressTwo" 
                                name="AddressTwo" 
                                value="RT/RW 04/10"/>
                            </div>
                          </div>
                          <!--provinsi-->
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="province">Province</label>
                              <select 
                                name="province" 
                                id="province" 
                                class="form-control">
                                <option value="Central Java">Central Java</option>
                              </select>
                            </div>
                          </div>
                          <!--City-->
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="city">City</label>
                              <select 
                                name="city" 
                                id="city" 
                                class="form-control">
                                <option value="Semarang">Semarang</option>
                              </select>
                            </div>
                          </div>
                          <!--Kode Pos-->
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="kodePos">Kode Pos</label>
                              <input 
                                type="text" 
                                class="form-control" 
                                id="kodePos" 
                                name="kodePos" 
                                value="54153"/>
                            </div>
                          </div>
                          <!--Negara-->
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="negara">Negara</label>
                              <input 
                                type="text" 
                                class="form-control" 
                                id="negara" 
                                name="negara" 
                                value="Indonesia"/>
                            </div>
                          </div>
                          <!--No Handphone-->
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="handphone">No Handphone</label>
                              <input 
                                type="text" 
                                class="form-control" 
                                id="handphone" 
                                name="handphone" 
                                value="085640671134"/>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col text-right">
                            <button type="submit" class="btn btn-success px-5">Save Now</button>
                          </div>
                        </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>                  

@endsection