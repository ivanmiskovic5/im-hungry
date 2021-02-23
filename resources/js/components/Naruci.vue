<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<template>
  <div class = "container">
    <div class = "meal-wrapper">
      <div class = "meal-search">
        <h2 class = "title text-light">Odaberite nešto posebno!</h2>

        <div class = "meal-search-box">
          <input type = "text" class = "search-control" placeholder="Pretraga..." id = "search-input">
          <button type = "submit" class = "search-btn btn" id = "search-btn">
            <i class = "fas fa-search">
              <img src="https://www.freeiconspng.com/thumbs/search-icon-png/search-icon-png-21.png" width="20px" height="20px" alt="pretraga">
            </i>
          </button>
        </div>
      </div>

      <div class = "meal-result">
        <h2 class = "title text-light">Ponuda:</h2>
        <div id= "meal">
          <!-- meal item -->
          <!-- <div class = "meal-item">
            <div class = "meal-img">
              <img src = "food.jpg" alt = "food">
            </div>
            <div class = "meal-name">
              <h3>Potato Chips</h3>
              <a href = "#" class = "recipe-btn">Get Recipe</a>
            </div>
          </div> -->
          <!-- end of meal item -->
        </div>
      </div>


      <div class = "meal-details">
        <!-- recipe close btn -->
        <button type = "button" class = "btn recipe-close-btn" id = "recipe-close-btn">
          <i class = "fas fa-times">
            <img src="https://cdn3.iconfinder.com/data/icons/pyconic-icons-1-2/512/close-512.png" width="20px" height="20px" alt="zatvori">
          </i>
        </button>

        <!-- meal content -->
        <div class = "meal-details-content">
          <!-- <h2 class = "recipe-title">Meals Name Here</h2>
          <p class = "recipe-category">Category Name</p>
          <div class = "recipe-instruct">
            <h3>Instructions:</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo blanditiis quis accusantium natus! Porro, reiciendis maiores molestiae distinctio veniam ratione ex provident ipsa, soluta suscipit quam eos velit autem iste!</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet aliquam voluptatibus ad obcaecati magnam, esse numquam nisi ut adipisci in?</p>
          </div>
          <div class = "recipe-meal-img">
            <img src = "food.jpg" alt = "">
          </div>
          <div class = "recipe-link">
            <a href = "#" target = "_blank">Watch Video</a>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted(){
    const searchBtn = document.getElementById('search-btn');
    const mealList = document.getElementById('meal');
    const mealDetailsContent = document.querySelector('.meal-details-content');
    const recipeCloseBtn = document.getElementById('recipe-close-btn');

    // event listeners
    searchBtn.addEventListener('click', getMealList);
    mealList.addEventListener('click', getMealRecipe);
    recipeCloseBtn.addEventListener('click', () => {
        mealDetailsContent.parentElement.classList.remove('showRecipe');
    });


    // get meal list that matches with the ingredients
    function getMealList(){
        let searchInputTxt = document.getElementById('search-input').value.trim();
        fetch(`https://www.themealdb.com/api/json/v1/1/search.php?s=${searchInputTxt}`)
        .then(response => response.json())
        .then(data => {
            let html = "";
            if(data.meals){
                data.meals.forEach(meal => {
                    html += `
                        <div class = "meal-item" data-id = "${meal.idMeal}">
                            <div class = "meal-img">
                                <img src = "${meal.strMealThumb}" alt = "food">
                            </div>
                            <div class = "meal-name">
                              <h2><strong>${meal.strMeal}</strong></h3>
                              <hr>
                              <h5>${meal.strArea}</h5>
                              <hr>
                              <h5>${meal.strCategory}</h5>
                              <hr>
                              <a href = "#" class = "recipe-btn">Više</a>
                              <a href="https://www.instagram.com/ivanmiskovic5/" class="order-btn">Naručite!</a>
                            </div>
                        </div>
                    `;
                });
                mealList.classList.remove('notFound');
            } else{
                html = "Sorry, we didn't find any meal!";
                mealList.classList.add('notFound');
            }

            mealList.innerHTML = html;
        });
    }

    
    // get recipe of the meal
    function getMealRecipe(e){
        e.preventDefault();
        if(e.target.classList.contains('recipe-btn')){
            let mealItem = e.target.parentElement.parentElement;
            fetch(`https://www.themealdb.com/api/json/v1/1/lookup.php?i=${mealItem.dataset.id}`)
            .then(response => response.json())
            .then(data => mealRecipeModal(data.meals));
        }
    }

    // create a modal
    function mealRecipeModal(meal){
        console.log(meal);
        meal = meal[0];
        let html = `
            <h2 class = "recipe-title">${meal.strMeal}</h2>
            <p class = "recipe-category">${meal.strCategory}</p>
            <div class = "recipe-instruct">
                <h3>Instructions:</h3>
                <p>${meal.strInstructions}</p>
            </div>
            <div class = "recipe-meal-img">
                <img src = "${meal.strMealThumb}" alt = "">
            </div>
            <div class = "recipe-link">
                <a href = "${meal.strYoutube}" target = "_blank">Video</a>
            </div>
        `;
        mealDetailsContent.innerHTML = html;
        mealDetailsContent.parentElement.classList.add('showRecipe');
    }
  }
};
</script>

<style>
  :root{
      --tenne-tawny: #d65108;
      --tenne-tawny-dark: #b54507;
  }

  .btn{
    font-family: inherit;
    cursor: pointer;
    outline: 0;
    font-size: 1.05rem;
  }
  .text{
      opacity: 0.8;
  }
  .title{
      font-size: 2rem;
      margin-bottom: 1rem;
  }

  .meal-wrapper{
      max-width: 1280px;
      margin: 0 auto;
      padding: 2rem;
      text-align: center;
  }
  .meal-search{
      margin: 2rem 0;
  }
  .meal-search cite{
      font-size: 1rem;
  }
  .meal-search-box{
      margin: 1.2rem 0;
      display: flex;
      align-items: stretch;
  }
  .search-control,
  .search-btn{
      width: 100%;
  }
  .search-control{
      padding: 0 1rem;
      font-size: 1.1rem;
      font-family: inherit;
      outline: 0;
      border: 1px solid var(--tenne-tawny);
      color: var(--tenne-tawny);
      border-top-left-radius: 2rem;
      border-bottom-left-radius: 2rem;
  }
  .search-control::placeholder{
      color: var(--tenne-tawny);
  }
  .search-btn{
      width: 55px;
      height: 55px;
      font-size: 1.8rem;
      background: var(--tenne-tawny);
      color: #fff;
      border: none;
      border-top-right-radius: 2rem;
      border-bottom-right-radius: 2rem;
      transition: all 0.4s linear;
      -webkit-transition: all 0.4s linear;
      -moz-transition: all 0.4s linear;
      -ms-transition: all 0.4s linear;
      -o-transition: all 0.4s linear;
  }
  .search-btn:hover{
      background: var(--tenne-tawny-dark);
  }
  .meal-result{
      margin-top: 4rem;
  }
  #meal{
      margin: 2.4rem 0;
  }
  .meal-item{
      border-radius: 1rem;
      -webkit-border-radius: 1rem;
      -moz-border-radius: 1rem;
      -ms-border-radius: 1rem;
      -o-border-radius: 1rem;
      overflow: hidden;
      box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.79);
      margin: 2rem 0;
      background: white;
  }
  .meal-img img{
      width: 100%;
      display: block;
  }
  .meal-name{
      padding: 1.5rem 0.5rem;
  }
  .meal-name h3{
      font-size: 1.4rem;
  }
  .recipe-btn, .order-btn{
      text-decoration: none;
      color: #fff;
      background: var(--tenne-tawny);
      font-weight: 500;
      font-size: 1.1rem;
      padding: 0.75rem 0;
      display: block;
      width: 175px;
      margin: 1rem auto;
      border-radius: 2rem;
      -webkit-border-radius: 2rem;
      -moz-border-radius: 2rem;
      -ms-border-radius: 2rem;
      -o-border-radius: 2rem;
      transition: all 0.4s linear;
      -webkit-transition: all 0.4s linear;
      -moz-transition: all 0.4s linear;
      -ms-transition: all 0.4s linear;
      -o-transition: all 0.4s linear;
  }
  .recipe-btn:hover{
      background: var(--tenne-tawny-dark);
  }

  /* meal details */
  .meal-details{
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -webkit-transform: translate(-50%, -50%);
      -moz-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      -o-transform: translate(-50%, -50%);
      color: #fff;
      background: var(--tenne-tawny);
      border-radius: 1rem;
      -webkit-border-radius: 1rem;
      -moz-border-radius: 1rem;
      -ms-border-radius: 1rem;
      -o-border-radius: 1rem;
      width: 90%;
      height: 90%;
      overflow-y: scroll;
      display: none;
      padding: 2rem 0;
  }
  .meal-details::-webkit-scrollbar{
      width: 10px;
  }
  .meal-details::-webkit-scrollbar-thumb{
      background: #f0f0f0;
      border-radius: 2rem;
      -webkit-border-radius: 2rem;
      -moz-border-radius: 2rem;
      -ms-border-radius: 2rem;
      -o-border-radius: 2rem;
  }


  /* js related */
  .showRecipe{
      display: block;
  }

  .meal-details-content{
      margin: 2rem;
  }
  .meal-details-content p:not(.recipe-category){
      padding: 1rem 0;
  }
  .recipe-close-btn{
      position: absolute;
      right: 2rem;
      top: 2rem;
      font-size: 1.8rem;
      background: #fff;
      border: none;
      width: 35px;
      height: 35px;
      border-radius: 50%;
      -webkit-border-radius: 50%;
      -moz-border-radius: 50%;
      -ms-border-radius: 50%;
      -o-border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      opacity: 0.9;
  }
  .recipe-title{
      letter-spacing: 1px;
      padding-bottom: 1rem;
  }
  .recipe-category{
      background: #fff;
      font-weight: 600;
      color: var(--tenne-tawny);
      display: inline-block;
      padding: 0.2rem 0.5rem;
      border-radius: 0.3rem;
      -webkit-border-radius: 0.3rem;
      -moz-border-radius: 0.3rem;
      -ms-border-radius: 0.3rem;
      -o-border-radius: 0.3rem;
  }
  .recipe-category{
      background: #fff;
      font-weight: 600;
      color: var(--tenne-tawny);
      display: inline-block;
      padding: 0.2rem 0.5rem;
      border-radius: 0.3rem;
      -webkit-border-radius: 0.3rem;
      -moz-border-radius: 0.3rem;
      -ms-border-radius: 0.3rem;
      -o-border-radius: 0.3rem;
  }
  .recipe-instruct{
      padding: 1rem 0;
  }
  .recipe-meal-img img{
      width: 100px;
      height: 100px;
      border-radius: 50%;
      -webkit-border-radius: 50%;
      -moz-border-radius: 50%;
      -ms-border-radius: 50%;
      -o-border-radius: 50%;
      margin: 0 auto;
      display: block;
  }
  .recipe-link{
      margin: 1.4rem 0;
  }
  .recipe-link a{
      color: #fff;
      font-size: 1.2rem;
      font-weight: 700;
      transition: all 0.4s linear;
      -webkit-transition: all 0.4s linear;
      -moz-transition: all 0.4s linear;
      -ms-transition: all 0.4s linear;
      -o-transition: all 0.4s linear;
  }
  .recipe-link a:hover{
      opacity: 0.8;
  }


  /*  */
  .notFound{
      grid-template-columns: 1fr!important;
      color: var(--tenne-tawny);
      font-size: 1.8rem;
      font-weight: 600;
      width: 100%;
  }






  /* Media Queries */
  @media screen and (min-width: 600px){
      .meal-search-box{
          width: 540px;
          margin-left: auto;
          margin-right: auto;
      }
  }

  @media screen and (min-width: 768px){
      #meal{
          display: grid;
          grid-template-columns: repeat(2, 1fr);
          gap: 2rem;
      }
      .meal-item{
          margin: 0;
      }
      .meal-details{
          width: 700px;
      }
  }

  @media screen and (min-width: 992px){
      #meal{
          grid-template-columns: repeat(3, 1fr);
      }
  }
</style>
