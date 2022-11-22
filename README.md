Пример реализации микросервисов в modx для заметки на modx.pro

## Инициализация
Заменяем в docker-compose.yml  
`user: pavel`  
`uid: 1000`  
На своего пользователя и id, для того чтобы их узнать 
выполните в консоле команду `id`

В hosts файл добавляем `127.0.0.1 modx.loc`

## Запуск
`make up` - запустить контейнеры  
`make down` - остановить контейнеры

## Вход
```
http://modx.loc/manager/
modx_admin
X5NasAOm
```
`http://modx.loc/manager/?a=home&namespace=wsexample` - компонент
