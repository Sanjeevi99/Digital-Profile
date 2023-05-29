// const wrapper = document.querySelector(".wrapper"),
// qrInput = wrapper.querySelector(".form input"),
// generateBtn = wrapper.querySelector(".form button"),
// qrImg = wrapper.querySelector(".qr-code img");
// let preValue;


// generateBtn.addEventListener("click", () => {
  

//   if(!qrValue || preValue === qrValue) return;
//   preValue = qrValue;
//   generateBtn.innerText = "Generating QR Code...";
//   // document.getElementsByTagName("img").src = `https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=${qrValue} ${vacc1_name} ${vacc2_name} ${vacc3_name}`;
//   qrImg.addEventListener("load", () => {
//       wrapper.classList.add("active");
//       generateBtn.innerText = "Generate QR Code";
//   });
// });

/**
 * Function to populate values in card from form input
 */
 function generateCard() {

  // let qrValue = document.getElementById("Name").value;
  // let qrValue1 = document.getElementById("NICNumber").value;
  // let qrValue2 = document.getElementById("Vaccine").value;
  //   // Get value of Student name from form input 
  //   //const nameElement = document.getElementById("name");
  //   const nameValue = document.getElementById("name").value; 
  //   // Assign the value of student name to generated card
  //   //const cardNameElement = document.getElementById("Name");
  //  document.getElementById("Name").innerHTML = nameValue;

  //   // Get value of college name from form input 
  //   const nicValue = document.getElementById("NIC").value;
  //   // Assign the value of college name to generated card
  //   document.getElementById("NICNumber").innerHTML = nicValue;

  //   // Get value of location name from form input 
  //   const vaccinationValue = document.getElementById("Vaccination").value;
  //   // Assign the value of location name to generated card
  //   document.getElementById("Vaccine").innerHTML = vaccinationValue;

  //   const vacc1_name = document.getElementById("vacc1_name").value;
  //   const vacc2_name = document.getElementById("vacc2_name").value;
  //   const vacc3_name = document.getElementById("vacc3_name").value;

    // const today = new Date();

    // let date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    // let time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    // document.getElementById("cardDate").innerHTML =  date;
    // document.getElementById("cardTime").innerHTML =  time;


    // document.getElementById("img").src = `https://api.qrserver.com/v1/create-qr-code/?size=100x100&data= ${nicValue} ${nicValue} ${nicValue}`;

    /*let value = document.getElementById("Vaccination").value;
  
    if (value == 1){
    document.getElementById("colortag").style.backgroundColor = "Orange";
    }
    if (value == 2){
    document.getElementById("colortag").style.backgroundColor = "yellow";
    }
    if (value == 3){
    document.getElementById("colortag").style.backgroundColor = "green";
    }*/
    
    // Display final generated card to user     
    // document.getElementById("Card").style.visibility ="visible";
}

// function myFunction() {
//     let value = document.getElementById("Vaccination").value;
    
//     if (value == 1){
//     document.getElementById("colortag").style.backgroundColor = "Orange";
    
//     }
//     if (value == 2){
//     document.getElementById("colortag").style.backgroundColor = "yellow";
//     }
//     if (value == 3){
//     document.getElementById("colortag").style.backgroundColor = "green";
//     }
//   }

//   function visibility(){
//     document.getElementById("Card").style.visibility ="hidden";
    
// }