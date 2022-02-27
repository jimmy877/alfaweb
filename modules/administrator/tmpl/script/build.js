/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};

/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {

/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;

/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			exports: {},
/******/ 			id: moduleId,
/******/ 			loaded: false
/******/ 		};

/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);

/******/ 		// Flag the module as loaded
/******/ 		module.loaded = true;

/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}


/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;

/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;

/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";

/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

	__webpack_require__(1);
	module.exports = __webpack_require__(1);


/***/ },
/* 1 */
/***/ function(module, exports, __webpack_require__) {

	/**
	 * Created by Anton on 23.10.2016.
	 */
	var CatList = __webpack_require__(2);

	$(document).ready(function(){
	    var catList = new CatList('.open_sub');
	    catList.catLoad();

	});


/***/ },
/* 2 */
/***/ function(module, exports) {

	/**
	 * Created by Anton on 23.10.2016.
	 */

	/*class CatLoader{

	    constructor(className){
	        this.className = className;
	    }

	    catLoad(){
	        $('body').on('click',this.className,function(){
	            $(this).text('-');
	            let parentID = $(this).attr('parentID');
	            let This = $(this); //$(this) передаем ее дальне в другие функции
	            let list;
	            $.getJSON('/administrator/categories/?id='+parentID+'&js=1',function(data){
	                list ={"list":data};
	                loadUser();

	            });

	            function loadUser() {
	                $.get("/modules/administrator/tmpl/script/catloader/template2.mst", function(template) {
	                    //var rendered = Mustache.render(template, list);
	                    var rendered = Handlebars.compile(template);
	                    This.parent().find('.sub_cats').html(rendered(list));

	                });
	            }

	            /*Handlebars.registerHelper('myy', function(conditional, options) {
	                if(conditional==) {
	                    return options.fn(this);
	                } else {
	                    return options.inverse(this);
	                }
	            });*/

	            /*Handlebars.registerHelper('IF', function (expression, options) {
	                var fn = function() {}, result;
	                try {
	                    fn = Function.apply(this, ['return ' + expression + ' ;']);
	                } catch(e) {}
	                try {
	                    result = fn.bind(this)();
	                } catch(e) {}

	                return result ? options.fn(this) : options.inverse(this);
	            })

	        });
	    }
	}*/


	function CatLoader(className) {

	    this.className = className;

	    this.catLoad = function () {
	        $('body').on('click', this.className, function () {
	            $(this).text('-');
	            $(this).removeClass('open_sub').addClass('close_sub');
	            var parentID = $(this).attr('parentID');
	            var This = $(this); //$(this) передаем ее дальне в другие функции
	            var list;
	            $.getJSON('/administrator/categories/?id=' + parentID + '&js=1', function (data) {
	                list = {"list": data};
	                loadUser();

	            });


	            function loadUser() {
	                $.get("/modules/administrator/tmpl/script/catloader/template2.mst", function (template) {
	                    //var rendered = Mustache.render(template, list);
	                    var rendered = Handlebars.compile(template);
	                    This.parent().find('.sub_cats').html(rendered(list));

	                });
	            }

	            Handlebars.registerHelper('IF', function (expression, options) {
	                var fn = function () {
	                }, result;
	                try {
	                    fn = Function.apply(this, ['return ' + expression + ' ;']);
	                } catch (e) {
	                }
	                try {
	                    result = fn.bind(this)();
	                } catch (e) {
	                }

	                return result ? options.fn(this) : options.inverse(this);
	            })

	        });

	        $('body').on('click', '.close_sub', function (){
	            $(this).text('+');
	            $(this).removeClass('close_sub').addClass('open_sub');
	            $(this).parent().find('.sub_cats').html('');
	        });

	        /*Поиск категорий*/
	        $('#c_search').keyup(function(e){
	            var search = $(this).val();
	            if(search.length>=3){      // Поиск, если больше трем символов указано
	                $('#target').hide();  //прячем основной контент
	                $.getJSON('/administrator/categories/usesearch/?param=' + search, function (data) {

	                    if(data.length<=0){
	                        $('#s_result').show();
	                        $('#s_result_block').show();
	                        $('#s_result').html('<h3>Таких категорий не создано</h3>')
	                    }else{
	                        list = {"list": data};
	                        $.get("/modules/administrator/tmpl/script/catloader/search_result.mst", function (template) {
	                            var rendered = Handlebars.compile(template);
	                            $('#s_result').html(rendered(list));
	                            $('#s_result').show();
	                            $('#s_result_block').show();

	                        });
	                    }

	                });
	            }
	            if(search.length<3){//отмена поиска
	                $('#s_result_block').hide();
	                $('#s_result').hide();
	                $('#target').show();
	            }

	        });
	        /*-------------*/


	        /* Выборка категории по умолчанию */
	        var catId = $('.editCat_hidden input').val();
	        $('.select_cat option').each(function(){
	            if($(this).attr('value')== catId){
	                $(this).attr("selected", "selected");
	            }
	        });
	        /*---------------------------------*/

	    };
	}

	module.exports= CatLoader;


/***/ }
/******/ ]);
/*--------------- выше надо разбирать, как работает ---------------*/

window.onload = function() {
	//жду загрузки всего кода

	//получаю все ссылки из меню табов
	let tabItems = document.querySelectorAll(".tab_item");

	// в цикле вешаю на них прослушиватель события "клик" и прописываю функцию в которой произойдет вся магия
    tabItems.forEach(
    	el=>{ // это стрелочная функция, где el это переменная для цикла
    		el.addEventListener('click', tabToggle);
    	});

    // функция с магией
    function tabToggle(e) {

    	//предотавращаю переход по ссылке
        e.preventDefault();

        let _This = e;
        //получаю атрибут по которому буду находить блоки
        let tab = e.srcElement.attributes.href.value;
        console.log(e);

    	let tabsBlock = document.querySelectorAll(".tabs");

		let toggle = callback=>{
    		tabsBlock.forEach(
    			el=>el.style.display="none"
			);
            tabItems.forEach(
                el=>{
                    el.style.cssText="color:#77BACE; font-weight:normal";
                });
    		callback(); // дожидаюсь цикла и после этого выполняю включение блока

    	};


		toggle(function(){ //вызываю функцию выше где в параметре передаю колбек
            document.querySelector("."+tab).style.display="block";
            _This.srcElement.style.cssText="color:#1F1F20; font-weight:bold";
		});

    }






};

