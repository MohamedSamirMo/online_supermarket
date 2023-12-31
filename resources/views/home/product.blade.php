<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
               <div >
                  <form action="{{url('product_search')}}" method="GET">
                     <input style="width: 500px;" type="text" name="search" placeholder="Search for Something">
                     <input type="submit" value="Search" >
                  </form>
               </div>
            </div>
            @if(session()->has('message'))
          <div class="alert alert-success">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            {{session()->get('message')}}

          </div>
          @endif
            <div class="row">
               @foreach($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_detials',$products->id)}}" class="option1">
                           Product Detials
                           </a>
                         <form action="{{url('add_cart',$products->id)}}" method="Post">
                           @csrf
                           <div class="row">
                              <div class="col-md-4"><input type="number" name="quantity" value="1" min="1" style="width: 100px"></div>
                              <div class="col-md-4" ><input type="submit" value="Add To Cart"></div>
                           
                           
                           </div>
                        
                         </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->title}}
                        </h5>
                        @if($products->discount_price!=null && $products->discount_price>0)
                        <h6 style="color:brown">
                        Discount
                        <br>
                        {{$products->discount_price}} EGP
                        </h6>
                        <h6 style="text-decoration:line-through; padding-left: 30px; color:blue" >
                        Price
                        <br>
                        {{$products->price}} EGP
                        </h6>
                        @else
                        <h6 style="padding-left: 50px; color:blue">
                        price
                        <br>
                        {{$products->price}} EGP
                        </h6>
                        @endif
                     </div>
                  </div>
               </div>
              
          @endforeach
          
          <span style="padding-top: 30px;" >
          
         {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
          </span>
         </div>
      </section>