    $(document).ready(function(){       $(".glasses").on("click", function(){            $("body").css("background", "#fff");            $(".carousel-indicators").css("display", "none");            $(".back-glasses").css("display", "block");            $("p").css("color", "black");            $("p").css("fontSize", "17pt");            $("a").css("fontSize", "17pt");            $("li").css("fontSize", "17pt");            $("img").css("display", "none");            $("#block-logo").css("display", "block");            $("#block-logo").css("color", "#fff");       });              $(".back-glasses").on("click", function(){            location.reload();       })   });