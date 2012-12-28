// Styled Form - by Lagden
;(function($){
    var opts;
    var methods = {
        init: function(options) {
            opts = $.extend({
                'hiddenStyle': 'hiddenStyle'
            }, options);

            return this.each(function(){
                var $this = $(this);
                if ($this.is('select'))
                    methods.styledSelect($this);
            });
        },
        styledSelect: function(self){            
            var span = $('<span></span>');
            var options = self.find('option');
            var title = (options.filter(":selected").val() != '') ? options.filter(":selected").text() : options.eq(0).text();
            self
                .after(
                    span
                        .attr("class", self.attr("class"))
                        .css('width', self.width() + 'px')
                        .html(title)
                )
                .addClass(opts.hiddenStyle)
                .bind('change',methods.change);
        },
        change: function(e){
            var span = $(this).next('span:eq(0)').text($('option:selected', this).text());
        },
        destroy: function(){
            return this.each(function(){
                var $this = $(this);
                $this
                    .removeClass(opts.hiddenStyle)
                    .unbind('change')
                    .next('span:eq(0)').remove();
            });
        }
    };

    $.fn.customized = function( method ){
        if ( methods[method] )
            return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
        else if ( typeof method === 'object' || ! method )
            return methods.init.apply( this, arguments );
        else
            $.error( 'Method ' +  method + ' does not exist on jQuery.customized' ); 
    };
})( jQuery );

jQuery(document).ready(function($) {

    //footer
    var alturaFooter = ($(document).height() - $('#content').height() - $('header').height() - 110 );
    if( $('#wpadminbar').length > 0 ) alturaFooter -= 28 ;
    
    if( alturaFooter < 100 ) alturaFooter = 100 ;
    $('footer').height( alturaFooter + "px" );
    

    // home
    $('.destaque_principal > div:not(:first)').hide();
    $('.destaque_thumbs ul li:first').hide();
    $('.destaque_thumbs ul li:visible:eq(2)').addClass('no-border');

    $('.destaque_thumbs ul li a').click(function(e) {
        e = e || event;
        e.preventDefault();

        var idx = $(this).parent('li').index();
        $('.destaque_principal > div:visible').fadeOut();
        $('.destaque_principal > div:eq(' + idx + ')').fadeIn();

        $('.destaque_thumbs ul li').removeClass('no-border').show();
        $(this).parent('li').hide();
        $('.destaque_thumbs ul li:visible:eq(2)').addClass('no-border');
    });

    createGrid('.lista-items');

    $('.galeria').PikaChoose({ carousel: true, autoPlay: false, showCaption: false });

    $('.combo-categorias a.atual').click(function(e) {
        e = e || event ;
        e.preventDefault();
        $('.combo-categorias ul.items').toggle();
    });

    $(".modal_video").fancybox({
        maxWidth    : 800,
        maxHeight   : 600,
        padding     : 5,
        width       : '70%',
        height      : '70%'

    }).filter('.intro').trigger('click');

    $(".js-boxinfo").fancybox({
        width   : 830,
        height  : 500,
        padding : 0,
        margin  : 0,
        closeBtn: false,
        closeClick: false,
        afterShow: function(){
            // Custom Form
            $('select.Styled').customized();
        }
    });
});


function createGrid (container) {
    $('.grid-item', container).each(function (i,e) {
        switch(i){
            case 0:
                $(this).addClass('col1').addClass('row1');
                break;
            case 1:
                $(this).addClass('col2').addClass('row1');
                break;
            case 2:
                $(this).addClass('col1').addClass('row1').addClass('omega');
                break;
            case 3:
                $(this).addClass('col1').addClass('row2');
                break;
            case 4:
                $(this).addClass('col2').addClass('row1');
                break;
            case 5:
                $(this).addClass('col1').addClass('row2').addClass('omega');
                break;
            case 6:
                $(this).addClass('col1').addClass('row1');
                break;
            case 7:
                $(this).addClass('col1').addClass('row1');
                break;
        }
    });
}