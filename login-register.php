<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="container">
        <div class="welcome">
            <div class="pinkbox">
                <div class="signup nodisplay">
                    <h1>register</h1>
                    <form autocomplete="off" action="register_process.php" method="post">
                        <input type="text" name="username" placeholder="username">
                        <input type="email" name="email" placeholder="email">
                        <input type="password" name="password" placeholder="password">
                        <button class="button submit" type="submit" value="Daftar">create account </button>
                    </form>
                </div>
                <div class="signin">
                    <h1>sign in</h1>
                    <form action="login_process.php" method="post" class="more-padding" autocomplete="off">
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password" required>
                        <div class="checkbox">
                            <input type="checkbox" id="remember" /><label for="remember">remember me</label>
                        </div>
                        <button class="button submit" type="submit" value="Daftar">Login </button>
                    </form>
                </div>
            </div>
            <div class="leftbox">
                <h2 class="title"><span>Barokah</span><br>Sentosa</h2>
                <p class="desc">Coffe and Resto Disert <span></span></p>
                <img class="flower smaller" src="assets/img/logo.png" alt="1357d638624297b" border="0">
                <p class="account">have an account?</p>
                <button class="button" id="signin">login</button>
            </div>
            <div class="rightbox">
                <h2 class="title"><span>Barokah</span><br>Sentosa</h2>
                <p class="desc">Coffe and Resto Disert <span></span></p>
                <img class="flower" src="assets/img/logo.png" />
                <p class="account">don't have an account?</p>
                <button class="button" id="signup">sign up</button>
            </div>
        </div>
    </div>
    <div class="modal w-50 text-center " style="display: none;">
    </div>
    <div id="errorModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                </div>
                <div class="text-center py-4">
                    <p id="errorText">Username atau password salah.</p>
                </div>
                <div class="modal-footer text-center">
                    <span class="close" onclick="closeErrorModal()">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Close
                        </button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        // Fungsi untuk menampilkan modal error dengan pesan yang sesuai
        function showErrorModal(errorMessage) {
            var modal = document.getElementById('errorModal');
            var errorText = document.getElementById('errorText');
            errorText.innerText = errorMessage;
            modal.style.display = 'block';
        }

        // Fungsi untuk menutup modal error dan mengarahkan ulang ke halaman login
        function closeErrorModal() {
            var modal = document.getElementById('errorModal');
            modal.style.display = 'none';
            window.location.href = "login-register.php"; // Mengarahkan ulang ke halaman login
        }

        // Cek apakah terdapat parameter error pada URL
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('error')) {
            var errorMessage = "Username atau password salah.";
            if (urlParams.get('error') === '1') {
                errorMessage = "Username atau password salah.";
            }
            showErrorModal(errorMessage);
        }
        document.getElementById('signup').addEventListener('click', function() {
            document.querySelector('.pinkbox').style.transform = 'translateX(80%)';
            document.querySelector('.signin').classList.add('nodisplay');
            document.querySelector('.signup').classList.remove('nodisplay');
        });

        document.getElementById('signin').addEventListener('click', function() {
            document.querySelector('.pinkbox').style.transform = 'translateX(0%)';
            document.querySelector('.signup').classList.add('nodisplay');
            document.querySelector('.signin').classList.remove('nodisplay');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

</html>