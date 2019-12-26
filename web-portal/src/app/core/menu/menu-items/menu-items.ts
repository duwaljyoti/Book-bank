import { Injectable } from '@angular/core';

/*
 * Menu interface
 */
export interface Menu {
	state: string;
	name?: string;
	type?: string;
	icon?: string;
	children?: ChildrenItems[];
}

/*
 * Children menu interface
 */
export interface ChildrenItems {
  	state: string;
  	name: string;
  	type?: string;
}

const HEADERMENUITEMS = [
   // {
   //    state: "home",
   //    name: "Home",
   //    type:"link"
   // },

   {
      state:"book-list",
      name:"Book List",
      type:"link",
   },
  {
    state:"mass-request",
    name:"Mass Book Request",
    type:"link",
  },
  {
    state:"personal-request",
    name:"Personal Book Request",
    type:"link",
  },
  {
    state:"books-add",
    name:"Add Books",
    type:"link",
  },
  // {
  //   state:"",
  //   name:"Keep in touch",
  //   type:"sub",
  //   icon: 'fa fa-caret-down',
  //   children: [
  //     { state: 'about', name: 'About', type:"link"},
  //     { state: 'contact', name: 'Contact', type:"link"},
  //     { state: 'support', name: 'Support', type:"link"},
  //   ]
  // }
];

const FOOTERMENU = [
   {
      state: "home",
      name: "Home",
      type:"link"
   },
   {
      state:"contact",
      name:"Contact",
      type:"link"
   },
   {
      state:"team",
      name:"Team",
      type:"link"
   },
   {
      state:"about",
      name:"About",
      type:"link"
   }
]

const EXPLOREMENU = [
   {
      state: "home",
      name: "Dashboard",
      type:"link"
   },
   {
      state: "sign-in",
      name: "Sign In",
      type:"link"
   },
   {
      state: "sign-up",
      name: "Sign Up",
      type:"link"
   },
   {
      state: "privacy-policy",
      name: "Privacy Policy",
      type:"link"
   },
   {
      state: "terms-conditions",
      name: "Terms & Conditions ",
      type:"link"
   }
];

const FOOTERMENU2 = [
   {
      state: "home",
      name: "Home",
      type:"link"
   },
   {
      state:"sidebar-widgets",
      name:"Widgets",
      type:"link"
   },
   {
      state:"about",
      name:"About",
      type:"link"
   },
   {
      state:"contact",
      name:"Contact",
      type:"link"
   },
   {
      state:"support",
      name:"Support",
      type:"link"
   },
   {
      state:"search",
      name:"Search",
      type:"link"
   }
];

@Injectable()
export class MenuItems {

   /*
    * Get all header menu
    */
   getMainMenu(): Menu[] {
      return HEADERMENUITEMS;
   }

   /*
    * Get footer menu
    */
   getFooterMenu(): Menu[] {
      return FOOTERMENU;
   }

   /*
    * Get the explore menu
    */
   getExploreMenu(): Menu[] {
      return EXPLOREMENU;
   }

   /*
    * Get the footer2
    */
   getFooter2(): Menu[] {
      return FOOTERMENU2;
   }

}
