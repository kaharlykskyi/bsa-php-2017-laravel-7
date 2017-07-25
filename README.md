### Academy 2017: Automated code-testing and continuous integration (PHPUnit).

#### Установка проекта локально

* Склонировать проект https://github.com/kaharlykskyi/bsa-php-2017-laravel-7
* Сформировать файл .env ``cp .env.example .env``, вставить ``APP_URL, DB_DATABASE и тд``
* Создать базу данных
* Развернуть миграции БД ``php artisan migrate`` и заполнить данными ``php artisan db:seed``

#### Задания

1. В основе реализации таблица `rentals` в которой все поля: `car_id`, `user_id`, `price`, `rented_at` .. , `returned_at` и тд.
При аренде машины в данную таблицу добавляется запись об аренде с полями `returned_at = null`. При возврате в это поле указывается
время возврата. Таким образом далее можно арендовать ту же самую машину, и тот юзер может арендовать другие машины, но преждее аренды (архив) сохранится.
2. Реализованы ``RentalService, ReturnService`` в папке ``app\Services``
3. Создан пользовательский интерфейс (контролы `Rent car`, `Return car`) по роутам:
    - `/cars/{id}/rent` контролер `Rental\RentalController`
    - `/cars{id}/return` контролер `Rental\ReturnController`
4. Реализован REST API по роутам (метод `POST`):
    - `/cars/api/rent` контролер `Rental\Api\RentalController`
    - `/cars/api/return` контролер `Rental\Api\ReturnController`
    
    Для того чтобы арендовать/вернуть машину по API необходимо быть авторизованым (иметь `Auth::user()->id`)
    и в body POST запроса передать `car_id`.

#### Написанные тесты
Все тесты используют `DatabaseMigrations`, т.е перед выполнением каждого теста выполняют `php artisan migrate` + `php artisan migrate:rollback`.
Для работы в тестах добавлена `insertData` миграция которая создает 2 юзера и 2 машины, а так же одну аренду (`user_id = 1`, `car_id = 1`) 
1. **`AuthenticationControlTest`** - dusk test с тестами:
    1. `testUnauthorizedDontSeeRentPage` - не авторизованные юзеры не должны видеть пользовательский интерфейс по аренде машины.
    2. `testAuthorizedSeeRentPage` - авторизованые должны видить.
2. **`RentalApiTest`** с тестами:
    1. `testShouldNotSeeApiWithoutAuth` - не авторизованные юзеры не могут получить api аренды. Проверка на redirect (302)
    2. `testShouldGetSuccessCode` - тест логинится на юзера с `user_id = 2` и берет в аренду машину `с car_id = 2`. Проверка на success (200)
    3. `testShouldSuccessfullyRentCar` - тоже самое что и выше но проверка на `assertJson`, должен видить json с сообщением об успешной арендой
    4. `testShouldGetErrorCode` - тест логинится на юзера с `user_id = 1` и берет в аренду машину `с car_id = 2`. Проверка на error (404). Юзер уже имеет арендрованую машину.
    5. `testShouldNotSuccessfullyRentCar` - тоже самое что и выше но проверка на `assertJson`, должен видить json с сообщением об ошибке аренды
3. **`ReturnApiTest`** - с тестами:
    1. `testShouldNotSeeApiWithoutAuth` - не авторизованные юзеры не могут получить api для возврата аренды. Проверка на redirect (302)
    2. `testShouldGetSuccessCode` - проверка на success (200), машина должна быть успешно возвращена
    3. `testShouldSuccessfullyReturnCar` - проверка на `assertJson`, должен видить json с сообщением об успешном возврате аренды
    4. `testShouldGetErrorCode` - проверка на error (404), машина не должна быть  возвращена. Это не его машина
    5. `testShouldNotSuccessfullyRentCar` - проверка на `assertJson`, должен видить json с сообщением об ошибке возврате аренды
4. **`RentalServiceTest`** - с тестами для класса `RentalService`:
    1. `testShouldRentWithCorrectData` - тест должен арендовать машину с коректными данными (`user_id = 2`, `car_id = 2`)
    2. `testShouldNotRentWhenUserHaveRent`  - тест не должен арендовать машину если у юзера у есть арендованная машина
    3. `testShouldNotRentWhenCarIsRented` - тест не должен арендовать машину если она уже арендована кем то другим
    4. `testShouldNotRentToNonExistingUser` - тест не должен арендовать машину запросом несуществующего юзера
    5. `testShouldNotRentToNonExistingCar` - тест не должен арендовать несуществующую машину
5. **`ReturnServiceTest`** - с тестами для класса `ReturnService`:
    1.`testShouldReturnCar` - тест должен возвращать машину с коректными данными (`user_id = 1`, `car_id = 1`)
    2. `testCanNotReturnNonExistentCar` - тест не должен возвращать несуществующую машину
    3. `testCanNotReturnCarFromNonExistentUser` - тест не должен возвращать машину если она взята другим юзером.
    
#### Запуск тестов
Требования:
   * `APP_URL` в `.env`
   
Запуск:
   * `./vendor/bin/phpunit`