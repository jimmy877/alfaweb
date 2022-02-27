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


