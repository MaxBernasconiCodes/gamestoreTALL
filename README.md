
# Game Deals Filter

FullStack chalange for a job interview




## Requirements


- PHP 8.0+
- Composer v2.0+
- NodeJs v14.0+


## Run Locally

Clone the project

```bash
  $git clone https://github.com/MaxBernasconiCodes/gamestoreTALL.git
```

Go to the project directory

```bash
  cd my-project
```

Install composer dependencies

```bash
  composer install
```
Install node dependencies

```bash
  composer npm i
```

Build the assets

```bash
   npm run build
```

Create the sim link for storage

```bash
   php artisan storage:link
```

Start the server

```bash
  php artisan serve
```

Now open the localhost on the port 8000




## API Reference

#### Get all deals

```http
  GET /api/deals
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `q`       | `string` | **Optional**. query string |

#### Get item
