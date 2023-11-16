<div>
    <!-- Categories Section Begin -->
    <section class="categories">
            <div class="container">
                <div class="row">
                    <div class="categories__slider owl-carousel">
                               @foreach($list_slider as $row_slider)
                                <div class="col-lg-3">
                                 @if ($loop->index==0)
                                 <div class="categories__item set-bg" data-setbg="{{ asset('images/slider/'.$row_slider->image)}}">
                                       <h5><a href="#">{{$row_slider->name}}</a></h5>
                                 </div>
                                 @else
                                  <div class="categories__item set-bg" data-setbg="{{ asset('images/slider/'.$row_slider->image)}}">
                                     <h5><a href="#">{{$row_slider->name}}</a></h5>
                                  </div>
                                 @endif
                                 </div>
                               @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Categories Section End -->
    </div>