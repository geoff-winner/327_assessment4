###Developers
Geoff Winner

###Date
March 27, 2015<br />

###Description
Use Composer to install [PHPUnit](https://phpunit.de/), [Silex](http://silex.sensiolabs.org/), and [Twig](http://twig.sensiolabs.org/).

###APP

This program is a tool to list out local shoe stores and the brands of shoes they carry.

###Preparing the database
1. Run psql in the terminal.
2. Type in "CREATE DATABASE 'yourdbname';" in the terminal.
3. Type in "\c 'yourdbname'" in the terminal.
4. Type in "CREATE TABLE brands (id serial PRIMARY KEY, brand_name varchar, size int);" in the terminal.
5. Type in "CREATE TABLE stores (id serial PRIMARY KEY, name varchar);" in your terminal.
6. Type in "CREATE TABLE stores_brands (id serial PRIMARY KEY, store_id int, brand_id int);" in your terminal.
6. Make sure you are accessing psql while in your project folder.
7. HAVE FUN!


###Copyright (c) 2015 Geoff Winner

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
