@extends('layouts.site')
@section('content')
<!-- contact section start -->
<div class="contact_section layout_padding">
   <div class="container">
      <div class="row">
         <div class="col-md-6">
            <h1 class="contact_taital">Get In Touch</h1>
            <p class="contact_text">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation  eu </p>
         </div>
         <div class="col-md-6">
            <div class="contact_main">
               <div class="contact_bt"><a href="#">Contact Form</a></div>
               <div class="newletter_bt"><a href="#">Newletter</a></div>
            </div>
         </div>
      </div>
   </div>
   <div class="map_main">
      <div class="map-responsive">
         <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
      </div>
   </div>
</div>

<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
   <div class="container">
       <div class="row">
           <div class="col-lg-12 text-center">
               <div class="breadcrumb__text">
                   <h2>Liên hệ</h2>
                   <div class="breadcrumb__option">
                       <a href="./index.html">Home</a>
                       <span>Liên hệ</span>
                   </div>
               </div>
           </div>
       </div>
   </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
   <div class="container">
       <div class="row">
           <div class="col-lg-3 col-md-3 col-sm-6 text-center">
               <div class="contact__widget">
                   <span class="icon_phone"></span>
                   <h4>Phone</h4>
               </div>
           </div>
           <div class="col-lg-3 col-md-3 col-sm-6 text-center">
               <div class="contact__widget">
                   <span class="icon_pin_alt"></span>
                   <h4>Address</h4>
               </div>
           </div>
           <div class="col-lg-3 col-md-3 col-sm-6 text-center">
               <div class="contact__widget">
                   <span class="icon_clock_alt"></span>
                   <h4>Open time</h4>
                   <p>10:00 am to 23:00 pm</p>
               </div>
           </div>
           <div class="col-lg-3 col-md-3 col-sm-6 text-center">
               <div class="contact__widget">
                   <span class="icon_mail_alt"></span>
                   <h4>Email</h4>
               </div>
           </div>
       </div>
   </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">
   <iframe
       src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d49116.39176087041!2d-86.41867791216099!3d39.69977417971648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x886ca48c841038a1%3A0x70cfba96bf847f0!2sPlainfield%2C%20IN%2C%20USA!5e0!3m2!1sen!2sbd!4v1586106673811!5m2!1sen!2sbd"
       height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
   <div class="map-inside">
       <i class="icon_pin"></i>
       <div class="inside-widget">
           <h4>New York</h4>
           <ul>
               <li>Phone: +12-345-6789</li>
               <li>Add: 16 Creek Ave. Farmingdale, NY</li>
           </ul>
       </div>
   </div>
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
   <div class="container">
       <div class="row">
           <div class="col-lg-12">
               <div class="contact__form__title">
                   <h2>Lời Nhắn</h2>
               </div>
           </div>
       </div>
       <form action="{{ route('contact.store')}}" method="post" enctype="multipart/form-data">
           @csrf
           <div class="row">
               <div class="col-lg-6 col-md-6">
                   <label>Họ và Tên</label>
                   <input type="text" name="name" value="{{ old('name')}}" class="form-control">
                   @if( $errors->has('name'))
                   <div class="text-danger">{{ $errors->first('name') }}</div>
                   @endif
               </div>
               <div class="col-lg-6 col-md-6">
                   <label>Email</label>
                   <input type="email" name="email" value="{{ old('email')}}" class="form-control">
                   @if( $errors->has('email'))
                   <div class="text-danger">{{ $errors->first('email') }}</div>
                   @endif
               </div>
               <div class="col-lg-6 col-md-6">
                   <label>Số điện thoại</label>
                   <input type="text" name="phone" value="{{ old('phone')}}" class="form-control">
                   @if( $errors->has('phone'))
                   <div class="text-danger">{{ $errors->first('phone') }}</div>
                   @endif
               </div>
               <div class="col-lg-6 col-md-6">
                   <label>Tiêu đề</label>
                   <input type="text" name="title" value="{{ old('title')}}" class="form-control">
                   @if( $errors->has('title'))
                   <div class="text-danger">{{ $errors->first('title') }}</div>
                   @endif
               </div>
               <div class="col-lg-12 text-center">
                   <label>Chi Tiết</label>
                   <textarea name="detail" class="form-control">{{ old('detail')}}</textarea>
                   @if( $errors->has('detail'))
                   <div class="text-danger">{{ $errors->first('detail') }}</div>
                   @endif
               </div>
               <div class="col-lg-12 text-center">
                   <label>Nội dung liên hệ</label>
                   <textarea name="replaydetail" class="form-control">{{ old('replaydetail')}}</textarea>
                   @if( $errors->has('replaydetail'))
                   <div class="text-danger">{{ $errors->first('replaydetail') }}</div>
                   @endif
               </div>
               <div class="col-lg-12 text-center">
                   <button type="submit" class="site-btn">Gửi</button>
               </div>
           </div>
   </form>
</div>
</div>

<!-- contact section end -->

@endsection

@section('title','Contact')