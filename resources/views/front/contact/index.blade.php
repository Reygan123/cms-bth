@extends('layouts.frontapp', ['title' => 'Kontak'])

@section('content')
@include('front.component.breadcrumb')

<div class="pd_top_90"></div>
<div id="content" class="site-content ">

  <section class="contact-section">
    <!--===============spacing==============-->
    <div class="pd_top_90"></div>
    <!--===============spacing==============-->
    <div class="container">

      <div class="row align-items-center">
        <div class="before_title text-center">Contact Us</div>
        <h2 class="title text-center mr_bottom_90">Hubungi Tim Kami</h2>
        <div class="col-xl-6 col-lg-6 mb-5 mb-lg-5 mb-xl-0">
          <div class="contact_form_box_all type_one">
            <div class="contact_form_box_inner">
              <div class="contact_form_shortcode">
                <form id="whatsapp-form">
                  <label for="senderName">Nama Pengirim:</label>
                  <input class="help-block with-errors" type="text" id="senderName" name="senderName" placeholder="Masukkan nama pengirim">

                  <label for="educationLevel">Jenjang Pendidikan:</label>
                  <select id="educationLevel" name="educationLevel">
                    @foreach($programs as $p)
                    <option value="{{$p->name}}">{{$p->name}}</option>
                    @endforeach
                  </select>

                  <label for="message">Pesan:</label>
                  <textarea id="message" name="message" placeholder="Tulis pesan Anda"></textarea>
                  <div class="form-group mg_top apbtn">
                    <button class="theme-btn one" type="button" onclick="sendMessage()">Kirim Pesan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-6 col-lg-6 pd_left_30">
          <div class="title_all_box style_one dark_color">
            <div class="title_sections left">

              <p>Kirim pesan melalui formulir yang diberikan. Jika pertanyaan Anda membutuhkan respons cepat, silakan gunakan detail kontak di bawah ini.</p>
            </div>
          </div>

          <div class="contact_box_content style_one">
            <div class="contact_box_inner icon_yes">
              <div class="icon_bx">
                <span class=" icon-placeholder"></span>
              </div>
              <div class="contnet">
                <h3> Alamat Sekolah</h3>
                <div>{!!$identities[0]->address!!}</div>
              </div>
            </div>
          </div>
          <!--===============spacing==============-->
          <div class="pd_bottom_15"></div>
          <!--===============spacing==============-->
          <div class="contact_box_content style_one">
            <div class="contact_box_inner icon_yes">
              <div class="icon_bx">
                <span class="icon-phone-call"></span>
              </div>
              <div class="contnet">
                <h3> Informasi Umum </h3>
                <p>
                  <i class="fa fa-phone"></i><a href="tel:+62{{$identities[0]->phone}}" class=""> 0{{$identities[0]->phone}}</a> | <i class="fa fa-envelope"></i><a href="mailto:{{$identities[0]->email}}"> {{$identities[0]->email}}</a>
                </p>
              </div>
            </div>
          </div>
          <!--===============spacing==============-->
          <div class="pd_bottom_15"></div>
          <!--===============spacing==============-->
          <div class="contact_box_content style_one">
            <div class="contact_box_inner icon_yes">
              <div class="icon_bx">
                <span class="fa fa-clock-o"></span>
              </div>
              <div class="contnet">
                <h3> Operation Hours </h3>
                <p>
                  {{$identities[0]->day_service}}: {{$identities[0]->time_service}}
                </p>
              </div>
            </div>
          </div>
          <!--===============spacing==============-->
          <div class="pd_bottom_40"></div>
          <!--===============spacing==============-->
          <div class="social_media_v_one style_two">
            <ul>
              <li>
                <a href="https://www.facebook.com/{{ $identities[0]->fb }}"> <span class="fa fa-facebook"></span>
                  <small>facebook</small>
                </a>
              </li>
              <li>
                <a href="https://www.instagram.com/{{ $identities[0]->ig }}"> <span class="fa fa-instagram"></span>
                  <small>instagram</small>
                </a>
              </li>
              <li>
                <a href="https://www.youtube.com/{{ $identities[0]->yt }}"> <span class="fa fa-youtube"></span>
                  <small>youtube</small>
                </a>
              </li>
              <!-- <li>
                        <a href="#"> <span class="fa fa-tiktok"></span>
                           <small>tiktok</small>
                        </a>
                     </li> -->
            </ul>
          </div>

        </div>
      </div>
    </div>
    <!--===============spacing==============-->
    <div class="pd_top_70"></div>
    <!--===============spacing==============-->
  </section>
  <section class="contact-map-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <section class="map-section">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.964556850901!2d107.58863407427147!3d-6.89484299310431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e66434b334d7%3A0xc98d702e5b3de661!2sAl%20Lathif%20Islamic%20School%20(Yayasan%20Noor%20Rakhmah%20Al%20Lathif)!5e0!3m2!1sid!2sid!4v1703397166096!5m2!1sid!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </section>

        </div>
      </div>
    </div>
    <!--===============spacing==============-->
    <div class="pd_top_90"></div>
    <!--===============spacing==============-->
  </section>

</div>
<div class="pd_bottom_90"></div>


<script>
  function sendMessage() {
    var senderName = document.getElementById('senderName').value;
    var educationLevel = document.getElementById('educationLevel').value;
    var message = document.getElementById('message').value;
    var phoneNumber = '+62{{$identities[0]->phone}}';

    if (senderName && educationLevel && message) {
      // Membuat pesan dengan informasi yang diisi oleh pengguna
      var fullMessage = 'Nama Pengirim: ' + senderName +
        '\nJenjang Pendidikan: ' + educationLevel +
        '\nPesan: ' + message;

      // Menggunakan format URL WhatsApp untuk mengirim pesan
      var whatsappUrl = 'https://wa.me/' + phoneNumber + '?text=' + encodeURIComponent(fullMessage);
      window.location.href = whatsappUrl;
    } else {
      alert('Mohon isi semua kolom terlebih dahulu.');
    }
  }
</script>




@endsection