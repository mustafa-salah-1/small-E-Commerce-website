<?php


$title_page = "Game Store Page";
$file_css = "home.css";

include 'components/app.php';

?>
 



<!-- Hero Section -->
<section class="hero-section d-flex align-items-center">
    <div class="container text-center">
        <h1 class="display-3 fw-bold" style="text-shadow: 0 0 10px var(--neon-green); font-family: 'Orbitron'">
            PREMIUM GAME COLLECTION
        </h1>
        <p class="lead">Experience the ultimate in gaming excellence</p>
    </div>
</section>

 


<!-- Console Filter Section -->
<section class="py-5">
    <div class="container">
        <h2 class="section-title mb-5">FILTER BY CONSOLE</h2>
        <div class="row g-3 text-center">


            <div class="col-6 col-md-3">
                <div class="console-filter-item ps p-3 border border-2 rounded"
                    style="border-color: var(--ps-blue) !important;"
                    data-filter="ps">
                    <i class="fab fa-playstation fa-3x mb-2" style="color: var(--ps-blue);"></i>
                    <h5>PlayStation</h5>
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="console-filter-item xbox p-3 border border-2 rounded"
                    style="border-color: var(--xbox-green) !important;"
                    data-filter="xbox">
                    <i class="fab fa-xbox fa-3x mb-2" style="color: var(--xbox-green);"></i>
                    <h5>Xbox</h5>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Game Cards (with data attributes) -->
<div class="d1">
    <section class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h2 class="section-title">TOP SELLERS</h2>
            </div>

            <div class="row g-4 filtered-games">
                <!-- Xbox Games (8 total) -->
                <div class="col-md-6 col-lg-3" data-consoles="xbox">
                    <div class="game-card rounded h-100">
                        <img src="img/dogs.jpg" class="game-img w-100" alt="Halo Infinite">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge xbox-badge">XBOX</span>
                                <span class="rating"><i class="fas fa-star"></i> 4.7/5</span>
                            </div>
                            <h4>Watch Dogs</h4>
                            <p class="text-warning">FPS | 343 Industries</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$59.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-consoles="xbox">
                    <div class="game-card rounded h-100">
                        <img src="img/farcry.webp" class="game-img w-100" alt="Forza Horizon 5">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge xbox-badge">XBOX</span>
                                <span class="rating"><i class="fas fa-star"></i> 4.9/5</span>
                            </div>
                            <h4>Farcry 5</h4>
                            <p class="text-warning">Racing | Playground Games</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$59.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-consoles="xbox">
                    <div class="game-card rounded h-100">
                        <img src="img/mafia.jpg" class="game-img w-100" alt="Gears 5">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge xbox-badge">XBOX</span>
                                <span class="rating"><i class="fas fa-star"></i> 4.5/5</span>
                            </div>
                            <h4>Mafia 2</h4>
                            <p class="text-warning">Shooter | The Coalition</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$39.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-consoles="xbox">
                    <div class="game-card rounded h-100">
                        <img src="img/hogwart.jpg" class="game-img w-100" alt="Starfield">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge xbox-badge">XBOX</span>
                                <span class="rating"><i class="fas fa-star"></i> 4.8/5</span>
                            </div>
                            <h4>Hogwarts</h4>
                            <p class="text-warning">RPG | Bethesda</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$69.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Xbox Games -->
                <div class="col-md-6 col-lg-3" data-consoles="xbox">
                    <div class="game-card rounded h-100">
                        <img src="img/fifa.webp" class="game-img w-100" alt="Sea of Thieves">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge xbox-badge">XBOX</span>
                                <span class="rating"><i class="fas fa-star"></i> 4.6/5</span>
                            </div>
                            <h4>Fifa 25/h4>
                                <p class="text-warning">Adventure | Rare</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="price-tag">$39.99</span>
                                    <button class="btn btn-buy btn-sm">ADD TO CART</button>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-consoles="xbox">
                    <div class="game-card rounded h-100">
                        <img src="img/b1.jpg" class="game-img w-100" alt="Forza Motorsport">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge xbox-badge">XBOX</span>
                                <span class="rating"><i class="fas fa-star"></i> 4.7/5</span>
                            </div>
                            <h4>Battlefield 1</h4>
                            <p class="text-warning">Racing | Turn 10</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$59.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-consoles="xbox">
                    <div class="game-card rounded h-100">
                        <img src="img/kombat.webp" class="game-img w-100" alt="Hi-Fi Rush">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge xbox-badge">XBOX</span>
                                <span class="rating"><i class="fas fa-star"></i> 4.8/5</span>
                            </div>
                            <h4>Mortal Kombat </h4>
                            <p class="text-warning">Rhythm | Tango Gameworks</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$29.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-consoles="xbox">
                    <div class="game-card rounded h-100">
                        <img src="img/kratos2.jpg" class="game-img w-100" alt="Psychonauts 2">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge xbox-badge">XBOX</span>
                                <span class="rating"><i class="fas fa-star"></i> 4.9/5</span>
                            </div>
                            <h4>Kratos 1</h4>
                            <p class="text-warning">Adventure | Double Fine</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$59.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>






                <!-- PlayStation Games -->
                <div class="col-md-6 col-lg-3" data-consoles="ps">
                    <div class="game-card rounded h-100">
                        <img src="img/horizon.webp" class="game-img w-100" alt="Spider-Man 2">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge ps-badge">PS5</span>
                                <span class="rating"><i class="fas fa-star"></i> 4.9/5</span>
                            </div>
                            <h4>Forza Horizon</h4>
                            <p class="text-warning">Action | Insomniac</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$69.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-consoles="ps">
                    <div class="game-card rounded h-100">
                        <img src="img/last.webp" class="game-img w-100" alt="God of War Ragnarök">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge ps-badge">PS5</span>
                                <span class="rating"><i class="fas fa-star"></i> 5/5</span>
                            </div>
                            <h4>Last of Us |</h4>
                            <p class="text-warning">Action | Santa Monica</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$69.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PlayStation + PC Games -->
                <div class="col-md-6 col-lg-3" data-consoles="ps">
                    <div class="game-card rounded h-100">
                        <img src="img/p5.jpg" class="game-img w-100" alt="Horizon Forbidden West">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge ps-badge">PS5</span>

                                <span class="rating"><i class="fas fa-star"></i> 4.8/5</span>
                            </div>
                            <h4>The Witcher</h4>
                            <p class="text-warning">Open World | Guerrilla</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$59.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-consoles="ps">
                    <div class="game-card rounded h-100">
                        <img src="img/p4.jpg" class="game-img w-100" alt="The Last of Us Part I">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge ps-badge">PS5</span>

                                <span class="rating"><i class="fas fa-star"></i> 4.9/5</span>
                            </div>
                            <h4>Sniper elite</h4>
                            <p class="text-warning">Action | Naughty Dog</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$69.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-consoles="ps">
                    <div class="game-card rounded h-100">
                        <img src="img/bo3.jpg" class="game-img w-100" alt="The Last of Us Part I">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge ps-badge">PS5</span>

                                <span class="rating"><i class="fas fa-star"></i> 4.9/5</span>
                            </div>
                            <h4>Call of dute bo3</h4>
                            <p class="text-warning">Action | Naughty Dog</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$69.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-consoles="ps">
                    <div class="game-card rounded h-100">
                        <img src="img/ghost2.jpg" class="game-img w-100" alt="The Last of Us Part I">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge ps-badge">PS5</span>

                                <span class="rating"><i class="fas fa-star"></i> 4.9/5</span>
                            </div>
                            <h4>Ghost of suchima 2</h4>
                            <p class="text-warning">Action | Naughty Dog</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$69.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3" data-consoles="ps">
                    <div class="game-card rounded h-100">
                        <img src="img/gta.webp" class="game-img w-100" alt="The Last of Us Part I">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge ps-badge">PS5</span>

                                <span class="rating"><i class="fas fa-star"></i> 4.9/5</span>
                            </div>
                            <h4>Gta V</h4>
                            <p class="text-warning">Action | Naughty Dog</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$69.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- PC Only Games -->
                <div class="col-md-6 col-lg-3" data-consoles="ps">
                    <div class="game-card rounded h-100">
                        <img src="img/cod.jpg" class="game-img w-100" alt="Baldur's Gate 3">
                        <div class="p-3">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="badge ps-badge">PS5</span>
                                <span class="rating"><i class="fas fa-star"></i> 5/5</span>
                            </div>
                            <h4>Call of dute WWII</h4>
                            <p class="text-warning">RPG | Larian Studios</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="price-tag">$59.99</span>
                                <button class="btn btn-buy btn-sm">ADD TO CART</button>
                            </div>
                        </div>
                    </div>
                </div>





            </div>
        </div>
    </section>
</div>

<!-- Add this after your product cards in each section -->
<div class="text-center mt-4">
    <a class="btn btn-outline-light see-all-btn">
        See All Controllers <i class="fas fa-chevron-right"></i>
    </a>
    <br>
    <div class="green-line mx-auto" style="width: 10%; height: 3px; background:rgb(0, 255, 17); margin-top: 30px;"></div>
</div> <br><br>

 
<?php include 'components/footer.php'; ?> 