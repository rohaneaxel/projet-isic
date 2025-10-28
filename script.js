const list = document.querySelectorAll('.list');
    
    function activeLink(){
            list.forEach((item) =>
                item.classList.remove('active'));
                 this.classList.add('active');
                }
    list.forEach((item) =>
        item.addEventListener('click',activeLink));
    
    let scrollContainer = document.querySelector(".slide");
    let backBtn = document.getElementById("backBtn");
    let nextBtn = document.getElementById("nextBtn");

        nextBtn.addEventListener("click", ()=>{
            scrollContainer.style.scrollBehavior = "smooth";
            scrollContainer.scrollLeft += 718;
        });
        backBtn.addEventListener("click", ()=>{
            scrollContainer.style.scrollBehavior = "smooth";
            scrollContainer.scrollLeft -= 718;
        });

