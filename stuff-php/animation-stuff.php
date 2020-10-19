<?php 
    session_start();
    include_once '../materials/dbhandler.mat.php';
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>WEB Test</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        
            <div class="outer">
                <div class="head">
                    <table>
                        <tr>
                            <header class="py-4 bg-dark text-white-50"><div class="container text-center">
                                <medium><> S t u f f  L i s t <i><img class="title-logo" width="40px" height="40px" src="../logo/title-logo-2.png" alt="logo"></i></medium>
                              </div></header>
                        </tr>
                        <tr><ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a href="../index.php" class="nav-link active">
                                    <i class="fas fa-home"></i>Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-warning" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i><img width="20px" height="20px" src="../logo/game-logo.png" alt="logo"></i> Game List</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="mobile-stuff.php">Mobile Game</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="pc-stuff.php">PC Game</a>
                                </div>
                            </li><li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-warning" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i><img width="20px" height="20px" src="../logo/video-logo.png" alt="logo"></i> Film List</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="animation-stuff.php">Animation</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="movie-stuff.php">Movie</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link text-dark"><i class="fas fa-search"></i></a>
                            </li>
                            <li class="nav-item">
                                <a href="../profile.php" class="nav-link text-warning-50"><i><img width="20px" height="20px" src="../logo/user-logo.png" alt="logo"></i> Account</a>
                            </li>
                        </ul></tr>
                    </table>
                </div>
                <div class="inner">
                    <!-- CODE =========================================HERE!====================-->
                    <div class="d-flex flex-column">
                        <div class="p-2 bg-dark">
                            <h4 class="text-center text-warning">Film Animasi</h4>
                        </div>
                        <div class="p-2 bg-warning ">
                        <table class="table table-striped table-inverse table-responsive">
                            <thead class="thead-inverse">
                                <tr>
                                <th>Judul</th>
                                <th>Genre</th>
                                <th>Lokasi</th>
                                <th>Tanggal</th>
                                <th>Note</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sesi = $_SESSION['userSession'];
                            $a = "SELECT * FROM user_stuff WHERE username='$sesi'";
                            $aa = mysqli_query($connect,$a);
                            while($aaa = mysqli_fetch_assoc($aa)){
                                    $stuffs = $aaa['stuffID'];
                                    $sq = "SELECT * FROM stuff_list WHERE stuffID='$stuffs' AND kategoriID=201";
                                    $go = mysqli_query($connect,$sq);
                                    while($list = mysqli_fetch_assoc($go)){
                                        echo '
                                        <tr>
                                            <td scope="row">'.$list['judul'].'</td>
                                            <td>'.$list['genre'].'</td>
                                            <td>'.$list['lokasi'].'</td>
                                            <td>'.$list['tanggalStuff'].'</td>
                                            <td>'.$list['notes'].'</td>
                                            <td> <a href="../materials/deletesql.mat.php?stuffID='.$list["stuffID"].'" class="bg-danger text-warning">Delete</a></td>
                                        </tr>';
                                    }
                            }
                            ?>
                            </tbody>
                        </table><hr class="bg-warning">
                        <a class="rounded bg-dark btn-lg ml-2" href="../inputStuff.php"><i><img class="img-fluid mb-1" width="30px" height="30px" src="../logo/plus-logo.png" alt="logo"></i></a>
                    
                    </div>
                    </div>
                    <!-- CODE =========================================HERE!====================-->

                <div class="foot">
                    <footer id="sticky-footer" class="py-4 bg-dark text-white-50">
                        <div class="container text-center">
                          <small>Copyright &copy; Yunas An</small>
                        </div>
                      </footer>
                </div>
            </div>
        <script src="" async defer></script>
         
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

</html>