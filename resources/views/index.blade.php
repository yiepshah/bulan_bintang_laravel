<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Bulan Bintang</title>
    <style>
    
    @import url('https://fonts.googleapis.com/css?family=Muli&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Quicksand&display=swap');

        .index-container{
            width: 100%;
            padding: 60px;
            overflow: hidden;
        }

    .image-container {
        display: flex; 
        align-items: center;
        padding-top: 20px; 
        width: 25%;    
        position: relative;
    } 

    .image-info {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    background-color: rgba(22, 26, 48, 0.8); /* Adjust the background color and opacity as needed */
    padding: 20px;
    color: #fff;
    border-radius: 10px;
    width: 80%; /* Adjust the width as needed */
}

.image-container:hover .image-info {
    opacity: 3;
}

.shop-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #161A30;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
    font-weight: bold;
}

.shop-button:hover {
    background-color: #fff;
    color: #161A30;
}


    .brother-collection img {
        max-width: 100%;
        height: auto;
        width: 500px;
        /* transition: transform 0.4s ease-in-out;    */
             
    }

    /* .brother-collection img:hover {
        transform: scale(1.2);     
    } */

   
    /* .image-group img {
        font-weight: bold; 
        border: #12122f;
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        transition: transform 0.3s ease-in-out;        
    } */

    /* .image-group img:hover {
        transform: scale(1.1); ;
    } */

    .dropdown-item{
        color: black;
        font-size: small;
        font-style: oblique;
        font-weight: lighter;
    }

    /* #third-1,
#third-3 {
    float: left;
    width: 800px;

}

#third-2,
#third-4 {
    float: right;
    width: 800px;
   
} */

@media (max-width: 767px) {
    #third-1,
    #third-2,
    #third-3,
    #third-4 {
        width: 100%;
        float: none;
        margin-right: 0;
        margin-left: 0;
    }
}

    .boutique{
        margin-left: 0px;
    }

    .boutique img{
        border-radius: 10px;
    }


    #shop {     
        position: absolute;
        top: 80%; 
        left: 69%; 
        padding: 5px 5px; 
        background: transparent; 
        border: 2px solid black; 
        border-radius: 10px 10px;
        text-decoration: none;
        font-weight: 700;
        font-size: 30px;
        color: #000; 
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        transition: transform 0.3s ease-in-out;    
    }

    #shop:hover{
        background-color: #202d45;
        color: #fff;
        transform: scale(1.1);
        border: 4px solid #202d45; 
        
    }

    @media (max-width: 767px) {
      
        #shop {
            top: 80%; 
            font-size: 15px;
        }
    }   


    .custom-image {
        max-width: 100%;
        height:auto; 
        width: 100%;
        border-radius: 10px; 
    }

    .carousel-indicators button,
    .carousel-control-prev,
    .carousel-control-next {
        background-color: transparent;
        border: none;
        color: #000; /
    }

    .collection figure {
        position: relative;
        overflow: hidden;
    }

    .collection figure img {
        max-width: 100%;
        height: auto;
        width: 100%;
        border-radius: 10px;
        transition: opacity 0.3s ease-in-out;
    }

    .collection figure:hover img {
        opacity: 0.7;
    }

    .hover-info {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
    z-index: 2; /* Ensure the hover-info is above the image */
}

.collection figure:hover .hover-info {
    opacity: 1;
}

.collection figure .hover-info span,
.collection figure .hover-info .shop-button {
    position: relative; /* Ensure the span and button stay on top */
    z-index: 3; /* Ensure the span and button are above the image and hover-info */
}

.shop-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #202d45;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
    font-weight: bold;
    transition: background-color 0.3s ease-in-out;
}

.shop-button:hover {
    background-color: #fff;
    color: #161A30;
}

.imageTitle{
    font-size: 40px; /* Adjust the font size as needed */

    margin-bottom: 10px; /* Adjust the margin as needed */
}

.section {
    padding: 40px;
    border-radius: 10px;
    background-color: #202d45;
    margin-bottom: 20px;
    
    /* transition: background-color 0.3s ease-in-out; */
}

/* .section:hover {
    background-color: #202d45;
} */

.section h4 {
    color: #fff;
    font-size: 20px;
    margin-bottom: 10px;
}

.section p,
.section ul {
    color: #ccc;
}

.section ul {
    list-style: none;
    padding: 0;
}

.section ul li {
    margin-bottom: 8px;
}

.social-icons {
    list-style: none;
    padding: 0;
    display: flex;
}

.social-icons li {
    margin-right: 30px;
}

.social-icons a {
    color: #fff;
    font-size: 20px;
    /* transition: color 0.3s ease-in-out; */
}

/* .social-icons a:hover {
    background-color: #202d45;
} */

.footer-container{
    background-color: #202d45;
    color: #fff;
}
      
</style>
</head>
<body>
@include('header')

<div class="index-container">
    
    <div id="carouselExample" class="carousel slide" data-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
        </div>
      
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="custom-image" src="https://bulanbintanghq.my/wp-content/uploads/2023/02/Raya-2023-Baju-Raya-Family.jpg" class="" alt="">
          </div>
          <div class="carousel-item">
            <img class="custom-image" src="https://bulanbintanghq.my/wp-content/uploads/2023/02/Raya-2023-Baju-Raya-Perempuan-1024x576.jpg">
          </div>
          <div class="carousel-item">
            <img class="custom-image" src="https://cdn.store-assets.com/s/859197/f/9740202.jpg?width=1500" class="" alt="">
          </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
      
        @if(auth()->check())
        <a id="shop" href="{{ url('collection') }}">SHOP NOW!</a>
      @else
        <a id="shop" href="{{ url('login') }}">SHOP NOW!</a>
      @endif
      
      </a>
      </div><br><br><br>
      
          <h3 class="collection">Brothers Collection</h3>
      
          <div class="image-container brother-collection">
              <img src="https://www.bulanbintangstore.com/wp-content/uploads/2021/05/Flamingo-Pink_SF_22.jpg" alt="Image 1">
              <img src="https://www.bulanbintangstore.com/wp-content/uploads/2021/03/Viridian-Green_BMTF_34-1536x1536.jpg" alt="Image 2">
              <img src="https://www.bulanbintangstore.com/wp-content/uploads/2021/05/Mint-Green_SF_7.jpg" alt="Image 3">
              <img src="https://bulanbintang.onpay.my/media/uploads/lilac.jpg" alt="Image 4">
              
          </div><br><br><br>

          
          <div class="collection">
            <h2 id="demo11"> 2023 Collection</h2>
            <div class="row">
                <div class="col-md-6">
                    <figure>
                        <div class="hover-info">
                            <span class="imageTitle"> Baju Melayu Slim Fit </span>
                            <a href="#" class="shop-button">Shop Now</a>
                        </div>
                        <img id="third-1" src="https://i0.wp.com/bulanbintanghq.com/wp-content/uploads/2023/03/SF-2.jpg?resize=800%2C800&ssl=1" alt="">
                    </figure>
                </div>
                <div class="col-md-6">
                    <figure>
                        <div class="hover-info">
                            <span class="imageTitle"> Baju Melayu Tailored Fit </span>
                            <a href="#" class="shop-button">Shop Now</a>
                        </div>
                        <img id="third-2" src="https://i0.wp.com/bulanbintanghq.com/wp-content/uploads/2023/02/COVER-CATALOGUE.jpg?resize=800%2C800&ssl=1" alt="">
                    </figure>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <figure>
                        <div class="hover-info">
                            <span class="imageTitle">Baju Melayu Kids </span><br>
                            <a href="#" class="shop-button">Shop Now</a>
                        </div>
                        <img id="third-3" src="https://i0.wp.com/bulanbintanghq.com/wp-content/uploads/2023/02/COVER-CATALOGUE-BMK-3.jpg?resize=800%2C800&ssl=1" alt="">
                    </figure>
                </div>
                <div class="col-md-6">
                    <figure>
                        <div class="hover-info">
                            <span class="imageTitle"> Kurta</span><br>
                            <a href="#" class="shop-button">Shop Now</a>
                        </div>
                        <img id="third-4" src="https://i0.wp.com/bulanbintanghq.com/wp-content/uploads/2023/03/KURTA-A-2.jpg?resize=800%2C800&ssl=1" alt="">
                    </figure>
                </div>
            </div>
        </div>
      <br><br><br>
          <h3 class="collection">Visit Our Official Boutique</h3>
         
          <div class="boutique">
         
              <div class="row">
                  <div class="col-md-3">
                      <figure>
                          <img src="https://i0.wp.com/bulanbintanghq.com/wp-content/uploads/2023/07/BANGI.jpg?resize=1536%2C1536&ssl=1" alt="Image 1" class="img-fluid">
                          <figcaption style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Bangi</figcaption>
                      </figure>
                  </div>
                  <div class="col-md-3">
                      <figure>
                          <img src="https://i0.wp.com/bulanbintanghq.com/wp-content/uploads/2023/07/UKAY-BOULEVARD.jpg?resize=1536%2C1536&ssl=1" alt="Image 2" class="img-fluid">
                          <figcaption style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Ukay Boulevard</figcaption>
                      </figure>
                  </div>
                  <div class="col-md-3">
                      <figure>
                          <img src="https://i0.wp.com/bulanbintanghq.com/wp-content/uploads/2023/07/KELANTAN.jpg?resize=1536%2C1536&ssl=1" alt="Image 3" class="img-fluid">
                          <figcaption style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Kelantan</figcaption>
                      </figure>
                  </div>
      
                  <div class ="col-md-3">
                          <figure>
                              <img src="https://i0.wp.com/bulanbintanghq.com/wp-content/uploads/2023/07/PENANG.jpg?resize=1536%2C1536&ssl=1" alt="Image 6" class="img-fluid">
                              <figcaption style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Penang</figcaption>
                          </figure>
                  </div>
              </div>
      
          
           
      
              
              <div class="row">
                  <div class="col-md-3">
                      <figure>
                          <img src="https://i0.wp.com/bulanbintanghq.com/wp-content/uploads/2023/07/JOHOR.jpg?resize=1536%2C1536&ssl=1" alt="Image 4" class="img-fluid">
                          <figcaption style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Johor Bahru</figcaption>
                      </figure>
                  </div>
      
                  <div class="col-md-3">
                      <figure>
                          <img src="https://i0.wp.com/bulanbintanghq.com/wp-content/uploads/2023/07/SHAH-ALAM.jpg?resize=1536%2C1536&ssl=1" alt="Image 5" class="img-fluid">
                          <figcaption style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Shah Alam</figcaption>
                      </figure>
                  </div>
      
                  <div class ="col-md-3">
                      <figure>
                          <img src="https://i0.wp.com/bulanbintanghq.com/wp-content/uploads/2023/07/MELAKA.jpg?resize=1536%2C1536&ssl=1" alt="Image 6" class="img-fluid">
                          <figcaption style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Melaka</figcaption>
                      </figure>
                  </div>
      
                  <div class ="col-md-3">
                      <figure>
                          <img src="https://i0.wp.com/bulanbintanghq.com/wp-content/uploads/2023/07/TERENGGANU.jpg?resize=1536%2C1536&ssl=1" alt="Image 6" class="img-fluid">
                          <figcaption style="font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;">Terengganu</figcaption>    
                      </figure>
                  </div>
      
              </div>
          </div>
      
          
            <div  class="footer-container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="section about-section">
                            <h4>ABOUT US</h4>
                          
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </div>
                    </div>
        
                    <div class="col-md-3">
                        <div class="section customer-care-section">
                            <h4>CUSTOMER CARE</h4>
                            <ul>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Return Policy</a></li>
                            </ul>
                        </div>
                    </div>
        
                    <div class="col-md-3">
                        <div class="section follow-us-section">
                            <h4>FOLLOW US</h4>
                            <ul class="social-icons">
                                <li><a href="#" class="fab fa-tiktok"></a></li>
                                <li><a href="#" class="fab fa-facebook"></a></li>
                                <li><a href="#" class="fab fa-twitter"></a></li>
                            </ul>
                        </div>
                    </div>
        
                    <div class="col-md-3">
                        <div class="section customer-services-section">
                            <h4>CUSTOMER SERVICES</h4>
                            <ul>
                                <li><i class="fas fa-clock"></i> Monday - Saturday (9:00 am - 10:00 pm)</li>
                                <li><i class="fas fa-mail-bulk"></i> Operations@bulanbintanghq.com</li>
                                <li><i class="fas fa-phone-volume"></i> Customer Service</li>
                            </ul>
                        </div>
                    </div>
                </div>
                @include('footer')
            </div>

        </div>
        
          


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
</body>
</html>


