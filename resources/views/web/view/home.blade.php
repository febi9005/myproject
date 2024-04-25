@extends('template.layout')
@extends('template.nav')
@section('title', 'Home - Toko Baju ')
@section('main')

	<!---------------carousel start-------------->
	<section class="slider-wrap">
	  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="" src="assets/img/gambar1.jpg" alt="First slide">
	    <div class="carousel-caption">
		</div>
    </div>
    <div class="carousel-item">
      <img class="" src="assets/img/gambar2.jpg" alt="Second slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<!-----------carousel- content start----------------->
 <div class="slider-inner">
             <div class="container">
			    <div class="row">
				   <div class="col-md-12">
				       <div class="slider-content">
					      <h5> FIND WHAT YOU NEED!</h5>
						  <p>Discover top rated Jersey, T-Shirt and Dress around the world</p>
					   </div>
				   </div>
				   <div class="col-md-12">
				       <div class="slider-form-section">
					      <form>
						      <div class="row">
							    <div class="col-md-4 p-0">
								   <div class="form-group">
								     <input type="text" class="form-control form-border" placeholder="What are you looking for"/>
									 
									 <div class="icons">
									 <a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
                                     </div>
								   </div>
								</div>
								 <div class="col-md-3 p-0">
								   <div class="form-group">
								     <input type="text" class="form-control" placeholder="Where"/>
									 <div class="icon">
									 <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                                     </div>
								   </div>
								</div>
								 <div class="col-md-3 p-0">
								   <div class="form-group">
								     <select class="custom-select  select form-control">
                                       <option selected>All categories</option>
                                           <option value="1">One</option>
                                             <option value="2">Two</option>
                                               <option value="3">Three</option>
                                      </select>
					
								   </div>
								</div>
								 <div class="col-md-2 p-0">
								   <div class="form-group">
								     <input type="submit" class="submit" value="search"/>
								   </div>
								</div>
							  </div>
						  </form>
					   </div>
				   </div>
				</div>
			 </div>
			 </div>
	</section>
	<!--------------carousel-content-finish------------------------>
	@foreach ($data_pakaian as $items)
                @php
                    $kategori = \App\Models\Kategori_Pakaian::find($items->pakaian_kategori_pakaian_id);
                    $pakaianStok = $items->pakaian_stok;
                    $kategoriStatus = $kategori->kategori_pakaian_status;
                @endphp
                @if ($pakaianStok > 0 && $kategoriStatus > 0)
                    <div class="card text-bg-dark m-2" style="width: 18rem;">
                        @if ($items->pakaian_gambar_url === '' || $items->pakaian_gambar_url === null)
                            <img width="100%" height="100%" src="{{ asset('img/clothes.png') }}" class="card-img-top"
                                alt="...">
                        @else
                            <img width="100%" height="100%"
                                src="{{ asset('storage/pakaian/gambar/' . basename($items->pakaian_gambar_url)) }}"
                                class="card-img-top" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $items->pakaian_nama }}</h5>
                            <p class="card-text">Rp. {{ $items->pakaian_harga }}</p>
                            <a href="{{ route('cart', ['pakaian_id' => $items->pakaian_id]) }}"
                                class="btn btn-primary">Get Detail</a>
                        </div>
                    </div>
                @endif
            @endforeach

	<!-------------footer section start------------------->
	
	<section class="footer">
	  <div class="container">
	     <div class="row ">
		    <div class=" col-xs-12 col-sm-6 col-md-3 col-lg-3">
			  <div class="content_footer">
			  <h5>Quick Links</h5>
			  <ul>
			  
			  <li><a href="#">About Us</a></li>
			  <li><a href="#">Faq</a></li>
			  <li><a href="#">Help</a></li>
			  <li><a href="#">My Account</a></li>
			  <li><a href="#">Create account</a></li>
			  <li><a href="#">Contacts</a></li>
			  
			  
			  </ul>
			  </div>
			</div>
			
			  <div class=" col-xs-12 col-sm-6 col-md-3 col-lg-3">
			  <div class="content_footer text-left">
			  <h5>Categories</h5>
			  <ul>
			  
			  <li><a href="#">T-Shirt</a></li>
			  <li><a href="#">Dress</a></li>
			  <li><a href="#">Jersey</a></li>
			  <li><a href="#">Costum</a></li>
			  
			  
			  </ul>
			  </div>
			</div>
			
			
			  <div class=" col-xs-12 col-sm-6 col-md-3 col-lg-3">
			  <div class="content_footer1 text-left">
			  <h5>Contacts</h5>
			  <ul>
			  
			  <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>jl.Sawojajar 2<br>
                  Malang - Indonesia</a></li>
			  <li><a href="#"><i class="fa fa-headphones" aria-hidden="true"></i>+62 06 97240120</a></li>
			  <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i>info@sparker.com</a></li>
			  
			  
			  
			  </ul>
			  </div>
			</div>
			
						  <div class=" col-xs-12 col-sm-6 col-md-3 col-lg-3">
			  <div class="content_footer1 text-left">
			  <h5>Keep in touch</h5>
			  <form>
			  <div class="form-group">
			     <input type="text" class="text_Input" placeholder="Your Email"/>

				 <input type="submit" class="btn button_submit" value="submit"/>
				 
			  </div>
			  </form>
              <div class="social_connect">
			  <h2>Follow Us</h2>
			  
			  <i class="fa fa-facebook-official" aria-hidden="true"></i>
<i class="fa fa-twitter" aria-hidden="true"></i>
<i class="fa fa-google-plus" aria-hidden="true"></i>
<i class="fa fa-instagram" aria-hidden="true"></i>
<i class="fa fa-pinterest-p" aria-hidden="true"></i>


			  </div>
			  </div>
			</div>
			
		
			
		 </div>
		 <hr class="my-4">
		 <div class="row">
		 <div class="col-sm-12 col-md-6 col-md-6">
		 <div class="footer_image">
		    <img src="image1.svg"/>
			
		 </div>
		 </div>
		 
		 <div class="col-sm-12 col-md-6 col-md-6">
		 <div class="footer_term pb-5">
		    <ul>
			<li><a href="#">Terms and conditions</a></li>
			<li><a href="#" class="privacy">privacy</a></li>
			<li><a href="#">@2024 Toko Thrift</a></li>
			</ul>
			
		 </div>
		 </div>
		 </div>
		 </div>
	  </div>
	
	</section>
	
	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>