### Домашнее задание: разработка системы рассылки email сообщений с помощью очереди (queue)

#### Требования
Рализовать очередь для простой рассылки уведомлений пользователям о добавлении новой машины в БД используя фреймворк Laravel.

***

#### Установка

* Склонировать репозиторий с тестами https://github.com/BinaryStudioAcademy/bsa-2017-php-11
* Мигрировать из предыдущего домашнего задания все Controllers, Models, Views и т.д.
* Развернуть миграции БД


#### Задание

Для выполнения задания необходимо необходимо использовать опыт и код предыдущих домашних заданий.

Основная цель задания: после добавления администратором нового автомобиля в БД проинформировать с помощью информационного Email всех
пользователей из таблицы Users по соответствующим email-адресам.

Небольшой тест, который проверяет Job можно запустить из tests\Feature\QueueTest

* Проверить и настроить очереди в config\queue.php:
- Connection type: beanstalkd
- Queue name: notification

* Реализовать job класс класс App\Jobs\SendNotificationEmail для отправки Email о добавлении нового автомобиля всем пользователям из таблицы users
* Job должен получать модель User и отправлять произвольный текст о добавлении нового автомобиля с некоторой информацией об автомобиле
* Очень желательно добавить краткое описание, как и что происходит, к домашней работе на портале академии 