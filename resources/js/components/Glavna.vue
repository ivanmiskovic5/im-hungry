<template>
    <div>
        <div id="carouselExampleIndicators" class="carousel slide shadow-lg" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="https://i.pinimg.com/originals/1a/04/9d/1a049d0db3c8a238ded1b4af745b1c1c.jpg" height="700px" width="500px" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="text-warning font-weight-bold font-italic">Dobrodošli!</h2>
                        <h3 class="text-warning font-weight-bold font-italic">Mi govorimo jezik ukusne hrane!</h3>
                    </div>
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="https://wallpaperaccess.com/full/767252.jpg" height="700px" width="500px" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="text-warning font-weight-bold font-italic">Najbolja hrana za vas!</h2>
                        <h3 class="text-warning font-weight-bold font-italic">Naručite odmah!</h3>
                    </div>
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="https://previews.123rf.com/images/pivden/pivden1711/pivden171100011/89309544-poster-fast-food-vector-color-flat-illustration-on-dark-background.jpg" height="700px" width="500px" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="text-warning font-weight-bold font-italic">Neumični Generator</h2>
                        <h3 class="text-warning font-weight-bold font-italic">Ne možete se odlučiti? Okušajte svoju sreću i probajte nešto sasvim drugačije!</h3>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <br>
        <hr>
        <div class="text-center bg-light">
            <img src="https://pnglive.com/wp-content/uploads/2021/01/Vue-JS-Logo-Background-PNG-Image.png" class="rounded" height="150px" width="200px" alt="VueJS">
            <img src="https://miro.medium.com/max/934/1*cPt2YI-5YxhfL3_Uhw0txA.png" class="rounded" height="150px" width="250px" alt="Laravel">
            <img src="https://process.fs.teachablecdn.com/ADNupMnWyR7kCWRvm76Laz/resize=width:705/https://www.filepicker.io/api/file/bciJjUAsRzG6UQbCRcVe" class="rounded" height="150px" width="210px" alt="Bootstrap 4">
            <img src="https://www.freepnglogos.com/uploads/html5-logo-png/html5-logo-devextreme-multi-purpose-controls-html-javascript-3.png" class="rounded" height="150px" width="500px" alt="HTML CSS JS">
            <img src="https://cdn2.hubspot.net/hubfs/5308965/github_PNG15.png" class="rounded" height="150px" width="270px" alt="GitHub">
            <img src="https://pnglive.com/wp-content/uploads/2021/01/Node-JS-Logo-Transparent-PNG-Image.png" class="rounded" height="150px" width="170px" alt="NodeJS">
        </div>
        <hr>
        <div class="footer">
            <p><strong>IM-hungry | 2021.est.</strong></p>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{

            }
        }
    }
</script>

<style>
    body {
    background-image: url(https://png.pngtree.com/thumb_back/fw800/back_our/20190619/ourmid/pngtree-small-fresh-and-simple-pizza-restaurant-menu-background-material-image_134528.jpg);
    background-size: cover;
    }

    .carousel-inner {
    width: 80%;
    margin: auto;
    }

    .footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    background-color: whitesmoke;
    color: rgb(0, 0, 0);
    text-align: center;
    }
</style>
