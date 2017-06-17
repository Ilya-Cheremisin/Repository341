ymaps.ready(init);

function init () {
    var myMap = new ymaps.Map("map", {
            center: [56.838607, 60.605514],
            zoom: 14
        }),

 //-----------------------------------------------------------------------------------------   

        myPlacemark_URGAHU = new ymaps.Placemark([56.840393, 60.610042], {
            // Свойства.
            hintContent: 'Уральский государственный архитектурно-художественный университет'
        }, {
            // Опции.
            // Своё изображение иконки метки.
            iconImageHref: 'img/320.gif',
            // Размеры метки.
            iconImageSize: [32, 32],
            // Смещение левого верхнего угла иконки относительно
            // её "ножки" (точки привязки).
            iconImageOffset: [-16, -16],
        });

                // Создаем геообъект с типом геометрии "Точка".
        myGeoObject_Lyavshenko = new ymaps.GeoObject({
            // Описание геометрии.
            geometry: {
                type: "Point",
                coordinates: [56.896333, 60.617705]
            },
            // Свойства.
            properties: {
                // Контент метки.
                iconContent: 'Лявшенко А.О.',
                balloonContent: 'Временное место проживания на период сессии'
            }
        }, {
            // Опции.
            // Иконка метки будет растягиваться под размер ее содержимого.
            preset: 'twirl#redStretchyIcon',
            // Метку можно перемещать.
            draggable: true
        }),


 //-----------------------------------------------------------------------------------------   


    // Добавляем все метки на карту.
    myMap.geoObjects
        .add(myPlacemark_URGAHU)
        .add(myGeoObject_Lyavshenko);
}
