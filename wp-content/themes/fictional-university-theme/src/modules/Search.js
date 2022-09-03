class Search{
    constructor(){
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.events();
    }

    events(){
        this.openButton.on("click",this.openOverlay);
        this.closeButton.on("click",this.claseOverlay);
    }

    openOverlay(){
        alert(55);
        this.searchOverlay.addClass("search-overlay--active");
    }

    claseOverlay(){
        alert(556);
        this.searchOverlay.removeClass("search-overlay--active");
    }
}

export default Search