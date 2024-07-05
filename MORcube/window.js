  window.onload = function (){
    document.getElementById("download")
    .addEventListener("click",()=>{
      const form = this.document.getElementById("form");
      console.log(form);
      console.log(window);
      html2pdf().from(form).save();
    })  
  }