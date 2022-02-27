/**
 * Created by Anton on 23.10.2016.
 */
var CatList = require('./catloader/controller');

$(document).ready(function(){
    var catList = new CatList('.open_sub');
    catList.catLoad();

});



