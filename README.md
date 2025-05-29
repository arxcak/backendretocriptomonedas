# Criptomoneda API

Este proyecto es una API para gestionar criptomonedas y monedas asociadas. Permite realizar operaciones CRUD sobre criptomonedas y monedas, así como buscar criptomonedas asociadas a una moneda específica.

## Requisitos

- PHP >= 8.2.22
- Composer
- Laravel >= ^12.0
- Base de datos (PostgreSQL)

## Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/arxcak/backendretocriptomonedas.git
   ```

2. Accede al directorio del proyecto:
   ```bash
   cd backendretocriptomonedas
   ```

3. Instala las dependencias:
   ```bash
   composer install
   ```

4. Configura el archivo `.env`:
   - Copia el archivo `.env.example` y renómalo a `.env`.
   - Crear una base de datos, nueva para el proyecto.
   - Configura las credenciales de la base de datos.

5. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

6. Ejecuta las migraciones:
   ```bash
   php artisan migrate
   ```

7. Generar el secret para el JWT de autenticación:
   ```bash
   php artisan jwt:secret
   ```

## Endpoints

### **Auth**

#### Login
- **URL**: `/auth/login`
- **Método**: `POST`
- **Request Headers**:
- `Content-Type application/json`
- `Accept application/json`
- **Descripción**: iniciar sesión.
- **Ejemplo de solicitud**:
```json
{
    "email": "usuaetrertrio@example.com",
    "password": "coetertntraseña"
}
```
- **Ejemplo de respuesta**:
```json
{
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNzQ4NDg5MTA3LCJleHAiOjE3NDg0OTI3MDcsIm5iZiI6MTc0ODQ4OTEwNywianRpIjoiaTdMa0tqUFpLa0dNMXRxQSIsInN1YiI6IjIiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.sG6ASh_c_8-kfQFBOPns5e3lhGBRGYqZ95vrD6igqMs"
}
```

#### Register

- **URL**: `/auth/register`
- **Método**: `POST`
- **Request Headers**:
- `Content-Type application/json`
- `Accept application/json`
- **Descripción**: Registrar usuario.
- **Ejemplo de solicitud**:
```json
{
    "name": "arxcaerterterk",
    "email": "usuaetrertrio@example.com",
    "password": "coetertntraseña",
}
```
- **Ejemplo de respuesta**:
```json
{
    "user": {
        "name": "arxqwqcaerterterk",
        "email": "usuawqwetrertrio@example.com",
        "updated_at": "2025-05-29T03:32:40.000000Z",
        "created_at": "2025-05-29T03:32:40.000000Z",
        "id": 4
    },
    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL3JlZ2lzdGVyIiwiaWF0IjoxNzQ4NDg5NTYwLCJleHAiOjE3NDg0OTMxNjAsIm5iZiI6MTc0ODQ4OTU2MCwianRpIjoiVUo4QWVhbkxkR01adHhmbSIsInN1YiI6IjQiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.fGJK0RnrzHVESAvuzJpf7sBK0XwxJK8SVmV6fywxnEs"
}
```

### **Monedas**

#### Listar todas las monedas
- **URL**: `/api/monedas`
- **Método**: `GET`
- **Request Headers**:
- `Content-Type application/json`
- `Accept application/json`
- **Descripción**: Devuelve todas las monedas registradas.
- **Ejemplo de respuesta**:
```json
{
    "success": true,
    "message": "Lista de monedas",
    "description": " Lista",
    "data": [
        {
            "id": 1,
            "nombreMoneda": "usv",
            "simboloMoneda": "GBhzaeeP"
        },
        {
            "id": 2,
            "nombreMoneda": "Lssss",
            "simboloMoneda": "GBhzaeseP"
        },
        {
            "id": 3,
            "nombreMoneda": "Ljkjkkjkj",
            "simboloMoneda": "GBshzaeseP"
        },
        {
            "id": 4,
            "nombreMoneda": "Lig567567lina",
            "simboloMoneda": "G5675eP"
        }
    ]
}
```

#### Crear una moneda
- **URL**: `/api/monedas`
- **Método**: `POST`
- **Request Headers**:
- `Content-Type application/json`
- `Accept application/json`
- **Descripción**: Crea una nueva moneda.
- **Ejemplo de solicitud**:
```json
{
    "nombreMoneda": "Lig567567lina",
    "simboloMoneda": "G5675eP"
}
```
- **Ejemplo de respuesta**:
```json
{
    "success": true,
    "message": "Moneda creada",
    "description": "Lizg567567lina ha sido creada exitosamente.",
    "data": {
        "moneda": {
            "id": 5,
            "nombreMoneda": "Lizg567567lina",
            "simboloMoneda": "zG5675eP"
        }
    }
}
```


### **Criptomonedas**

#### Listar todas las criptomonedas
- **URL**: `/api/criptomonedas`
- **Método**: `GET`
- **Request Headers**:
- `Content-Type application/json`
- `Accept application/json`
- **Descripción**: Devuelve todas las criptomonedas registradas.
- **Parámetros opcionales**:
  - `moneda`: Filtra las criptomonedas asociadas a una moneda específica.
- **Ejemplo de respuesta**:
  ```json
  {
      "success": true,
      "message": "Criptomonedas encontradas",
      "data": [
          {
              "id": 1,
              "nombreCritomonena": "Bitcoin",
              "simboloCritomonena": "BTC",
              "moneda": {
                  "id": 1,
                  "nombre": "Dólar",
                  "simbolo": "USD"
              }
          }
      ]
  }
  ```

#### Listar todas las criptomonedas
- **URL**: `/api/criptomonedas?moneda=Dolar`
- **Método**: `GET`
- **Request Headers**:
- `Content-Type application/json`
- `Accept application/json`
- **Descripción**: Devuelve todas las criptomonedas registradas.
- **Parámetros opcionales**:
  - `moneda`: Filtra las criptomonedas asociadas a una moneda específica.
- **Ejemplo de respuesta**:
  ```json
  {
      "success": true,
      "message": "Criptomonedas encontradas",
      "data": [
          {
              "id": 1,
              "nombreCritomonena": "Bitcoin",
              "simboloCritomonena": "BTC",
              "moneda": {
                  "id": 1,
                  "nombre": "Dolar",
                  "simbolo": "USD"
              }
          }
      ]
  }
  ```

#### Crear una criptomoneda
- **URL**: `/api/criptomonedas`
- **Método**: `POST`
- **Request Headers**:
- `Content-Type application/json`
- `Accept application/json`
- **Descripción**: Crea una nueva criptomoneda.

- **Ejemplo de respuesta**:
  ```json
  {
      "success": true,
      "message": "Criptomoneda creada",
      "description": "Bitcoin ha sido creada exitosamente.",
      "data": {
          "id": 1,
          "nombreCritomonena": "Bitcoin",
          "simboloCritomonena": "BTC",
          "moneda": {
              "id": 1,
              "nombre": "Dólar",
              "simbolo": "USD"
          }
      }
  }
  ```

#### Actualizar una criptomoneda
- **URL**: `/api/criptomonedas/{id}`
- **Método**: `PUT`
- **Descripción**: Actualiza los datos de una criptomoneda existente por ID.

- **Ejemplo de respuesta**:
  ```json
  {
      "success": true,
      "message": "Criptomoneda editada",
      "description": "Bitcoin ha sido editada exitosamente.",
      "data": {
          "id": 1,
          "nombreCritomonena": "Bitcoin",
          "simboloCritomonena": "BTC",
          "moneda": {
              "id": 1,
              "nombreMoneda": "Dólar",
              "simboloMoneda": "USD"
          }
      }
  }
  ```
---

## Ejecución del Servidor

Inicia el servidor de desarrollo:
```bash
php artisan serve
```

Accede a la API en:
```
http://localhost:8000
```

## Esquema de la base de datos.

---

#### **Tabla: monedas**
```markdown
| Campo           | Tipo         | Restricciones          |
|------------------|--------------|------------------------|
| id              | BIGINT       | PRIMARY KEY, AUTO_INCREMENT |
| moneda_nombre   | VARCHAR(255) | UNIQUE, NOT NULL       |
| moneda_simbolo  | VARCHAR(10)  | UNIQUE, NOT NULL       |
| created_at      | TIMESTAMP    | NULLABLE               |
| updated_at      | TIMESTAMP    | NULLABLE               |
```

#### **Tabla: criptomonedas**
```markdown
| Campo                | Tipo         | Restricciones          |
|-----------------------|--------------|------------------------|
| id                   | BIGINT       | PRIMARY KEY, AUTO_INCREMENT |
| criptomoneda_nombre  | VARCHAR(255) | UNIQUE, NOT NULL       |
| criptomoneda_simbolo | VARCHAR(10)  | UNIQUE, NOT NULL       |
| moneda_id            | BIGINT       | FOREIGN KEY (monedas.id), NOT NULL |
| created_at           | TIMESTAMP    | NULLABLE               |
| updated_at           | TIMESTAMP    | NULLABLE               |
```

---

### **Relaciones**
- **`monedas`**:
  - Cada moneda puede estar asociada con múltiples criptomonedas.
- **`criptomonedas`**:
  - Cada criptomoneda está asociada con una única moneda.

---