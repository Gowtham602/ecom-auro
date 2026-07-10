<meta charset="UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title','Kodai Choco')</title>

<meta name="description" content="Kodai Choco Premium Handmade Chocolates">

<link rel="icon" href="{{ asset('assets/images/favicon.png') }}">

<!-- Google Font -->

<link rel="preconnect" href="https://fonts.googleapis.com">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Bootstrap -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Font Awesome -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

<!-- Swiper Slider -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

<!-- Animate CSS -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

<!-- Toastr -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- SweetAlert -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- Custom CSS -->

<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
<!-- <link rel="stylesheet" href="{{ asset('assets/css/frontendheader.css') }}"> -->
<style>

:root{

    --primary:#8B5CF6;
    --secondary:#A78BFA;
    --light:#F5F3FF;
    --dark:#312E81;
    --text:#374151;
    --white:#ffffff;
    --border:#E5E7EB;
    --orange:#F59E0B;
    --success:#22C55E;

}

*{

    margin:0;
    padding:0;
    box-sizing:border-box;

}

body{

    font-family:'Poppins',sans-serif;
    background:var(--light);
    color:var(--text);

}

a{

    text-decoration:none;

}

img{

    max-width:100%;

}

.section-title{

    font-size:30px;
    font-weight:700;
    color:var(--dark);

}

.btn-primary{

    background:var(--primary);
    border:none;

}

.btn-primary:hover{

    background:#6D28D9;

}

</style>