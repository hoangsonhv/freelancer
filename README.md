**1.** **Tạo folder dự án**
- mkdir wp-sage-project
- cd wp-sage-project

**2. Tạo cấu trúc thư mục**
- mkdir nginx
- mkdir wordpress
- touch docker-compose.yml
- touch nginx/default.conf

**3. File docker-compose.yml**

```
version: '3.9'

services:

nginx:
    image: nginx:latest
    container_name: nginx-wp
    ports:
        - "8888:80"
    volumes:
        - ./wordpress:/var/www/html
        - ./nginx/default.conf:/etc/nginx/conf.d/default.conf
    depends_on:
        - php
    networks:
        - wpnet

  php:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: php-wp
    volumes:
      - ./wordpress:/var/www/html
    working_dir: /var/www/html
    networks:
      - wpnet

mysql:
    image: mysql:8.0
    container_name: mysql-wp
    ports:
        - "3307:3306"
    environment:
        MYSQL_ROOT_PASSWORD: root
        MYSQL_DATABASE: wordpress
        MYSQL_USER: wpuser
        MYSQL_PASSWORD: wppass
    volumes:
        - db_data:/var/lib/mysql
    networks:
        - wpnet

phpmyadmin:
    image: phpmyadmin/phpmyadmin
    container_name: pma-wp
    depends_on:
    - mysql
    ports:
    - "8081:80"
    environment:
    PMA_HOST: mysql
networks:
    - wpnet

volumes:
    db_data:

networks:
    wpnet:
```

**4. File Nginx config: nginx/default.conf**

```
server {
listen 80;
server_name localhost;
root /var/www/html;
index index.php index.html

    location / {
        try_files $uri $uri/ /index.php?$args;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_pass php:9000;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    client_max_body_size 64M;
}
```

**5. Download WordPress vào thư mục wordpress/**
- cd wordpress
- wget https://wordpress.org/latest.zip
 unzip latest.zip
 mv wordpress/* .
 rm -rf wordpress latest.zip
 cd ..

**6. Chạy Docker**
- docker compose build --no-cache
- docker compose up -d

**7. Cài theme Sage**

Vào shell của container: 
- docker exec -it php-wp bash

Cài Composer:
- curl -sS https://getcomposer.org/installer | php 
- mv composer.phar /usr/local/bin/composer

Tạo thư mục theme Sage:
- cd wp-content/themes
- composer create-project roots/sage my-theme

**8. Tạo migration bằng Acorn**
- docker exec -it php-wp bash
- cd /var/www/html
- composer require roots/acorn
- curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
  php wp-cli.phar --info
  chmod +x wp-cli.phar
  mv wp-cli.phar /usr/local/bin/wp
- wp config create \
  --dbname=wordpress \
  --dbuser=wpuser \
  --dbpass=wppass \
  --dbhost=mysql \
  --allow-root
- wp core install \
  --url="http://localhost" \
  --title="WP Site" \
  --admin_user="admin" \
  --admin_password="admin123" \
  --admin_email="admin@example.com" \
  --allow-root
- cd wp-content/themes/my-theme
- composer install
- wp theme activate my-theme --allow-root
- wp acorn make:migration create_countries_table --allow-root
- wp acorn make:migration create_competitions_table --allow-root
- wp acorn make:migration create_teams_table --allow-root
- wp acorn make:migration create_matches_table --allow-root
- chmod -R 775 wp-content/themes/my-theme
- Sửa nội dung các file migration như dưới
    ```
      public function up()
      {
          Schema::create('countries', function (Blueprint $table) {
          $table->uuid('id')->primary();
          $table->string('name')->nullable();
          $table->string('logo')->nullable();
          $table->timestamps();
          });
      }
    
      public function down()
      {
          Schema::dropIfExists('countries');
      }
    ```
    ```    
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('logo')->nullable();
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('competitions');
    }
    ```
    ```    
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('competition_id');
            $table->uuid('country_id');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->foreign('competition_id')->references('id')->on('competitions')->onDelete('cascade');        
            $table->timestamps(); 
       });
    }
    
    public function down()
    {
        Schema::dropIfExists('teams');
    }
    ```
    ```    
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('competition_id');
            $table->unsignedBigInteger('home_team_id');
            $table->unsignedBigInteger('away_team_id');
            $table->unsignedTinyInteger('status_id')->comment("1: Not started,2: First half,3: Half-time,4: Second half,5: Overtime,6: Overtime(deprecated),7: Penalty Shoot-out,8: End,9: Delay");        
            $table->unsignedBigInteger('match_time');
            $table->json('home_scores')->nullable()->comment('[0: Score (regular time),1: Halftime score,2: Red cards,3: Yellow cards,4: Corners (-1 = no data),5: Overtime score (120m),6: Penalty shootout score]');
            $table->json('away_scores')->nullable()->comment('[0: Score (regular time),1: Halftime score,2: Red cards,3: Yellow cards,4: Corners (-1 = no data),5: Overtime score (120m),6: Penalty shootout score]');
            $table->timestamps(); 
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('matches');
    }
    ```
- Tạo file config/database.php: `mkdir config & touch config/database.php`

**19. Tạo model**
- cd wp-content/themes/my-theme
- mkdir app/Models
- touch app/Models/Country.php
- touch app/Models/Competition.php
- touch app/Models/Team.php
- touch app/Models/Matches.php
- Nội dung các file trong code 

**10. Tạo Data mẫu** 
- wp acorn make:seeder DatabaseSeeder --allow-root
- wp acorn make:seeder CountriesSeeder --allow-root
- wp acorn make:seeder CompetitionsSeeder --allow-root
- wp acorn make:seeder TeamsSeeder --allow-root
- wp acorn make:seeder MatchesSeeder --allow-root
- Nội dung các file trong code: Lưu ý: cần đổi `namespace` cho chính xác như code
- File composer.json thêm: `"psr-4": {
  "App\\": "app/",
  "Database\\": "database/"
  }`
- Tạo dữ liệu mẫu: wp acorn db:seed --allow-root
- Lưu ý: Cần cấp quyền cho các file mới tạo: `chmod -R 775 database`

**11. Build theme Sage**
- docker exec -it php-wp bash
- cd wp-content/themes/my-theme
- composer install
- yarn install
- yarn build

**7. Truy cập trang web**

| Service    | URL                                            |
| ---------- | ---------------------------------------------- |
| WordPress  | [http://localhost:8888](http://localhost:8888) |
| phpMyAdmin | [http://localhost:8081](http://localhost:8081) |
