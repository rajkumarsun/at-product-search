# AT Product Search

## Framework used

CodeIgniter (version 4.3.2)

Please check PHP requirement in https://codeigniter.com/user_guide/intro/requirements.html#php-and-required-extensions

## Installation

1. Clone project to your local machine.

```
git clone https://github.com/rajkumarsun/at-product-search.git
```

2. Downloads and installs all the libraries, by running the below command in CLI in the project root directory,

```
composer install
```

2. Setup a test domain name in your local vhost file, pointing to the 'public' directory inside the project.

3. Update baseURL in at-product-search/app/Config/App.php file (Line no. 20) to your test domain name.

## Usage

1. Navigate to your test domain name in a web browser.

2. Product search page should be displayed as home page.

## Running PHPUnit tests

Run the below command in CLI in the project root directory,

```
vendor/bin/phpunit --verbose
```

## Public URL for testing

https://at-product-search.rajeshs.me/
