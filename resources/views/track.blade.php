@extends('layouts.front')
@section('content')
<!-- breadcrumb-area -->
<section class="breadcrumb__area pt-60 pb-60 tp-breadcrumb__bg" data-background="assets/img/banner/breadcrumb-01.jpg">
    <div class="container">
       <div class="row align-items-center">
          <div class="col-xl-7 col-lg-12 col-md-12 col-12">
             <div class="tp-breadcrumb">
                <div class="tp-breadcrumb__link mb-10">
                   <span class="breadcrumb-item-active"><a href="index.html">Home</a></span>
                   <span>Track Order</span>
                </div>
                <h2 class="tp-breadcrumb__title">Track Your Order</h2>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- breadcrumb-area-end -->
     
 <!-- track-area-start -->
 <section class="track-area pt-80 pb-80">
    <div class="container">
       <div class="row justify-content-center">
          <div class="col-md-7">
             <div class="tptrack__product">
                <div class="tptrack__thumb">
                   <img src="assets/img/banner/track-bg.jpg" alt="">
                </div>
                <div class="tptrack__content grey-bg-3">
                   <div class="tptrack__item d-flex mb-20">
                      <div class="tptrack__item-icon">
                         <img src="assets/img/icon/track-1.png" alt="">
                      </div>
                      <div class="tptrack__item-content">
                         <h4 class="tptrack__item-title">Track Your Order</h4>
                         <p>To track your order please enter your Order ID in the box below and press the "Track" button. This was  given to you on your receipt and in the confirmation email you should have received.</p>
                      </div>
                   </div>
                   <div class="tptrack__id mb-10">
                      <form action="#">
                         <span><i class="fal fa-address-card"></i></span>
                         <input type="text" placeholder="Order ID">
                      </form>
                   </div>
                   <div class="tptrack__email mb-10">
                      <form action="#">
                         <span><i class="fal fa-envelope"></i></span>
                         <input type="email" placeholder="Billing email">
                      </form>
                   </div>
                   <div class="tptrack__btn">
                      <button class="tptrack__submition">Track Now<i class="fal fa-long-arrow-right"></i></button>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- track-area-end -->
 @endsection