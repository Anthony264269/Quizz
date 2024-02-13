<?php
require_once('./connexion.php');
include_once('./bdd/questionnaire.php');
include_once('./bdd/questions_reponse.php');
session_start();
//commentaire à supprimer 
//var_dump($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Quizz</title>
</head>

<body>
    
    <video autoplay muted loop id="myVideo" class="md">
        <source src="./Rainbow_Nebula_4K_Motion_Background.mp4" type="video/mp4">
    </video>
    <header>
        <nav class="navbar navbar-dark bg-transparent fixed-top pt-0 md">
            <div class="container-fluid">
                <a class="navbar-brand fs-2 mr-0">QUIZZ</a>
                <div>

                    <a class="md navbar-brand fs-2">Stats</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="offcanvas offcanvas-end text-bg-dark md" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Stats</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body md">
                        <ul class="navbar-nav flex-grow-1 pe-3">
                            <li class="nav-item">
                                <p class="nav-link active">Mes stats</p>
                                <p>Pseudo : <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                                                echo $_SESSION['user']['pseudo'];
                                            }
                                            ?>
                                </p>
                                <p>score : <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                                                echo $_SESSION['user']['stat'];
                                            }
                                            ?>
                                </p>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Stats général
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">

                                    <?php include_once('./bdd/page_stats.php') ?>


                                </ul>
                            </li>
                        </ul>
                        <!-- si le gars est connecté -->
                        <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                            echo '<a href="./bdd/deconnexion_utilisateur.php" class="btn btn-danger"> Deconnexion</a>';
                        } //echo je fais apparaitre le bouton déconnexion, quand je rentre mon pseudo et que je valide
                        //bien le dire dans la page deconnexion-utilisateur
                        ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <?php if (!isset($_SESSION['user']) || empty($_SESSION['user'])) { ?>
            <section class="container md pt-5 mr-0 ml-0">
                <form action="./bdd/pseudo.php" method="post">
                    <div id="bg_pseudo" class="card-body" style="width: 38rem; height: 28rem;">
                        <div id="bouton">
                            <label for="pseudo" class="form-label">Pseudo</label>
                            <input type="text" class="form-control w-25 opacity-25" id="pseudo" name="pseudo">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </div>
            </section>
        <?php } ?>

        <!-- si le gars est connecté -->
        <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
            <section class="container md">
                <div class="d-flex justify-content-center pt-5">
                    <div id="bg_quizz" class="card" style="width: 40rem; height: 21rem;">
                        <div class="card-body">
                            <h5 class="card-title d-flex justify-content-center fs-3 text-danger">

                                <?php {
                                    echo ($questions[0]);
                                } ?>


                            </h5>





                            <div class=" d-flex justify-content-around pt-5">
                                <a id="A" href="#" class="btn btn-primary">
                                    <?php
                                    echo ($reponses[0]['reponse']); ?>
                                </a>
                                <a id="B" href="#" class="btn btn-primary">
                                    <?php
                                    echo ($reponses[1]['reponse']); ?>
                                </a>
                            </div>
                            <div class=" d-flex justify-content-around pt-5">
                                <a id="C" href="#" class="btn btn-primary">
                                    <?php
                                    echo ($reponses[2]['reponse']); ?>
                                </a>
                                <a id="D" href="#" class="btn btn-primary">
                                    <?php
                                    echo ($reponses[3]['reponse']); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php } ?>
    </main>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>