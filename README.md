# Microsoft-Azure-PHP-SDK-Storage
Example code how to use Azure storage within a PHP app

## Installation

Clone or download this repository. 

Or

Install via Composer

Install Git. Note that on Windows, you must also add the Git executable to your PATH environment variable.

Create a file named composer.json in the root of your project and add the following code to it:

{
    "repositories": [
        {
            "type": "pear",
            "url": "http://pear.php.net"
        }
    ],
    "require": {
        "pear-pear.php.net/mail_mime" : "*",
        "pear-pear.php.net/http_request2" : "*",
        "pear-pear.php.net/mail_mimedecode" : "*",
        "microsoft/windowsazure": "*"
    }
}
Download composer.phar in your project root.

Open a command prompt and execute the following command in your project root:

php composer.phar install

## Usage

The sample file shows how to connect to a Table storage and retrieve an entity based on a query.

## History

None at this time

## Credits

Joshua Drew
Sr Technical Evangelist - Microsoft
@jdruid
Drew5.net

## License

Apache License 

Version 2.0, January 2004 

http://www.apache.org/licenses/ 

## DISCLAIMER:

The sample code described herein is provided on an "as is" basis, without warranty of any kind, to the fullest extent permitted by law. Both Microsoft and I do not warrant or guarantee the individual success developers may have in implementing the sample code on their development platforms or in using their own Web server configurations. 

Microsoft and I do not warrant, guarantee or make any representations regarding the use, results of use, accuracy, timeliness or completeness of any data or information relating to the sample code. Microsoft and I disclaim all warranties, express or implied, and in particular, disclaims all warranties of merchantability, fitness for a particular purpose, and warranties related to the code, or any service or software related thereto. 

Microsoft and I shall not be liable for any direct, indirect or consequential damages or costs of any type arising out of any action taken by you or others related to the sample code.

