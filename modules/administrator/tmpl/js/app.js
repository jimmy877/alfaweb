System.register(['/modules/administrator/tmpl/js/Test'], function(exports_1, context_1) {
    "use strict";
    var __moduleName = context_1 && context_1.id;
    var Test_1;
    var Test, Tom, phone;
    return {
        setters:[
            function (Test_1_1) {
                Test_1 = Test_1_1;
            }],
        execute: function() {
            Test = (function () {
                function Test(userId, userName) {
                    this.id = userId;
                    this.name = userName;
                }
                Test.prototype.getInfo = function () {
                    return "id:" + this.id + " name:" + this.name;
                };
                return Test;
            }());
            Tom = new Test(35, 'Tom');
            console.log(Tom.getInfo());
            phone = new Test_1.Test2();
        }
    }
});
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
