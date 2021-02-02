(function($){
    function createToc(headings: any) {
        // this script generates a table of contents in a .sidebar element
        headings.each(buildSidebar);
    }

    function buildSidebar( index: Number, el: HTMLElement){
        // console.log(el);
        var self = this;
        self.$el = $(el);

        function assignId(){
            var text = self.$el.text();
            var id = text.replace(/[\s]/gi, '-').replace(/[^a-zA-Z-]/g, "").toLowerCase().substring(0,20);
            self.$el.attr('id', id);
            return self;
        }
        function createSidebarLink(){
            var container = document.createElement('div');
            var link = document.createElement('a');
            $(link).attr('href', '#' + self.$el.attr('id')).attr('id', self.$el.attr('id')).text(self.$el.text());
            container.appendChild(link);
            $(container).appendTo(".table-of-contents .list");
            return self;
        }
        assignId()
        createSidebarLink();
    }

    if($('body').hasClass('about')){
        createToc($("main section > div > h2"));
    }
    if($('body').hasClass('legal')){
        createToc($("main .entry-content > h2"));
    }
})(jQuery);