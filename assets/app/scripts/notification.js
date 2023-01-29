// var notify = document.getElementById("notify-input");
// var time = document.getElementById("time-input");
// var importance = document.getElementById("importance");
// var txt = document.getElementById("txt");

// function teste (){
//   txt.innerHTML = notify.value + "<br> hora: " + time.value + "<br> Importância: " + importance.value;
//   txt.classList.add("notifications");
  
//   setInterval(function () {
//     const Notifytime = time.value;

//     const [hours, minutes] = Notifytime.split(":");
//     // console.log(hours);
//     // console.log(minutes);

//     var date = new Date();

//     var todayhours = date.getHours();
//     var todayminutes = date.getMinutes();
//     // console.log(todayhour)
//     // console.log(todayminutes)
//     if (hours == todayhours && minutes == todayminutes) {
//       // document.getElementById("audio").play();
//       Push.create("Notificação!", {
//         body: notify.value,
//         icon: "bell.png",
//         timeout: 6000,
//         onClick: function () {
//           window.focus();
//           this.close();
//         },
//       });
//     }
//   }, 6000);
  
// }







