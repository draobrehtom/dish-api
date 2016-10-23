#Installation

1. Clone the repo
2. Run `composer install` in project root
3. Create file `database/database.sqlite`
4. Config database section in `.env` file
5. Run `php artisan migrate --seed`

#Usage

- To get access token, send `post` request on `/api/login` with data 
    - email: **admin** (for admin) / **user** (for user)
    - password: **123456** (the same for both)

You are get access token for usage.

- To add an item, send `post` request on `/api/add` with data:
    - title: **< name of the item >**
    - price: **< price of the item >**
    - access_token: **< your token >**
    
- To edit an item, send `patch` request on `/api/edit/<item id>` with data:
    - title: **< name of the item >**
    - price: **< price of the item >**
    - access_token: **< your token >**
    
- To remove an item, send `delete` request on `/api/remove/<item id>`
    - access_token: **< your token >**

- To show all items in `json`, send `get` request on `/api/show` or `/api/show.json`
- To show all items in `xml`, send `get` request on `/api/show.xml`