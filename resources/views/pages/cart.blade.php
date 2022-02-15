@extends('layouts.app')

@section('title')
    Store Cart Page
@endsection

@section('content')

    <!-- Page Content -->
    <div class="page-content page-cart">
        <section
            class="store-breadcrumbs" data-aos="fade-down" data-aos-delay="100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">
                                    Cart
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>

        <section class="store-cart">
            <div class="container">
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-12 table-responsive">
                        <table class="table table-borderless table-cart">
                            <thead>
                            <tr>
                                <td>Image</td>
                                <td>Name &amp; Seller</td>
                                <td>Price</td>
                                <td>Menu</td>
                            </tr>
                            </thead>
                            <tbody>
                            @php $totalPrice = 0 @endphp
                            @foreach ($carts as $cart)
                                <tr>
                                    <td style="width: 20%;">
                                        @if ($cart->product->galleries)
                                            <img
                                                src="{{ Storage::url($cart->product->galleries->first()->photos) }}"
                                                alt=""
                                                class="cart-image"/>
                                        @endif
                                    </td>
                                    <td style="width: 35%;">
                                        <div class="produck-title">{{ $cart->product->name }}</div>
                                    </td>
                                    <td style="width: 35%;">
                                        <div class="produck-title">Rp.{{ number_format($cart->product->price) }}</div>
                                    </td>
                                    <td style="width: 20%;">
                                        <form action="{{ route('cart-delete', $cart->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-remove-cart">
                                                remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @php $totalPrice += $cart->product->price @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="150">
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <h2 class="mb-4">
                            Shipping Details
                        </h2>
                    </div>
                </div>
                <form action="{{ route('checkout') }}" id="locations" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" name="total_price" value="{{ $totalPrice }}">
                    <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
                        <!--Alamat 1-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address_one">Alamat</label>
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
                                <label for="address_two">Kel/Kec</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="AddressTwo"
                                    name="AddressTwo"
                                    value="RT/RW 04/10"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Negara</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="country"
                                    name="country"
                                    value="Indonesia"/>
                            </div>
                        </div>
                        <!--No Handphone-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone_number">No Handphone</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="phone_number"
                                    name="phone_number"
                                    value="085640671134"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provinces_id">Province</label>
                                <select class="form-control provinsi-tujuan" name="province_destination">
                                    <option value="0">-- Province --</option>
                                    @foreach ($provinces as $province => $value)
                                        <option value="{{ $province  }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!--Kode Pos-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="zip_code">Kode Pos</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="zip_code"
                                    name="zip_code"
                                    value="54153"/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="regencies_id">City</label>
                                <select class="form-control kota-tujuan" name="city_destination">
                                    <option value="">-- City --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="provinces_id">Courier</label>
                                <select class="form-control kurir" name="courier">
                                    <option value="0">-- Choose Courier --</option>
                                    <option value="jne">JNE</option>
                                    <option value="pos">POS</option>
                                    <option value="tiki">TIKI</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="card d-none ongkir">
                                    <div class="card-body">
                                        <span id="loading" style="display:none">loading...</span>
                                        <ul class="list-group" id="ongkir"></ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="150">
                        <div class="col-12">
                            <hr>
                        </div>
                        <div class="col-md-3 ml-auto">
                            <h2 class="mb-2">
                                Payment Information
                            </h2>
                        </div>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="200">
                        <div class="col-md-3 ml-auto">
                            <div class="product-subtitle">Total</div>
                            <div class="product-title text-success" id="cost_total">Rp.{{ number_format($totalPrice ?? 0) }}</div>
                            <button
                                type="submit"
                                class="btn btn-success mt-4 px-8 btn-lg">
                                Checkout Now
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

@endsection

@push('addon-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        <?php echo "var grand_total ='$totalPrice';"; ?>
        $(document).ready(function(){
            //ajax select kota asal
            $('select[name="province_origin"]').on('change', function () {
                let provindeId = $(this).val();
                if (provindeId) {
                    jQuery.ajax({
                        url: '/cities/'+provindeId,
                        type: "GET",
                        dataType: "json",
                        success: function (response) {
                            $('select[name="city_origin"]').empty();
                            $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
                            $.each(response, function (key, value) {
                                $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
                }
            });
            //ajax select kota tujuan
            $('select[name="province_destination"]').on('change', function () {
                let provindeId = $(this).val();
                if (provindeId) {
                    jQuery.ajax({
                        url: '/cities/'+provindeId,
                        type: "GET",
                        dataType: "json",
                        success: function (response) {
                            $('select[name="city_destination"]').empty();
                            $('select[name="city_destination"]').append('<option value="">-- City --</option>');
                            $.each(response, function (key, value) {
                                $('select[name="city_destination"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    $('select[name="city_destination"]').append('<option value="">-- City --</option>');
                }
            });
            //ajax check ongkir
            let isProcessing = false;
            $('.kurir').on('change', function (e) {
                e.preventDefault();

                let token            = "{{ csrf_token() }}";
                let city_origin      = 398; //id_semarang
                let city_destination = $('select[name=city_destination]').val();
                let courier          = $('select[name=courier]').val();
                let weight           = 1000;
                if(isProcessing){
                    return;
                }
                isProcessing = true;
                jQuery.ajax({
                    url: "/ongkir",
                    data: {
                        _token:              token,
                        city_origin:         city_origin,
                        city_destination:    city_destination,
                        courier:             courier,
                        weight:              weight,
                    },
                    dataType: "JSON",
                    type: "POST",
                    beforeSend: function (irul) {
                        $('#loading').show()
                        
                    },
                    success: function (response) {
                        $('#loading').hide()
                        isProcessing = false;
                        if (response) {
                            $('#ongkir').empty();
                            $('.ongkir').addClass('d-block');
                            $.each(response[0]['costs'], function (key, value) {
                                var html ='<li class="list-group-item">'+response[0].code.toUpperCase()+' : <strong>'+value.service+'</strong> - Rp. '+value.cost[0].value+' ('+value.cost[0].etd+' hari)' +
                                        '<input id="shipping_cost" value="'+value.cost[0].value+'" style=" float: right;"  type="radio" ></li>'
                                $('#ongkir').append(html);
                            });

                            var shipping_cost = document.getElementById('shipping_cost').value;
                            document.getElementById("cost_total").innerHTML =  parseInt(shipping_cost)+parseInt(grand_total);
                            console.log('cost', shipping_cost);
                        }else{
                            alert("Something went wrong, please reload your browser!");
                        }
                    }
                });
            });
        });
    </script>
    <script src="/vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var Locations = new Vue({
            el: "#locations",
            mounted() {
                AOS.init();
                this.getProvincesData();
            },
            data: {
                provinces: null,
                regencies: null,
                provinces_id: null,
                regencies_id: null
            },
            methods: {
                getProvincesData() {
                    var self = this;
                    axios.get('{{ route('api-provinces')  }}')
                        .then(function (response) {
                            self.provinces = response.data;
                        });
                },
                getRegenciesData() {
                    var self = this;
                    axios.get('{{ url('api/regencies')  }}/' + self.provinces_id)
                        .then(function (response) {
                            self.regencies = response.data;
                        });
                },
            },
            watch: {
                provinces_id: function (val, oldVal) {
                    this.regencies_id = null;
                    this.getRegenciesData();
                }
            }
        });
    </script>
@endpush
