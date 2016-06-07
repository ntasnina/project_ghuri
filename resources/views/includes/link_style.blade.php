        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
        <!--link href="stylesheets/star.css" media="all" rel="stylesheet" type="text/css" /-->
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!--test datepicker-->
          <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
          <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
          <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
          
          <style>
          @import url('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css');

          .date-form { margin: 10px; }
          label.control-label span { cursor: pointer; }
          </style>
<!--test datepicker-->
        <!--FONT-->
        <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
        <!--FONT-->

        <!--custom styles-->
        <style>

        /*controlling photo slide show styles*/
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 100%;
            height: 100%;
            margin: auto;
        }
        .carousel .item {
            height: 600px;
            /*width: 1000px;*/
            
            background-color: #FFFF99;
        }
        
        /*carousel*/
        .carousel-inner img {
            width: 100%; /* Set width to 100% */
            height: 100%;
            margin: auto;
        }
        
        .carousel-control{
            height: 550px;
            /*width: 175px;
            /*background-color: #76EEC6;*/
        }

        /*controlling form styles*/        
        .form-horizontal .control-label{
        /* text-align:right; */
        /*background-color:#ffa;*/
            text-align:left;
        }


        /*logo resizing*/
        .navbar-brand>img {
          max-height: 70px; /* resize DOWN to height of container which is set to 50px */
          height: 60px; /* resize UP to fit*/
          /*max-width: 100%;  /*probably not necessary */
          width: 100px; /* resize based on height */
          /*margin: 0 auto;

          /*object-fit: contain; /* Resize down to fit container */
        }

        .navbar-brand {
            padding: 0px 0px;
        }

        .icon_tab>img{
          height: 50px;
          width: 50px;
        }

        /*theme start*/
        /*container padding*/
        .container {
            padding: 80px 120px;
            /*width: 100%;*/
        }

        /*about image*/
        .person {
            border: 10px solid transparent;
            margin-bottom: 25px;
            width: 60%;
            height: 45%;
            opacity: 0.85;
        }
        .person:hover {
            border-color: #f1f1f1;
        }

        .about_img>img{
          height: 100px;
          width: 100px;
        }

        

        .carousel-caption h3 {
            color: #fff !important;
        }



        .navbar {
          /*position: relative !important;
          /*top:30px;*/
            z-index:10;
            margin-bottom: 0;
            /*background-color: #2d2d30;*/
            border: 0;
            font-size: 18px !important;
            letter-spacing: 4px;
            /*opacity:0.9;*/
            background-color: #474e5d;
            

            font-family: Montserrat, sans-serif;
        }
        .navFont{
            color: #FFFFFF;
        }
        
        /* On hover, the links will turn white */
        .navbar-nav li p:hover {
            color: #33CCFF !important;
        }

        .navbar-nav .dropdown-menu a:hover {
            color: #FFFFFF !important;
        }

        /* The active link */
        .navbar-nav li.active a {
            color: #fff !important;
            background-color:#29292c !important;
        }

        /* Remove border color from the collapsible button */
        .navbar-default .navbar-toggle {
            border-color: transparent;
        }


        /* Dropdown */
        .open .dropdown-toggle {
            color: #474e5d ;
            background-color: #6e7991 !important;/*CCFFFF*/
        }

        /* Dropdown links */
        .dropdown-menu li a {
            color: #000 !important;
        }

        /* On hover, the dropdown links will turn red */
        .dropdown-menu li a:hover {
            color: #474e5d;
            background-color: #474e5d !important;/*33FF99*/
        }
        
        

        /* Add a dark background color to the footer */
        footer {
            background-color: #2d2d30;
            color: #f5f5f5;
            padding: 32px;
        }

        footer a {
            color: #f5f5f5;
        }

        footer a:hover {
            color: #777;
            text-decoration: none;
        }
        
        body {
            font: 400 15px/1.8 Lato, sans-serif;
            color: #777;
            background-color: #fff;
        }

        h1{
          margin: 10px 0 30px 0;
          letter-spacing: 10px;
          font-size: 30px;
          color: #111;
        }
          h2{
          margin: 10px 0 30px 0;
          letter-spacing: 7px;
          font-size: 30px;
          color: #111;
        }
        .carousel {
            position:relative;
            top:0;    
        }

        .searchImage>img{
            height: 260px;
            width: 390px;
        }
         .hidden {
    display:none;
    }
    .image_class {
        width: 550px;
        height: 350px;
        background-position: center center;
        background-size: cover;
        background-color: hsla(140,100%,50%,0.3);
        background-image: url("images/camera9.png");
        border:2px solid#D0D0D0;
        -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
        display: inline-block;
        
        
    }
    .image_class:hover {
       
        border:3px solid#303030;
    
        
    }

    .button {
    border: 1px;
    padding: 10px;
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 10px;
    margin-right: 10px;
    background: hsla(110,80%,40%,0.3);
    color: #006633;
    font-size: 20px;
    border-radius:10px;
    width:150px;
    }

    .button:hover {
    background: hsla(110,80%,40%,0.5);
    cursor: pointer;
    }
        #plan_a_trip{
            /*color: #fff;*/
            /*background-color: #009688;*/
        }
        </style>