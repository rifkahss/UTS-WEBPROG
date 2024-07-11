<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="overflow-hidden">

    <div class="row justify-content-center">
        <div class="col-6 d-flex">
            <div class="nav-custom">
                <nav class="navbar navbar-light navbar-expand-md py-3 px-3">
                    <div class="container custome-h">
                        <a class="navbar-brand d-flex align-items-center" href="#">
                            <span>Barokah Sentosa</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-4"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse flex-grow-0 order-md-first" id="navcol-4">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link active" href="menu.php">Menu</a></li>
                                <li class="nav-item"><a class="nav-link active" href="order.php">Order</a></li>
                                <div class="d-md-none my-2"><button class="btn btn-light me-2" type="button">Button</button><button class="btn btn-primary" type="button">Button</button></div>
                        </div>
                    </div>
                </nav>
            </div>
            <button class="btn button-nav">
                <a href="login-register.php"> Login</a>
            </button>
        </div>
        <!-- <button class="btn btn-primary ">
            Login
        </button> -->
    </div>

    <div class="circle"></div>
    <div class="container ">
        <div class="content">
            <div class="textBox">
                <h2 id="product-title"><span>Es krim</span></h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit, vel magnam repellendus maxime alias cum quis, vero quae porro ullam quod fuga perspiciatis aliquid quisquam officiis placeat nihil, accusantium ad!</p>
                <a href="">Learn More</a>
            </div>
            <div class="imageBox">
                <img src="assets/img/img-1.png" alt="" class="starbucks" id="starbucks">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center justify-content-center">

            </div>
        </div>
    </div>
    <ul class="thumb">
        <li><img src="assets/img/img-1.png" onclick="imgSlider('assets/img/img-1.png', '<span>Es Krim </span')"></li>
        <li><img src="assets/img/img-2.png" onclick="imgSlider('assets/img/img-2.png', '<span>Es Kelapa </span')"></li>
        <li><img src="assets/img/img-3.png" onclick="imgSlider('assets/img/img-3.png', '<span>Es Teler </span')"></li>
    </ul>

    <script type="text/javascript">
        function imgSlider(image, text) {
            const starbucks = document.querySelector('.starbucks');
            const productTitle = document.getElementById('product-title');
            const tl = gsap.timeline();

            // Menggeser gambar ke samping kanan dan transparan
            tl.to(starbucks, {
                x: 1000,
                opacity: 0,
                duration: 0.5,
                ease: "power2.inOut"
            });

            // Mengganti gambar dan teks sebelum menggeser kembali
            tl.set(starbucks, {
                src: image
            });
            tl.to(starbucks, {
                x: 0,
                opacity: 1,
                duration: 0.5
            });

            tl.to(productTitle, {
                innerHTML: text,
                duration: 0.5
            }, "-=0.5");
            // Ganti gambar setelah animasi selesai
            setTimeout(function() {
                starbucks.src = image;
            }, 500); // Ganti gambar setelah 0.5 detik
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>


</html>