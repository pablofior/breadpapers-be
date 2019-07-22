---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.

<!-- END_INFO -->

#general
<!-- START_0c068b4037fb2e47e71bd44bd36e3e2a -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X GET -G "/oauth/authorize" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/authorize");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("/oauth/authorize", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/authorize`


<!-- END_0c068b4037fb2e47e71bd44bd36e3e2a -->

<!-- START_e48cc6a0b45dd21b7076ab2c03908687 -->
## Approve the authorization request.

> Example request:

```bash
curl -X POST "/oauth/authorize" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/authorize");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("/oauth/authorize", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`POST oauth/authorize`


<!-- END_e48cc6a0b45dd21b7076ab2c03908687 -->

<!-- START_de5d7581ef1275fce2a229b6b6eaad9c -->
## Deny the authorization request.

> Example request:

```bash
curl -X DELETE "/oauth/authorize" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/authorize");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete("/oauth/authorize", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```




### HTTP Request
`DELETE oauth/authorize`


<!-- END_de5d7581ef1275fce2a229b6b6eaad9c -->

<!-- START_a09d20357336aa979ecd8e3972ac9168 -->
## Authorize a client to access the user&#039;s account.

> Example request:

```bash
curl -X POST "/oauth/token" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/token");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("/oauth/token", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



> Example response (400):

```json
{
    "error": "unsupported_grant_type",
    "error_description": "The authorization grant type is not supported by the authorization server.",
    "hint": "Check that all required parameters have been provided",
    "message": "The authorization grant type is not supported by the authorization server."
}
```

### HTTP Request
`POST oauth/token`


<!-- END_a09d20357336aa979ecd8e3972ac9168 -->

<!-- START_d6a56149547e03307199e39e03e12d1c -->
## Get all of the authorized tokens for the authenticated user.

> Example request:

```bash
curl -X GET -G "/oauth/tokens" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/tokens");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("/oauth/tokens", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/tokens`


<!-- END_d6a56149547e03307199e39e03e12d1c -->

<!-- START_a9a802c25737cca5324125e5f60b72a5 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE "/oauth/tokens/1" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/tokens/1");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete("/oauth/tokens/1", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```




### HTTP Request
`DELETE oauth/tokens/{token_id}`


<!-- END_a9a802c25737cca5324125e5f60b72a5 -->

<!-- START_abe905e69f5d002aa7d26f433676d623 -->
## Get a fresh transient token cookie for the authenticated user.

> Example request:

```bash
curl -X POST "/oauth/token/refresh" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/token/refresh");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("/oauth/token/refresh", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`POST oauth/token/refresh`


<!-- END_abe905e69f5d002aa7d26f433676d623 -->

<!-- START_babcfe12d87b8708f5985e9d39ba8f2c -->
## Get all of the clients for the authenticated user.

> Example request:

```bash
curl -X GET -G "/oauth/clients" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/clients");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("/oauth/clients", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/clients`


<!-- END_babcfe12d87b8708f5985e9d39ba8f2c -->

<!-- START_9eabf8d6e4ab449c24c503fcb42fba82 -->
## Store a new client.

> Example request:

```bash
curl -X POST "/oauth/clients" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/clients");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("/oauth/clients", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`POST oauth/clients`


<!-- END_9eabf8d6e4ab449c24c503fcb42fba82 -->

<!-- START_784aec390a455073fc7464335c1defa1 -->
## Update the given client.

> Example request:

```bash
curl -X PUT "/oauth/clients/1" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/clients/1");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->put("/oauth/clients/1", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```




### HTTP Request
`PUT oauth/clients/{client_id}`


<!-- END_784aec390a455073fc7464335c1defa1 -->

<!-- START_1f65a511dd86ba0541d7ba13ca57e364 -->
## Delete the given client.

> Example request:

```bash
curl -X DELETE "/oauth/clients/1" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/clients/1");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete("/oauth/clients/1", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```




### HTTP Request
`DELETE oauth/clients/{client_id}`


<!-- END_1f65a511dd86ba0541d7ba13ca57e364 -->

<!-- START_9e281bd3a1eb1d9eb63190c8effb607c -->
## Get all of the available scopes for the application.

> Example request:

```bash
curl -X GET -G "/oauth/scopes" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/scopes");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("/oauth/scopes", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/scopes`


<!-- END_9e281bd3a1eb1d9eb63190c8effb607c -->

<!-- START_9b2a7699ce6214a79e0fd8107f8b1c9e -->
## Get all of the personal access tokens for the authenticated user.

> Example request:

```bash
curl -X GET -G "/oauth/personal-access-tokens" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/personal-access-tokens");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->get("/oauth/personal-access-tokens", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET oauth/personal-access-tokens`


<!-- END_9b2a7699ce6214a79e0fd8107f8b1c9e -->

<!-- START_a8dd9c0a5583742e671711f9bb3ee406 -->
## Create a new personal access token for the user.

> Example request:

```bash
curl -X POST "/oauth/personal-access-tokens" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/personal-access-tokens");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("/oauth/personal-access-tokens", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



> Example response (419):

```json
{
    "message": "CSRF token mismatch."
}
```

### HTTP Request
`POST oauth/personal-access-tokens`


<!-- END_a8dd9c0a5583742e671711f9bb3ee406 -->

<!-- START_bae65df80fd9d72a01439241a9ea20d0 -->
## Delete the given token.

> Example request:

```bash
curl -X DELETE "/oauth/personal-access-tokens/1" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/oauth/personal-access-tokens/1");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->delete("/oauth/personal-access-tokens/1", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```




### HTTP Request
`DELETE oauth/personal-access-tokens/{token_id}`


<!-- END_bae65df80fd9d72a01439241a9ea20d0 -->

<!-- START_02d045549b2678d1fc27a32573e1b9df -->
## api/v1/user/store
> Example request:

```bash
curl -X POST "/api/v1/user/store" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/api/v1/user/store");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

```php

$client = new \GuzzleHttp\Client();
$response = $client->post("/api/v1/user/store", [
    'headers' => [
            "Authorization" => "Bearer {token}",
        ],
]);
$body = $response->getBody();
print_r(json_decode((string) $body));
```



> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`POST api/v1/user/store`


<!-- END_02d045549b2678d1fc27a32573e1b9df -->


