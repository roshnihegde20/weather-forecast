
/*Introduction*/

Built API allows you to manage city data and retrieve weather information. It's built using Laravel, Pint, and Guzzle.

/*Technologies Used*/

Laravel v10.28.0
PHP v8.2.6
Pint
Guzzle


/*API Endpoints*/

//Create a City

URL: {env}/api/city
Method: POST
Parameters:

city_name: The name of the city.
country_code: The country code for the city.

//Weather API and Store Data

URL: {env}/api/weather
Method: POST
Parameters:

city_id: The ID of the city for which weather data will be stored.
temperature: The temperature data.
humidity: The humidity data.
pressure: The pressure data.


//Get Weather Records by City

URL: {env}/api/weather
Method: GET
Parameters:

cityId: An array of city IDs for which weather data will be retrieved.

Eg : URL : {env}/api/weather?cityId=1&cityId=2&cityId=3&cityId=4&cityId=5

/*migrations*/
Migration has been created to store weatherData, city data and secret key

command : php artisan migrate

/*Seeders*/
A seeder has been created to seed the secret key.

Testing Seeders
Testing seeders have been created to store weather data, city data, and secret keys for testing purposes.

Command : php artisan db:seed

For validation Laraval Request feature has been used
For response Laravel response feature has been used 



Additional Improvement

Project with docker setup 
To authenticate each API, I would have built login whereIN user has to be authenticated before accessing other APis.
And JWT token would have been implemented. On each API call bearer token should be passed.




