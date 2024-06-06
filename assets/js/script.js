function showPass() {
//    let password = document.getElementById("mdp");
//   let confirmMdp = document.getElementById("confirmMdp");

    if (mdp.type === "password") {
        mdp.type = "text";
        confirmMdp.type = "text";
       

    } else {
        mdp.type = "password";
        confirmMdp.type = "password";
        
        
    }
}


// const searchIcon = document.querySelector('.search-icon');
// const searchBar = document.querySelector('.search-bar');



// searchIcon.addEventListener('click', () => {
//     searchBar.classList.remove('show');
//   searchBar.classList.toggle('show');
// });

// const searchIcon = document.querySelector('.search-icon');
// const searchBar = document.querySelector('.search-bar');

// // Masquer la barre de recherche par défaut

// searchIcon.addEventListener('click', () => {
//   if (searchBar.classList.contains('show')) {
//     searchBar.classList.remove('show');
//   } else {
//     searchBar.classList.add('show');
//   }
// });



// PAGES LES 7 RYTHMES 

document.addEventListener("DOMContentLoaded", function() {
    let flippers = document.querySelectorAll('.flipper');
    let index = 0;
  
    function flip() {
      if (index < flippers.length) {
        flippers[index].classList.add('flipped');
        index++;
      } else {
        index = 0;
      }
    }
  
    flip();
    setInterval(flip, 2000); // Change the delay as needed (currently 2000ms = 2s)
  });