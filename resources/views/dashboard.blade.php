@extends('layouts/app')

@section('content')
<main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
            <img src="assets/img/hero-img.png" class="img-fluid animated hero-logo" alt="Hero Image">
          </div>
          <div class="col-lg-6  d-flex flex-column justify-content-center text-center text-md-start" data-aos="fade-in">
          @if(Auth::check())
            <h2>Selamat Datang di Dashboard, {{ Auth::user()->name }}</h2>
            <p>Anda telah mendaftar sebagai peserta didik baru di Cendekia Primary School.</p>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            <a class="btn-getstarted" href="{{ route('ekstrakurikuler.create')}}">Join Ekstrakurikuler</a>            

          @else
            <h2>Informasi Seputar Daftar Ulang PPDB 2024</h2>
            <p>Cendekia Primary School</p>
          @endif
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
              Halo Insan Muda Cendikia! Selamat datang di platform Penerimaan Peserta Didik Baru (PPDB) Online. Website ini dirancang untuk memudahkan proses pendaftaran ulang siswa baru secara daring. Kami berkomitmen untuk menyediakan layanan yang cepat, efisien, dan transparan dalam seluruh proses penerimaan. Dengan antarmuka yang ramah pengguna dan dukungan teknologi terkini, kami berharap platform ini dapat memenuhi kebutuhan semua pihak yang terlibat dalam proses penerimaan siswa baru.  
            </p>

          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <p>
            Dengan menggunakan PPDB Online, calon siswa dapat dengan mudah melakukan pendaftaran ulang, memantau status penerimaan, serta melengkapi dokumen yang diperlukan dari mana saja dan kapan saja. Kami berharap layanan ini memberikan kemudahan bagi siswa dan orang tua dalam mengikuti prosedur penerimaan tanpa harus datang langsung ke sekolah, sehingga prosesnya menjadi lebih fleksibel, hemat waktu, dan nyaman.
            </p>
          </div>
        </div>
    </section><!-- /About Section -->
    

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
        <p>Tim Cendekia telah mengumpulkan beberapa pertanyaan yang sering diajukan oleh calon siswa dan orang tua terkait proses pendaftaran ulang. Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami melalui informasi kontak yang tersedia.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">
          @if(Auth::check())
          <div class="col-lg-8">

            <div class="faq-container">

              <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Apakah ada kegiatan orientasi atau pengenalan sekolah untuk siswa baru?</h3>
                <div class="faq-content">
                  <p style="text-align: justify;">Ya, sekolah kami menyelenggarakan kegiatan orientasi atau pengenalan sekolah untuk siswa baru yang dikenal dengan Masa Pengenalan Lingkungan Sekolah (MPLS). Diantara kegiatan MPLS adalah berkeliling sekolah dipandu oleh wali kelas masing-masing.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Bagaimana jadwal kegiatan sehari-hari di sekolah?</h3>
                <div class="faq-content">
                  <p style="text-align: justify;">Jadwal kegiatan sehari-hari di sekolah kami dimulai pada pukul 07.00 dengan upacara bendera pada hari Senin, dan kegiatan belajar-mengajar dimulai pukul 07.30 hingga pukul 10.00. Setiap hari terdiri dari tiga sesi pelajaran dengan durasi 45 menit per mata pelajaran, diselingi dengan waktu istirahat.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Apa saja pilihan ekstrakurikuler yang bisa diikuti oleh siswa baru?</h3>
                <div class="faq-content">
                  <p style="text-align: justify;">Cendikia Primary School memiliki berbagai pilihan ekstrakurikuler yang bisa diikuti untuk mengembangkan bakat dan minat siswa. Beberapa ekstrakurikuler yang ditawarkan antara lain: Pramuka, Pencak Silat, Tari Tradisional, Paduan Suara, Melukis atau Menggambar, Sepak Bola, Badminton, Dokter Kecil, English Club, dan Paskibra.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>

              <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Apakah saya perlu datang langsung ke sekolah untuk verifikasi data setelah pendaftaran ulang?</h3>
                <div class="faq-content">
                <p style="text-align: justify;">Di Cendikia Primary School, terdapat aturan yang jelas terkait seragam sekolah. Seragam wajib dikenakan setiap hari selama kegiatan belajar-mengajar berlangsung. Berikut adalah pembagian seragam sesuai dengan hari: 
                  1. Senin dan Selasa: Siswa mengenakan seragam nasional berupa baju putih dengan bawahan merah.
                  2. Rabu dan Kamis: Siswa mengenakan seragam batik sekolah yang merupakan seragam khusus dengan motif dan warna yang sudah ditentukan oleh sekolah.
                  3. Jumat: Siswa mengenakan seragam olahraga berupa kaos dan celana training, karena ada kegiatan olahraga dan senam bersama.
                  4. Sabtu (Jika ada kegiatan khusus): Siswa mengenakan seragam Pramuka untuk mengikuti kegiatan kepramukaan yang diadakan pada hari Sabtu atau kegiatan lain yang melibatkan seragam Pramuka.
                  Selain itu, siswa diwajibkan memakai atribut lengkap seperti topi, dasi, dan ikat pinggang sesuai dengan seragam yang dikenakan pada hari tersebut. Seragam harus rapi dan bersih, serta sepatu hitam dengan kaos kaki putih merupakan bagian dari aturan berpakaian.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>
          @else
          <div class="col-lg-8">

            <div class="faq-container">

              <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Kapan rentang waktu pendaftaran ulang PPBD tahap 1 dan tahap 2?</h3>
                <div class="faq-content">
                  <p style="text-align: justify;">Rentang waktu pendaftaran ulang PPDB tahap 1 dimulai dari tanggal 1 Juni 2024 hingga tanggal 5 Juni 2024. Sedangkan pendaftaran ulang PPDB tahap 2 berlangsung dari tanggal 15 Juni 2024 hingga tanggal 20 Juni 2024.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Bagaimana cara melakukan pendaftaran ulang PPDB secara online?</h3>
                <div class="faq-content">
                  <p style="text-align: justify;">Pendaftaran ulang dilakukan melalui platform PPDB online. Calon siswa dapat mengakses website ini sebagai website resmi pendaftaran ualng PPDB, Lalu klik tombol Login dibagian kanan atas. Masuk dengan menggunakan nama lengkap dan nomor pendaftaran. Isi formulir dan unggah berkas foto yang diperlukan. Pastikan seluruh informasi dan dokumen diunggah dengan benar sebelum dikirimkan.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Apa saja yang perlu diunggah saat pendaftaran ulang?</h3>
                <div class="faq-content">
                  <p>
                    a. Surat Keterangan Diterima Di Cendikia Primary School <br>
                    b. Foto Akta Kelahiran <br>
                    c. Foto Kartu Keluarga <br>
                    d. Pas Foto Ukuran 3x4 
                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div>

              <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Apakah saya perlu datang langsung ke sekolah untuk verifikasi data setelah pendaftaran ulang?</h3>
                <div class="faq-content">
                <p style="text-align: justify;">Tidak perlu datang langsung ke sekolah. Verifikasi data dilakukan secara online. Namun, jika terdapat kendala atau sekolah memerlukan verifikasi tambahan, pihak sekolah akan menghubungi siswa atau orang tua untuk langkah lebih lanjut.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>
          @endif
        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section light-background">

      <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Jika Anda memiliki pertanyaan atau memerlukan bantuan lebih lanjut terkait proses Penerimaan Peserta Didik Baru (PPDB), jangan ragu untuk menghubungi kami melalui informasi kontak di bawah ini. Tim kami siap membantu Anda.</p>
        </div>
        <!-- End Section Title -->
        <div class="contact-info-container">
                <div class="contact-info">
                    <div class="icon-box">
                        <i class="bi bi-geo-alt"></i>
                    </div>
                    <h3>Address</h3>
                    <p>Jln. Mawar No. 23, Bandung, Jawa Barat 40114</p>
                </div>
                
                <div class="contact-info">
                    <div class="icon-box">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <h3>Call Us</h3>
                    <p>+62 812-3456-7890</p>
                </div>
                
                <div class="contact-info">
                    <div class="icon-box">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <h3>Email Us</h3>
                    <p>cendekiaprimaryschool@gmail.com</p>
                </div>
            </div>      
      
    </section><!-- /Contact Section -->
</main>
@endsection