@extends('layouts.frontapp', ['title' => 'Agenda'])
@section('content')
@include('front.component.breadcrumb')
<section class="pd_top_90 pd_bottom_90">
   <div class="container">
      <div class="row">
         <div class="content-area col-lg-8 col-md-12 col-sm-12 col-xs-12">
            @if(count($agendas) > 0)
            @foreach ($agendas as $index => $agenda)
            <div class="row mt-4">
               <div class="col-5 col-lg-2 date">
                  <h1>{{date('d', strtotime($agenda->start_date))}}</h1>
                  <h6>{{date('F Y', strtotime($agenda->start_date))}}</h6>
               </div>
               <div class="col-7 col-md-6 col-lg-3 agenda_bg" style="background-image: url('{{asset('storage/agendas/'.$agenda->image)}}');">
                  <!-- <a href="{{route('agenda.agenda.show',$agenda->slug)}}">
                     <img src="" alt="{{$agenda->title}}" class="img-event">
                  </a> -->
               </div>
               <div class="col-12 col-lg-7 details">
               <div class="pd_top_20"></div>
                  <a href="{{route('agenda.agenda.show',$agenda->slug)}}">
                     <h3>{{$agenda->title}}</h3>
                  </a>
                  {!! \Illuminate\Support\Str::limit($agenda->content, 200) !!}


                  <div class="mr_bottom_20">
                     <div class="info">
                        <i class="fa fa-clock-o"></i>
                        <span>mulai pukul {{ date('H.i A', strtotime($agenda->start_time)) }}</span>
                     </div>
                     <div class="info ml-5">
                        <i class="fa fa-map-marker"></i>
                        <span>{{ $agenda->location }}</span>
                     </div>
                  </div>
                  <a class="theme-btn three" href="{{route('agenda.agenda.show',$agenda->slug)}}">Selengkapnya<i class="flaticon-next"></i></a>
               </div>
            </div>
            @endforeach
            @else
            <p style="text-align:center;">Tidak ada agenda mendatang!</p>
            @endif

         </div>
         <aside id="secondary" class="widget-area all_side_bar col-lg-4 col-md-12 col-sm-12">
            <div class="side_bar">
               <!--===============spacing==============-->
               <div class="pd_top_90"></div>
               <!--===============spacing==============-->

               <div class="widgets_grid_box">
                  <h2 class="widget-title">Artikel & Berita Terkini</h2>
                  <div class="widget_post_box">
                     @foreach($posts as $p)
                     <div class="blog_in clearfix image_in">
                        <div class="image">
                           <img decoding="async" src="{{asset('storage/posts/'.$p->image)}}" alt="img">
                        </div>
                        <div class="content_inner">
                           <p class="post-date"><span class="icon-calendar"></span>{{date('l, d F Y', strtotime($p->pub_date))}}</p>
                           <h3><a href="blog-single.html">{{$p->title}}</a></h3>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>

               <div class="widgets_grid_box">
                  @include('front.component.banner')
               </div>
               <!--===============spacing==============-->
               <div class="pd_bottom_70"></div>
               <!--===============spacing==============-->
            </div>
         </aside>
      </div>
   </div>
</section>

@endsection