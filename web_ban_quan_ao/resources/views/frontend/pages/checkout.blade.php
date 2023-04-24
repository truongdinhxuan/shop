@extends('frontend.layouts.master')
@section('main-content')
@section('title', 'Gille-Thanh Toán Đơn Hàng')
<!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="row">
        <div class="col-12">
            <div class="breadcrumb_content">
                <ul>
                    <li><a href="{{ route('home') }}">Trang chủ</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>Thanh toán đơn hàng</li>
                </ul>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->


<!--Checkout page section-->
<div class="Checkout_section">

    <div class="checkout_form">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <form action="{{ route('post-checkout') }}" method="POST">
                    @csrf
                    <h3>Thông tin giao hàng</h3>
                    <div class="row">

                        <div class="col-lg-12 mb-30">

                            <input placeholder="Họ và tên" name="hoten" type="text" required>
                        </div>

                        <div class="col-lg-6 md-30">

                            <input placeholder="Email" name="email" type="text">
                        </div>

                        <div class="col-lg-6 mb-30">

                            <input placeholder="Số điện thoại" name="phone" type="text" required>
                        </div>

                        <div class="card-body1">
                            <div class="col-12 mb-30">
                                <input placeholder="Địa chỉ chi tiết" name="address_detail" type="text">
                            </div>
                        </div>

                    </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <h3>Giỏ hàng của bạn</h3>
                <div class="order_table table-responsive mb-30">
                    <table>
                        <tbody>
                            @foreach ($newcart->products as $data)
                                <tr>
                                    <td> {{ $data['productInfo']->title }} <strong> × {{ $data['quantity'] }}</strong>
                                    </td>
                                    <td> {{ number_format($data['productInfo']->price), 2 }}đ</td>
                                </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Tạm tính</th>
                                <td>{{ number_format($newcart->totalPrice), 2 }}đ</td>
                            </tr>
                            {{-- <tr>
                                <th>Phí vận chuyển</th>
                                <td><strong>25.000đ</strong></td>
                            </tr> --}}
                            <tr class="order_total">
                                <th>Tổng cộng</th>
                                <td><strong>{{number_format($newcart->totalPrice),2}}đ</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="payment_method">
                    <div class="panel-default">
                        <input id="payment" name="payment" value="1" type="radio"
                            data-target="createp_account">
                        <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Thanh
                            toán khi nhận hàng</label>

                        <div id="method" class="collapse one" data-parent="#accordion">
                        </div>
                    </div>
                    {{-- <div class="panel-default">
                        <input id="payment_defult" name="payment" value="2" type="radio"
                            data-target="createp_account">
                        {{-- <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult"
                            aria-controls="collapsedefult">PayPal <img
                                src="{{ asset('frontend\assets\img\visha\papyel.png') }}" alt=""></label> --}}

                        {{-- <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                        </div>
                    </div>  --}}
                    <div class="order_button">
                        <button type="submit">Thanh toán</button>
                    </div>
                </div>

            </div>
            </form>
        </div>
    </div>
</div>
<!--Checkout page section end-->

</div>
<!--pos page inner end-->
</div>
</div>
<!--pos page end-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="{{asset('frontend/assets/js/app.js')}}"></script>
@endsection

@push('scripts')

@endpush
