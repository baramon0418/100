window.onload = function () {
      var filter = "win16|win32|win64|mac|macintel";

      if (navigator.platform) {
        if (filter.indexOf(navigator.platform.toLowerCase()) < 0) {
          //mobile
          //location.href = './mobile.html'
          console.log('모바일');
        } else {
          //pc
          console.log('pc 접속');
        }
      }
      document.body.style.zoom = "90%";
    }