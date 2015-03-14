![InvoicePlane](http://invoiceplane.com/content/logo/PNG/logo_300x150.png)

## Want to help us? Jump in!

Every help is welcome, you don't have to be a professional PHP developer or SQL database engineer.   
If you are not familiar with PHP or coding in general you could also help us in other ways.

### 1. Sign up

Before you start you should register at [Github](https://github.com/) and our [development board](https://development.invoiceplane.com/) if you want to help coding.   
You should also visit our [Development Chat at Gitter.im](https://gitter.im/InvoicePlane/InvoicePlane/InvoicePlaneDevelopment)

If you want to help in other ways (e.g. user support) please register at our [community forums](https://community.invoiceplane.com).

### 2. Check out the Roadmap

After you registered for the development tools we are using you should check out the [**Roadmap**](https://github.com/InvoicePlane/InvoicePlane-v2/wiki/Roadmap). You can find information about the current status of the development and what has to be done next.   
If you have any questions or ideas feel free to post this to the development category of the community forum or to the [Chatroom](https://gitter.im/InvoicePlane/InvoicePlane/InvoicePlaneDevelopment).

### 3. Get familiar with our Development Guidelines

We are following some strict development guidelines while developing.

**PHP**  
* Coding Standard: [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)

**JavaScript**
* Use JShint / JSlint to check your JavaScript code and try to resolve all code issues

**CSS**
* We use [SASS](http://sass-lang.com/) only.

### 4. Setup your Development Environment

After copying / checking out the InvoicePlane code to your local machine you have to follow these steps to completely configure the development environment

1. Install [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
2. Install [Node.js and NPM](https://docs.npmjs.com/getting-started/installing-node)
3. Install [Bower](http://bower.io/)
4. Run the following commands:
```
composer install
npm install
bower install
gulp
```

#### Tools for development

We received some licenses for commercial development tools you can use if you want. Please contact use at `mail@invoiceplane.com` to get the license / access as we can't publish them here.

* [JetBrains PhpStorm](https://www.jetbrains.com/phpstorm/) (PHP IDE)
* [Balsamiq Mockups](http://balsamiq.com/products/mockups/)
* [Mailtrap.io](https://mailtrap.io/) eMail Testing Solution

### 5. Contributing Code

1. **Before** you submit any code to the repository please take a look at the [development board](https://development.invoiceplane.com/)! Search for issues that may be related to what you want to work on and check the status. If someone is assigned to the issue please talk to him - it's a waste of time if two developers work on the same problem / task.  
2. If you found an issue you would like to work on please assign it to yourself or write a comment that you are working on it.
3. If you work on an issue please add the issue ID (e.g. IPT-12) to the commit.
4. Submit a pull request and explain what you have done.

#### Database Model

We use a pre-defined database model for InvoicePlane you can check out [here](https://my.vertabelo.com/public-model-view/FTM7kwegMsV99IGYK5h804p1wvrFzBEZFYvtAvCeOpLps1CsXLc4vRDyC4gpgR1C).  
* If you want to **add a new field** please leave a comment at the [Database Model Thread](https://community.invoiceplane.com/t/v2-database-scheme/94) and it will be added.
* If you want to **change a field** please leave a comment at the [Database Model Thread](https://community.invoiceplane.com/t/v2-database-scheme/94) so we can discuss this change as everyone has to be notified about this change.

===

#### Links

* [Roadmap](https://github.com/InvoicePlane/InvoicePlane-v2/wiki/Roadmap)
* [Issue Tracker / Agile Board](https://development.invoiceplane.com/browse/IPT)
* [Gitter Chatroom](https://gitter.im/InvoicePlane/InvoicePlane/InvoicePlaneDevelopment)
* [Community: Development Discussion](https://community.invoiceplane.com/c/development-discussion)
  
---
  
*Please notice: The name (InvoicePlane) and the logo can be used but may not be changed or altered in any way.
The name and the logo are both copyright by Kovah.de. For more information visit invoiceplane.com/license-copyright*
