function showNavbar() {
  var navElements = $("#navElementsId");
  if (navElements.hasClass("noVisible")) {
    navElements.removeClass("noVisible");
  } else {
    navElements.addClass("noVisible");
  }
}

function cambiarTab(event) {
  var tabs = document.getElementsByClassName("tab-pane");
  $('.tab').removeClass("tab-active");
  event.target.classList.add("tab-active");

  for(var i=0;i<tabs.length;i++)
  {
      if(tabs[i].id+"-tab"==event.target.id)
      {
          tabs[i].classList.remove('noVisible');

      }else
      tabs[i].classList.add('noVisible');
  }

}