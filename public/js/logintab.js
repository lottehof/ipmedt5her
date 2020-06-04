console.log("hallo test");
let tabs = document.getElementsByClassName('js--loginform-button');
let panels = document.getElementsByClassName('js--loginform-article');

const setTabHandler = (tab, tabPos) => {
  tab.onclick = () => {
    for(let i = 0; i < tabs.length; i++) {
      tabs[i].classList.remove("js--active");
    }

    tab.classList.add("js--active");

    for(let i = 0; i < panels.length; i++) {
      panels[i].classList.remove("js--active-panel");
    }

    panels[tabPos].classList.add("js--active-panel");
  }
}

for(let i = 0; i < tabs.length; i++) {
  let tab = tabs[i];
  setTabHandler(tab, i);
}
