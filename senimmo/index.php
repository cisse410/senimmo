    <body class="container mt-5">
        <?php include_once "layouts/menu.php"; ?>
        <script src="https://unpkg.com/scrollreveal"></script>
    <main>

        <style>
            /* .vendre{
                transition: 1s; */
                /* animation: slideDown 3s; */
            /* }
            .louer{
                transition: 1s;
            }
            .card:hover{ */
                /* transform: scale(0.9); */
                /* transform: translateY(-10px);
                
            }
            .app{
                transition: 1s; */
                /* transform: rotate(10deg); */
                /* animation: slideDown 5s;
            }
            @keyframes slideDown {
                from{
                    transform: translateY(200px);
                    opacity: 0;
                }
                to{
                    transform: translateY(0);
                    opacity: 1;
                }
            } */
        </style>

<div class="block mb-3 p-3">
            <h1 id="vendre" class="text-uppercase m-3 p-5 text-center text-decoration-underline">catégorie de maisons à vendre</h1>
                <?php for($i = 0 ; $i < 15; $i ++) : ?>

            <div class="card vendre mb-3 shadow w-400 p-4 m-3 bg-body-danger d-inline-block rounded-5" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="images/villa-senegal.jpeg" class="img-fluid rounded-start" alt="Card title">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Maison à vendre <?php echo $i+1?></h5>
                            <p class="card-text"><span class="fs-5 fw-bold text-decoration-underline">Description</span> : Maison situé au alentour de l'UIDT</p>
                            <p class="card-text"><span class="fs-5 fw-bold text-decoration-underline">Prix</span> : FCFA</p>
                            <!-- Ici poujr le status, on fait reference a la disponibilite de la maison -->
                            <p class="card-text"><span class="fs-5 fw-bold text-decoration-underline">Status</span> : disponible</p>
                            <p class="card-text"><small class="text-muted">Dernière mise à jour il y a 3 mins</small></p>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary text-uppercase rounded shadow justify-content-md-end">Acheter</button>
                    </div>
                </div>
            </div>

            <?php endfor; ?>
        </div>

        <h1 id="location" class="text-uppercase m-3 p-3 text-center text-decoration-underline">catégorie de maisons à louer</h1>
        
        <div class="mb-3 p-3">
                <?php for($i = 0 ; $i < 15; $i ++) : ?>

            <div class="card louer mb-3 shadow w-400 p-4 m-3 bg-body-danger d-inline-block rounded-5" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="images/villa-senegal.jpeg" class="img-fluid rounded-start" alt="Card title">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Maison à louer <?php echo $i+1?></h5>
                            <p class="card-text"><span class="fs-5 fw-bold text-decoration-underline">Description</span> : Maison situé au alentour de l'UIDT</p>
                            <p class="card-text"><span class="fs-5 fw-bold text-decoration-underline">Prix</span> : FCFA</p>
                            <!-- Ici poujr le status, on fait reference a la disponibilite de la maison -->
                            <p class="card-text"><span class="fs-5 fw-bold text-decoration-underline">Status</span> : </p>
                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <!-- <button class="btn btn-primary text-uppercase rounded shadow">Louer</button> -->
                    <?php echo showMore() ?>
                    
                </div>
            </div>

            <?php endfor; ?>
        </div>


    </main>

    
    <!-- Modal -->
    <?php  function showMore(){?>
        
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary text-uppercase rounded shadow" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Details
        </button>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Plus de details concernant la maison</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Dans ce modal, on pourra les details de la maison en entiers
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
    <?php include_once "layouts/footer.php" ; ?>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script>

        // window.addEventListener("scroll", function(){
        //     var header = document.querySelector(".block");
        //     header.classList.toggle('app', window.scrollY > 10)
        // });
        ScrollReveal().reveal('.vendre',{
            duration: 2000,
            origin: 'bottom',
            rotate: {
                x:20,
                z:10
            }
        });
        ScrollReveal().reveal('header',{
            duration: 5000,
            origin: 'bottom'
        });
    </script>

</body>

</html>     