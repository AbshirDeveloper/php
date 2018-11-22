document.getElementById('class').onsubmit = function(){
           if(document.getElementById('kow').value == ""){
            document.getElementById('red').innerHTML = "First name can't be empty";
            return false;
          } else if(document.getElementById('labo').value == ""){
            document.getElementById('red').innerHTML = "Please make sure all fields are provided";
            //document.getElementById('kow').value = ""
            return false;
          } else if(document.getElementById('sadex').value == ""){
            document.getElementById('red').innerHTML = "Username can't be empty";
            //document.getElementById('kow').value = ""
            return false;
          } else if(document.getElementById('afar').value == ""){
            document.getElementById('red').innerHTML = "Password must be provided";
            //document.getElementById('kow').value = ""
            return false;
          } else if(document.getElementById('shan').value == ""){
            document.getElementById('red').innerHTML = "You have to confirm password";
            //document.getElementById('kow').value = ""
            return false;
          }else if(document.getElementById('lix').value == ""){
            document.getElementById('red').innerHTML = "Without providing email, we won't be able to reach you";
            //document.getElementById('kow').value = ""
            return false;
          }else if(document.getElementById('todobo').value == ""){
            document.getElementById('red').innerHTML = "Without providing your email, we won't be able to reach you for the recovery";
            //document.getElementById('kow').value = ""
            return false;
          }

      }

var divwe = document.getElementById('sawir');
var imagearray = ["../data/kow.jpg", "../data/labo.jpg", "../data/sadex.png", "../data/afar.jpg", "../data/shan.jpg"];
var imageindex = 0;
function abshir(){
  divwe.setAttribute("src", imagearray[imageindex]);
  imageindex++;
  if(imageindex >= imagearray.length){
    imageindex = 0;
  }
};
setInterval(abshir,3000);