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
   - Configura las credenciales de la base de datos en el .env.

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
- `Content-Type: application/json`
- `Accept: application/json`
- **Descripción**: iniciar sesión.
- **Ejemplo de solicitud**:
```json
{
    "email": "usuario@example.com",
    "password": "contraseña"
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
- `Content-Type: application/json`
- `Accept: application/json`
- **Descripción**: Registrar usuario.
- **Ejemplo de solicitud**:
```json
{
    "name": "arquimedes",
    "email": "usuario@example.com",
    "password": "contraseña",
}
```
- **Ejemplo de respuesta**:
```json
{
    "user": {
        "name": "arquimedes",
        "email": "usuario@example.com",
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
- `Content-Type: application/json`
- `Accept: application/json`
- `Authorization: Bearer {{token}}`
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
            "nombreMoneda": "euro",
            "simboloMoneda": "EUR"
        },
        {
            "id": 2,
            "nombreMoneda": "peso argentino",
            "simboloMoneda": "ARS"
        },
        {
            "id": 3,
            "nombreMoneda": "dólar de las Bahamas",
            "simboloMoneda": "BSD"
        },
        {
            "id": 4,
            "nombreMoneda": "dólar beliceño",
            "simboloMoneda": "BZD"
        }
    ]
}
```

#### Crear una moneda
- **URL**: `/api/monedas`
- **Método**: `POST`
- **Request Headers**:
- `Content-Type: application/json`
- `Accept: application/json`
- `Authorization: Bearer {{token}}`
- **Descripción**: Crea una nueva moneda.
- **Ejemplo de solicitud**:
```json
{
    "nombreMoneda": "dólar beliceño",
    "simboloMoneda": "BZD"
}
```
- **Ejemplo de respuesta**:
```json
{
    "success": true,
    "message": "Moneda creada",
    "description": "dólar beliceño ha sido creada exitosamente.",
    "data": {
        "moneda": {
            "id": 1,
            "nombreMoneda": "dólar beliceño",
            "simboloMoneda": "BZD"
        }
    }
}
```

### **Criptomonedas**

#### Listar todas las criptomonedas
- **URL**: `/api/criptomonedas`
- **Método**: `GET`
- **Request Headers**:
- `Content-Type: application/json`
- `Accept: application/json`
- `Authorization: Bearer {{token}}`
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
              "nombreCriptomoneda": "Bitcoin",
              "simboloCriptomoneda": "BTC",
              "moneda": {
                  "id": 1,
                  "nombreMoneda": "Dólar",
                  "simboloMoneda": "USD"
              }
          },
          {
              "id": 2,
              "nombreCriptomoneda": "Litecoin",
              "simboloCriptomoneda": "LTC",
              "moneda": {
                  "id": 1,
                  "nombreMoneda": "Dólar",
                  "simboloMoneda": "USD"
              }
          },
          {
              "id": 3,
              "nombreCriptomoneda": "BNB",
              "simboloCriptomoneda": "BNB",
              "moneda": {
                  "id": 1,
                  "nombreMoneda": "Dólar",
                  "simboloMoneda": "USD"
              }
          },
          {
              "id": 4,
              "nombreCriptomoneda": "BNB",
              "simboloCriptomoneda": "BNB",
              "moneda": {
                  "id": 1,
                  "nombreMoneda": "dólar beliceño",
                  "simboloMoneda": "BZD"
              }
          }
      ]
  }
  ```

#### Listar todas las criptomonedas por nombre de moneda
- **URL**: `/api/criptomonedas?moneda=Dolar`
- **Método**: `GET`
- **Request Headers**:
- `Content-Type: application/json`
- `Accept: application/json`
- `Authorization: Bearer {{token}}`
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
              "nombreCriptomoneda": "Bitcoin",
              "simboloCriptomoneda": "BTC",
              "moneda": {
                  "id": 1,
                  "nombreMoneda": "Dolar",
                  "simboloMoneda": "USD"
              }
          },
          {
              "id": 2,
              "nombreCriptomoneda": "Litecoin",
              "simboloCriptomoneda": "LTC",
              "moneda": {
                  "id": 1,
                  "nombreMoneda": "Dólar",
                  "simboloMoneda": "USD"
              }
          },
          {
              "id": 3,
              "nombreCriptomoneda": "BNB",
              "simboloCriptomoneda": "BNB",
              "moneda": {
                  "id": 1,
                  "nombreMoneda": "Dólar",
                  "simboloMoneda": "USD"
              }
          }
      ]
  }
  ```

#### Crear una criptomoneda
- **URL**: `/api/criptomonedas`
- **Método**: `POST`
- **Request Headers**:
- `Content-Type: application/json`
- `Accept: application/json`
- `Authorization: Bearer {{token}}`
- **Descripción**: Crea una nueva criptomoneda.
- **Ejemplo de solicitud**:
```json
    {
        "nombreCriptomoneda": "Bitcoin",
        "simboloCriptomoneda": "BTC",
        "monedaId": 2
    }
```
- **Ejemplo de respuesta**:
  ```json
    {
      "success": true,
      "message": "Criptomoneda creada",
      "description": "Bitcoin ha sido creada exitosamente.",
      "data": {
          "id": 1,
          "nombreCriptomoneda": "Bitcoin",
          "simboloCriptomoneda": "BTC",
          "moneda": {
              "id": 2,
              "nombreMoneda": "Dólar",
              "simboloMoneda": "USD"
          }
      }
    }
  ```

#### Actualizar una criptomoneda
- **URL**: `/api/criptomonedas/{id}`
- **Método**: `PUT`
- **Request Headers**:
- `Content-Type: application/json`
- `Accept: application/json`
- `Authorization: Bearer {{token}}`
- **Descripción**: Actualiza los datos de una criptomoneda existente por ID.
- **Ejemplo de solicitud**:
```json
{
    "nombreCriptomoneda": "12dsf567856tterlina",
    "simboloCriptomoneda": "312345",
    "monedaId": 2
}
```
- **Ejemplo de respuesta**:
  ```json
  {
      "success": true,
      "message": "Criptomoneda editada",
      "description": "Bitcoin ha sido editada exitosamente.",
      "data": {
          "id": 1,
          "nombreCriptomoneda": "Bitcoin",
          "simboloCriptomoneda": "BTC",
          "moneda": {
              "id": 2,
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
## Algunas validaciones.

    'nombreCriptomoneda.required' => 'El nombre de la criptomoneda es obligatorio.',
    'nombreCriptomoneda.string' => 'El nombre de la criptomoneda debe ser una cadena de texto.',
    'nombreCriptomoneda.max' => 'El nombre de la criptomoneda no puede exceder los 255 caracteres.',
    'simboloCriptomoneda.unique:monedas,nombre' => 'El símbolo ya está registrado en la tabla de monedas.',
    'simboloCriptomoneda.unique:criptomonedas,nombre' => 'El símbolo ya está registrado en la tabla de criptomonedas.',

    'simboloCriptomoneda.required' => 'El símbolo de la criptomoneda es obligatorio.',
    'simboloCriptomoneda.string' => 'El símbolo de la criptomoneda debe ser una cadena de texto.',
    'simboloCriptomoneda.max' => 'El símbolo de la criptomoneda no puede exceder los 10 caracteres.',
    'simboloCriptomoneda.unique:monedas,simbolo' => 'El símbolo ya está registrado en la tabla de monedas.',
    'simboloCriptomoneda.unique:criptomonedas,simbolo' => 'El símbolo ya está registrado en la tabla de criptomonedas.',

    'monedaId.required' => 'El ID de la moneda asociada es obligatorio.',
    'monedaId.exists' => 'La moneda asociada no existe en la base de datos.',