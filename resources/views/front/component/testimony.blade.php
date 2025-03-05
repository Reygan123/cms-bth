{{-- 
<section class="testimonial-six-bg pbmit-extend-animation mb-5" style="background-image: url('{{asset('/storage/identities/'.$misis[0]->image)}}')">
   <div class="container">
      <div class="row">
         <div class="col-md-7 col-xl-8"></div>
         <div class="col-md-5 col-xl-4">
            <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="false" data-arrows="false" data-columns="1" data-margin="30" data-effect="slide">
               <div class="swiper-wrapper">
                  @foreach($testimonies as $testi)
                  <div class="swiper-slide">
                     <article class="pbmit-testimonial-style-2">
                        <div class="pbminfotech-post-item">
                           <div class="pbmit-box-content-wrap">
                              <div class="pbminfotech-box-desc">
                                 <blockquote class="pbminfotech-testimonial-text">
                                    {!!$testi->description!!}
                                 </blockquote>
                              </div>
                              <div class="pbminfotech-box-author d-flex align-items-center">
                                 <div class="pbminfotech-box-img">
                                    <div class="pbmit-featured-img-wrapper">
                                    <div class="pbmit-featured-wrapper">
                                       <img src="{{asset('/storage/testimonies/'.$testi->image)}}" class="img-fluid" alt="{{$testi->name}}"></div>
                                    </div>
                                 </div>
                                 <div class="pbmit-auther-content">
                                    <h3 class="pbminfotech-box-title">{{$testi->name}}</h3>
                                    <div class="pbminfotech-testimonial-detail">{{$testi->title}}</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </article>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
   </section> --}}
   <section class="section-xl">
      <div class="container">
         <div class="position-relative">
            <div class="pbmit-heading-subheading animation-style2">
               <h4 class="pbmit-subtitle">{!! $juduls[0]->description !!}</h4>
               <h2 class="pbmit-title">{{ $juduls[0]->title }}</h2>
            </div>
            <div class="testimonial_arrow swiper-btn-custom d-flex flex-row-reverse"></div>
         </div>
         <div class="swiper-slider" data-arrows-class="testimonial_arrow" data-autoplay="true" data-loop="true" data-dots="false" data-arrows="true" data-columns="3" data-margin="30" data-effect="slide">
            <div class="swiper-wrapper">
               @foreach($testimonies as $testi)
               <div class="swiper-slide">
                  <article class="pbmit-testimonial-style-1">
                     <div class="pbminfotech-post-item">
                        <div class="pbmit-box-content-wrap">
                           <div class="pbminfotech-box-desc">
                              <blockquote class="pbminfotech-testimonial-text">
                                 {!!$testi->description!!}
                              </blockquote>
                           </div>
                           <div class="pbminfotech-box-author d-flex align-items-center">
                              <div class="pbminfotech-box-img">
                                 <div class="pbmit-featured-img-wrapper">
                                    <div class="pbmit-featured-wrapper">
                                       <img src="{{asset('/storage/testimonies/'.$testi->image)}}" class="img-fluid" alt="{{$testi->name}}">
                                    </div>
                                 </div>
                              </div>
                              <div class="pbmit-auther-content">
                                 <h3 class="pbminfotech-box-title">{{$testi->name}}</h3>
                                 <div class="pbminfotech-testimonial-detail">{{ $testi->title }}</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </article>
               </div>
              @endforeach
            </div>
         </div>
      </div>
   </section>