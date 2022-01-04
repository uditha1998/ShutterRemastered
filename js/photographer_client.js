function openNav() {
    document.getElementById("mySidenav").style.width = "260px ";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function buttonClick() {
    confirm("Press a button!");
}



function preview_image(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('profile_image');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}




function previewportfolioImages() {

    var preview = document.querySelector('#portfolio_images');
    
    if (this.files) {
      [].forEach.call(this.files, readAndPreview);
    }
  
    function readAndPreview(file) {
      var reader = new FileReader();
      
      reader.addEventListener("load", function() {
        var image = new Image();
        image.width = 210;
        image.height = 140;
        image.classList.add('portfolio_images_con');
        image.title  = file.name;
        image.src    = this.result;
        preview.appendChild(image);
      }); 
      reader.readAsDataURL(file);   
    }
  }
  document.querySelector('#image').addEventListener("change", previewportfolioImages);

