import {Test2} from '/modules/administrator/tmpl/js/Test';
class Test{
    id:number;
    name:string;
    constructor(userId:number,userName:string){
        this.id = userId;
        this.name = userName;
    }
    getInfo(){
        return "id:" + this.id + " name:" + this.name;
    }
}

let Tom:Test=new Test(35,'Tom');
console.log(Tom.getInfo());
let phone:Test2=new Test2();

/// <reference path="../ang/node_modules/reflect-metadata/typings/node.d.ts"/>
/// <reference path="../ang/node_modules/@angular/platform-browser/testing/browser.d.ts"/>
//import{Component} from '../ang/node_modules/@angular/core';
//import {bootstrap} from '../ang/node_modules/@angular/platform/browser';


/*@Component({
    selector: 'todo-app',
    template:"<h1>Todo</h1>"
})


export class AppComponent{

}
bootstrap(AppComponent);*/