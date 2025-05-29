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
   git clone <url-del-repositorio>
   ```

2. Accede al directorio del proyecto:
   ```bash
   cd <nombre-del-proyecto>
   ```

3. Instala las dependencias:
   ```bash
   composer install
   ```

4. Configura el archivo `.env`:
   - Copia el archivo `.env.example` y renómalo a `.env`.
   - Configura las credenciales de la base de datos.

5. Genera la clave de la aplicación:
   ```bash
   php artisan key:generate
   ```

6. Ejecuta las migraciones:
   ```bash
   php artisan migrate
   ```

7. (Opcional) Si estás usando JWT para autenticación, genera la clave JWT:
   ```bash
   php artisan jwt:secret
   ```

## Endpoints

### **Criptomonedas**

#### Listar todas las criptomonedas
- **URL**: `/api/criptomonedas`
- **Método**: `GET`
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

#### Crear una criptomoneda
- **URL**: `/api/criptomonedas`
- **Método**: `POST`
- **Descripción**: Crea una nueva criptomoneda.
- **Parámetros**:
  - `nombreCriptomoneda` (string, requerido)
  - `simboloCriptomoneda` (string, requerido)
  - `monedaId` (integer, requerido)
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
- **Descripción**: Actualiza los datos de una criptomoneda existente.
- **Parámetros**:
  - `nombreCriptomoneda` (string, requerido)
  - `simboloCriptomoneda` (string, requerido)
  - `monedaId` (integer, requerido)
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
              "nombre": "Dólar",
              "simbolo": "USD"
          }
      }
  }
  ```

#### Buscar criptomonedas por moneda
- **URL**: `/api/criptomonedas?moneda={nombreMoneda}`
- **Método**: `GET`
- **Descripción**: Devuelve las criptomonedas asociadas a una moneda específica.
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

### **Monedas**

#### Listar todas las monedas
- **URL**: `/api/monedas`
- **Método**: `GET`
- **Descripción**: Devuelve todas las monedas registradas.

#### Crear una moneda
- **URL**: `/api/monedas`
- **Método**: `POST`
- **Descripción**: Crea una nueva moneda.
- **Parámetros**:
  - `nombre` (string, requerido)
  - `simbolo` (string, requerido)

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