Цей проект базується на проекті з попереднього семестру - сервіс аренди автомобілів і мотоциклів. За основу були взяті HTML-сторінки з попередніх робіт та за допомогою Symfony побудований повноцінний веб-сервіс, який бере дані з БД, має адмін панель та JSON-endpoint.

Для запуску слід виконати на локалі наступні команди:

    composer install - для оновлнення всіх потрібних файлів 

    php bin/console doctrine:migrations:migrate --no-interaction - для міграції до БД, при цьому слід додатково створити View, оскільки список авто береться звідти, для чого виконати:
        CREATE VIEW vehicleview AS
        SELECT
            CONCAT('car:', VIN) AS id,
            LicensePlate,
            VIN,
            Color,
            Make,
            Model,
            PriceOfKm,
            ImageName,
            CONVERT('Car' USING utf8mb4) COLLATE utf8mb4_unicode_ci AS `type`
            category_id
        FROM car

        UNION ALL

        SELECT
            CONCAT('motorcycle:', VIN) AS id,
            LicensePlate,
            VIN,
            Color,
            Make,
            Model,
            PriceOfKm,
            ImageName,
            CONVERT('Motorcycle' USING utf8mb4) COLLATE utf8mb4_unicode_ci AS `type`
            category_id
        FROM motorcycle;
    
    php bin/console app:admin:create для створення профіля адміністратора

    symfony server:start для запуску сервера на локалі 

