@extends('layouts.admin')

@section('title')
    Transaction
@endsection

@section('content') 

          <div class="section-content section-dashboard-home" data-aos="fade-up">
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Transactions</h2>
                <p class="dashboard-subtitle">Big result start from the small one</p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12 mt-2">

                  <div class="row mt-3">
                  <div class="col-12 mt-2">
                    <h5 class="mb-3">Transaksi Terkini</h5>
                    @foreach ($transaction_data as $transaction)
                      <a 
                      href="{{ route('dashboard-transaction-details', $transaction->id) }}" 
                      class="card card-list d-block">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-1">
                          <img src="{{ Storage::url($transaction->product->galleries->first()->photos ?? '') }}" class="w-75">
                        </div>
                        <div class="col-md-4">
                          {{ $transaction->product->name ?? '' }}
                        </div>
                        <div class="col-md-3">
                          {{ $transaction->transaction->user->name ?? '' }}
                        </div>
                        <div class="col-md-3">
                          {{ $transaction->created_at ?? '' }}
                        </div>
                        <div class="col-md-1 d-none d-md-block">
                          <img src="/images/dashboard-arrow.svg" alt="">
                        </div>
                      </div>
                    </div>
                  </a>
                  @endforeach
                </div>
              </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection