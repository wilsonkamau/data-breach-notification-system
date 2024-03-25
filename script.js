const pathName = window.location.pathname;
const pageName = pathName.split("/").pop();

if(pageName === ".Data.html"){
   document.querySelector("Data").classList.add("activeLink");
}

if(pageName === ".affected.html"){
   document.querySelector("Data").classList.add("activeLink");
}

if(pageName === "contact.html"){
   document.querySelector("Data").classList.add("activeLink");
}