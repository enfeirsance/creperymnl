
let smallImg = document.querySelectorAll(".smallImg img");
let mainImg = document.querySelector("#mainimg");


smallImg[0].onclick = function () {
   mainImg.src = smallImg[0].src 
}
smallImg[1].onclick = function () {
   mainImg.src = smallImg[1].src 
}
smallImg[2].onclick = function () {
   mainImg.src = smallImg[2].src 
}
smallImg[3].onclick = function () {
   mainImg.src = smallImg[3].src 
}
smallImg[4].onclick = function () {
   mainImg.src = smallImg[4].src 
}
smallImg[5].onclick = function () {
   mainImg.src = smallImg[5].src
};

class User{
   constructor(id, username, age) {
      this.us = username;
      this.ag = age;
      this.i = id;
   };
   
   Updatname(newname) {
      thie.us = newname
   };
}

 
let testUser = new User(12, "hamid", 19);

testUser.Updatname("j")

console.log(testUser.us)