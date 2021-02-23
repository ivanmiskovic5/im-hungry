<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.min.js"></script>
<template>
    <div id="random">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="text-light">
                    Probajte nešto novo!
                </h3>
            </div>
            <div class="row justify-content-center">
                <button class="btn btn-primary" id="get_meal">
                    <img src="https://cdn2.iconfinder.com/data/icons/font-awesome/1792/random-512.png" height="25px" width="50px" alt="dugme">
                </button>
            </div>
            <hr>
            <div id="meal" class="row meal"></div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            const getMealBtn = document.getElementById("get_meal");
            const mealContainer = document.getElementById("meal");

            getMealBtn.addEventListener("click",() => {
                fetch("https://www.themealdb.com/api/json/v1/1/random.php")
                    .then(res => res.json())
                    .then(res => {
                        createMeal(res.meals[0])
                    })
            });

            function createMeal(meal) {
                const sastojci = [];
                var i;
                for(i=1; i<=20; i++) {
                    if(meal[`strIngredient${i}`]) {
                        sastojci.push(
                            `${meal[`strIngredient${i}`]} - ${meal[`strMeasure${i}`]}`
                        )
                    } else {
                        break;
                    }
                }

                mealContainer.innerHTML = `
                    <div class="row justify-content-around">
                        <div class="col-6">
                            <img src="${meal.strMealThumb}" height="500px" width="500px" alt="Meal Img"/>
                            <p class="text-light"><strong>Kategorija: </strong>${meal.strCategory}</p>
                            <p class="text-light"><strong>Porijetlo: </strong>${meal.strArea}</p>
                            <p class="text-light"><strong>Vrsta: </strong>${meal.strTags}</p>

                            <h5 class="text-light">Sastojci</h5>
                            <ul class="text-light">
                                ${sastojci.map(ingredient => `
                                    <li>${ingredient}</li>
                                `).join(``)}
                            </ul>
                        </div>
                        <div class="col-6">
                            <h4 class="text-light">${meal.strMeal}</h4>
                            <p class="text-light">${meal.strInstructions}</p>
                        </div>
                    </div>

                    <h2 class="text-light" align="center"></h2>
                    <hr>
                    <div class="videoWrapper" align="center">
                        <iframe src="https://www.youtube.com/embed/${meal.strYoutube.slice(-11)}" height="500px" width="1200px" />
                    </div>
                `;        
            }
        }
    }
</script>

<style>
    
</style>