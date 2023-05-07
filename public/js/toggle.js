document.addEventListener('DOMContentLoaded', function() {
    const toggleSwitch = document.getElementById('toggle-switch');
    
    //function to set display property of elements
    function setDisplay(className,displayValue){
        var elements = document.getElementsByClassName(className);
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.display = displayValue;
        }
        
    }

    toggleSwitch.addEventListener('change', function() {
        
      if (this.checked) {
        //first hide all boxes
        setDisplay("box","none");
               
        // api call
        const code = parseInt(userZip);
        const apikey = "d97f47e0-e71d-11ed-9004-e160202ad9cf";
        const radius = 10;
        const country = "lk";

        const url = `https://app.zipcodebase.com/api/v1/radius?apikey=${apikey}&code=${code}&radius=${radius}&country=${country}`;

        fetch(url)
        //then - wiat until response is received        
        .then(response => {
          
          if (response.status === 200) {
            return response.json();
          } else {
            throw new Error('Failed to fetch data');
          }
          
        })
        .then(data => {
                    
          // const codes = data.results.map(result => result.code).join(', ');
          // window.alert(codes);
          //get data to an array from api respose
          const zipcodes = data.results.map(result => result.code);
          
            for (let i = 0; i < zipcodes.length; i++) {
              var zip = zipcodes[i];
              //display nearby boxes
              setDisplay("box "+zip,"flex");
            }
          
            // if there are no nearby requests
            let height = document.querySelector(".gigcontainer").offsetHeight;
            if (height == 0){
              setDisplay("nothing_to_display ","flex");
            }
          
        })
        .catch(error => {
          console.error('Error:', error);
        });

      }else{ //not checked
        setDisplay("box","flex");
        setDisplay("nothing_to_display ","none");
      }
    });
  });