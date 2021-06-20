<html>

<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {

      var btn = $('#button');

      $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
          btn.addClass('show');
        } else {
          btn.removeClass('show');
        }
      });

      btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
          scrollTop: 0
        }, '300');
      });
      // Add smooth scrolling to all links
      $("a").on('click', function(event) {

        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function() {

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    });
  </script>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->

  <!--===============================================================================================-->
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/kontak/css/util.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>/assets/kontak/css/main.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Wekama - Masjid Filkom</title>

  <style>
    .tombol {
      font: bold 11px Arial;
      text-decoration: none;
      background-color: #EEEEEE;
      color: #333333;
      padding: 2px 6px 2px 6px;
      border-top: 1px solid #CCCCCC;
      border-right: 1px solid #333333;
      border-bottom: 1px solid #333333;
      border-left: 1px solid #CCCCCC;
    }


    #button {
      display: inline-block;
      background-color: #B89762;
      width: 50px;
      height: 50px;
      text-align: center;
      border-radius: 4px;
      position: fixed;
      bottom: 30px;
      right: 30px;
      transition: background-color .3s,
        opacity .5s, visibility .5s;
      opacity: 0;
      visibility: hidden;
      z-index: 1000;
    }

    #button::after {
      content: "\f077";
      font-family: FontAwesome;
      font-weight: normal;
      font-style: normal;
      font-size: 2em;
      line-height: 50px;
      color: #fff;
    }

    #button:hover {
      cursor: pointer;
      background-color: #333;
    }

    #button:active {
      background-color: #555;
    }

    #button.show {
      opacity: 1;
      visibility: visible;
    }

    .custom-shape-divider-bottom-1599124443 {
      position: absolute;
      bottom: 0;
      left: 0;
      width: 100%;
      overflow: hidden;
      line-height: 0;
      transform: rotate(180deg);
    }

    .custom-shape-divider-bottom-1599124443 svg {
      position: relative;
      display: block;
      width: calc(100% + 1.3px);
      height: 144px;
    }

    .custom-shape-divider-bottom-1599124443 .shape-fill {
      fill: #FFFFFF;
    }

    .bg-image-welcome {
      background: url("<?php echo base_url() ?>/assets/img/br6.jpg");
      background-size: cover;
      background-position: initial;
    }
  </style>

</head>

<body class="main" style="height: 100vh;">
  <a name="top"></a>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-nav" style="background-color: #002F57; height:7%;font-family: 'poppins', sans-serif;">
    <div class="container-fluid col-md-10">
      <a class="navbar-brand text-white" href="<?= base_url('user') ?>">WEKAMA</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="<?= base_url('user/metode') ?>">Donasi</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="<?= base_url('user/faq') ?>">FAQ</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="<?= base_url('user/kontak') ?>">Kontak</a></li>
        </ul>
      </div>
    </div>
  </nav>

</html>