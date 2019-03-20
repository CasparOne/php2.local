## Домашняя работа №2

1. Добавьте в свое приложение класс App\Config. Объект этого класса при создании должен читать и сохранять в себе файл конфигурации. Его применение:
<br><code>$config = new \App\Config; <br>
      echo $config->data['db']['host'];</code>
      <br>// пусть это пока коряво смотрится, но по-другому мы еще не умеем

2. Если на уроке изучали метод <code>insert()</code>, то продумайте и реализуйте метод <code>update()</code>. Его задача - обновить поля модели, которая ранее была получена из базы данных. Используйте поле <b>id</b> для понимания того, какую запись нужно обновлять!
3. Если же уже изучили <code>update()</code> - напишите метод <code>insert()</code>. Он вставляет в базу данных новую запись, основываясь на данных объекта. Не забудьте, что после успешной вставки вы должны заполнить свойство id объекта!
4. Реализуйте метод <code>save()</code>, который решит - "новая" модель или нет и, в зависимости от этого, вызовет либо <code>insert()</code>, либо <code>update()</code>.
5. Добавьте к моделям метод <code>delete()</code>
6. На базе реализованного вами кода сделайте простейшую (!) админ-панель новостей с функциями добавления, удаления и редактирования новости.
7. *Изучите что такое синглтон (слайды + консультация в чате поддержки) и сделайте класс <b>App\Config</b> синглтоном.