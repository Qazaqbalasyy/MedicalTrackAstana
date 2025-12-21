# Docker Инструкция для MedicalTrack Astana

## Быстрый старт

### Запуск приложения
```bash
docker-compose up -d
```

### Остановка приложения
```bash
docker-compose down
```

### Пересборка после изменений в Dockerfile
```bash
docker-compose up -d --build
```

## Полезные команды

### Просмотр запущенных контейнеров
```bash
docker ps
```

### Просмотр логов
```bash
docker-compose logs -f
# или для конкретного контейнера
docker logs medicaltrack_web -f
```

### Вход в контейнер (для отладки)
```bash
docker exec -it medicaltrack_web bash
```

### Перезапуск контейнера
```bash
docker-compose restart
```

### Полная очистка (удаление контейнеров и volumes)
```bash
docker-compose down -v
```

## Структура Docker

- **Dockerfile** - конфигурация образа (PHP 8.2 + Apache + SQLite)
- **docker-compose.yml** - оркестрация сервисов
- **Порт**: `8080` (http://localhost:8080)
- **База данных**: SQLite в директории `data/` (персистентная)

## Volumes (Монтируемые директории)

Следующие директории монтируются для hot-reload во время разработки:
- `./app` → `/var/www/html/app`
- `./public` → `/var/www/html/public`
- `./data` → `/var/www/html/data` (база данных)

Изменения в этих файлах сразу отражаются в контейнере без пересборки.

## Troubleshooting

### Порт 8080 занят
Измените порт в `docker-compose.yml`:
```yaml
ports:
  - "8081:80"  # вместо 8080
```

### Проблемы с правами доступа к базе данных
```bash
docker exec -it medicaltrack_web bash
chmod -R 777 /var/www/html/data
```

### Очистка всех Docker ресурсов проекта
```bash
docker-compose down -v --rmi all
```
