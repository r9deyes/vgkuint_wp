function Rotator(start_from){
    var phrases = ["Территория успеха!","Единство всех и уникальность каждого!","Сохраняя традиции, смотрим в будущее!","Достойное образование доступно!","От возможного к действительному...","Образование новой волны и дань добрым традициям","Будущее начинается здесь и сейчас!","Быть умным модно!","Здесь реально классно!","Маленький шаг к большой мечте!","Пространство возможностей","Достойное образование - успешная карьера!","Качественное обучение - успешное будущее!","Если быть, то быть первым!","Всегда на высоте!"];
    var total = phrases.length;
    var interval =3000;
    if(void 0 === start_from){
        start_from = 0;
    }
 
    $(".textrotator").text(phrases[start_from]).animate({"opacity":"1"}, 1000, function(){
        if(start_from >= (total-1)){
            setTimeout(function(){
                 $(".textrotator").animate({"opacity":"0"}, 1000, function(){
                     Rotator();
                });
            }, interval);
                }else{
                    start_from++;
                    setTimeout(function(){
                        $(".textrotator").animate({"opacity":"0"}, 1000,function(){
                            Rotator(start_from);
                        });
                    }, interval);
         
                }                   
    })
}




$(document).ready(function(){
    Rotator();
})