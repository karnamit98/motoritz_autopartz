

$(document).ready(function(){
                //z-indeces of navbar and search-box when they roll over each other
                $(".navbar-main").css("z-index", "10");
                $(".landing-page-content").css("z-index", "9");

                //when page reloads, the navbar goes on top even if the scroll bar is slided down
                if($("body").scrollTop() > 20 || $("html").scrollTop() > 20) {
                    $(".navbar-main").css("top", "-5px");
                }
                $(window).scroll(function(){
                    if($("body").scrollTop() > 20 || $("html").scrollTop() > 20) {
                    $(".navbar-main").css("top", "-5px");
                    $(".container").css("background-color","#ffffff");
                    $(".navbar-main").children().css("box-shadow","0px 0px 4px #5d5b6a");
                    } else {
                        $(".navbar-main").css("top", "30px");
                        $(".container").css("background-color","transparent");
                        $(".navbar-main").children().css("box-shadow","0 0 0");
                    }
                });

