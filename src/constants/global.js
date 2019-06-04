const SITE_TITLE = "Maarten van der Heijden Portfolio";
const SITE_AUTHOR = "Maarten van der Heijden";

const MENU_ITEMS = [
  {
    name: "home",
    displayName: "Home",
    href: "/"
  },
  {
    name: "about",
    displayName: "About me",
    href: "/about"
  },
  {
    name: "experience",
    displayName: "Experience",
    href: "/experience"
  },
  {
    name: "projects",
    displayName: "Projects",
    href: "/projects"
  },
  {
    name: "contact",
    displayName: "Contact",
    href: "/contact"
  }
];

export const GLOBAL_vARS = {
  layout: {
    title: SITE_TITLE,
    menu: {
      items: MENU_ITEMS
    }
  },
  site: {
    name: SITE_TITLE,
    author: SITE_AUTHOR
  }
};
