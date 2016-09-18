#About


README OUTDATED: HAS TO BE UPDATED BEFORE USE!!
README OUTDATED: HAS TO BE UPDATED BEFORE USE!!

TSTE WP plugin template (TS Theme Extension) 2016 for Tuning Synesthesia. Its origianl code was taken from [Wordpress-plugin-template](https://github.com/hlashbrooke/WordPress-Plugin-Template) by hlashbrooke and modified for some purpose.

## Previous versions available at [tSynsth/ts-wp-plugin-template](https://github.com/tSynsth/ts-wp-plugin-template)

ts-wp-plugin-template
|-- master / ver-default
|-- ver-ajax
|-- ver-ajax+piklist
`-- ver-piklist

//This tutorial is using ver-ajax


* v1.0.0 master is the default template 
* v1.1.0 ver-ajax has ajax function inside
* v1.1.0 ver-piklist has [piklist](https://piklist.com/) inside
* v1.2.0 ver-ajax+piklist has ajax and also [piklist](https://piklist.com/)



#Setup

###Prerequisites

| Required Installation	| Mac	| Windows | Notes (For Windows) |
|---		|---	|---  	|---	|
| 1. Python	| installed by default	| required |  [required v2.7.3 for node.js](https://nodejs.org/en/download/) |
| 2. Node.js 	| [required](http://blog.teamtreehouse.com/install-node-js-npm-mac)	| [required](https://nodejs.org/en/download/) | required for npm	|
| 3. Ruby 		| installed by default	| required	| required for SASS	|
| 4. SASS 		| [required](http://sass-lang.com/install)	| required  | ruby gems	|
| 5. Grunt	| [required](http://gruntjs.com/getting-started)| [required](http://gruntjs.com/getting-started) |
| 6. Compass 	| [required](http://thesassway.com/beginner/getting-started-with-sass-and-compass)	| required | ruby gems & [required for SASS](http://thesassway.com/beginner/getting-started-with-sass-and-compass) |

You can install Python, Node.js and Ruby through their excutable file, but for others you need to run commands tool for installation. You need to run as an administrator to install. For mac you can use `sudo` at every command and for windows run as administrator.

**SASS**
`gem install sass` 

**Grunt**
`npm install -g grunt-cli`

**Compass**
`gem install compass`

##Folder Structure
```
ts-wp-plugin-template
|-- assets
|   |-- css
|   |   |-- frontend.css
|   |   |-- frontend.min.css
|   |   |-- dummystyle.css
|   |   |-- dummystyle.min.css
|   |   |-- admin.css
|   |   `-- admin.min.css
|   |-- js
|   |   |-- frontend.js
|   |   |-- frontend.min.js
|   |   |-- plugin.js
|   |   |-- plugin.min.js
|   |   |-- admin.js
|   |   `-- admin.min.js
|   `-- sass
|       |-- frontend.scss
|       `-- admin.scss
|-- config.rb
|-- gruntfile.js
|-- includes
|   |-- class-tspt.php
|   `-- modules
|       |-- tssc_ptshortcode.php
|       `-- tssc_ptshortcodeajax.php
|-- lang
|-- LICENSE
|-- package.json
|-- plugin.php
`-- README.md
```

###Setup Project
1. Download or clone ts-wp-plugin-template to your computer, for clone its require to have Git installed and GitHub account
2. In your terminal/cli navigate to the plugin directory ts-wp-plugin-template
3. Install node_module using the command `npm install`

###Changing Name and Data
1. In plugin.php
* Plugin Name
-> Name of the plugin. 
* Example in this tutorial we will have a plugin name __Tester Code__
* Author Name
-> Use author's full name
* Text Domain
-> Change it to some unique name base on plugin name
* eg: Text Domain: tspt, becausause our plugin name is tester code we use the accronym and change it to __tstc__
* Change every __tspt__ in plugin.php to __tstc__

```php
/*
* Plugin Name:       TS WP Plugin Template
* Version:           1.1.0
* Plugin URI:        http://tuningsynesthesia.com/
* Description:       A WP plugin template for Tuning Synesthesia. Its origianl code was taken from '<a href="https://github.com/hlashbrooke/WordPress-Plugin-Template">WordPress-Plugin-Template</a>' by hlashbrooke and modified for their purpose. How to use: change its file names and variable names at 4 parts in 'plugin.php' and 1 part in 'includes/class-tspt.php')
* Author:            Author Name
* Author URI:        http://tuningsynesthesia.com/
* Requires at least: 3.2.0
* Tested up to:      3.4.0
* Text Domain:       tspt
* Domain Path:       /lang
* License:	      ISC
*/
```
After:	
```php
/*
* Plugin Name:       TS Tester Code
* Version:           1.0.0
* Plugin URI:        http://tuningsynesthesia.com/
* Description:       //Plugin Description
* Author:            //Author Name
* Author URI:        http://tuningsynesthesia.com/
* Requires at least: 3.2.0
* Tested up to:      3.4.0
* Text Domain:       tstc
* Domain Path:       /lang
* License:	     ISC
*/
```

2. In folder __include__ change __class-tspt.php__ to __class-tstc.php__
* Also change the class name inside __class-tstc.php__ to __tstc__
3. In package.json
4. In readme file

****

####After done with all the folder data and name, try to activate the plugin to test your plugin
there are already two ready shortcode inside you can use:
1. ts_ptshortcode: simple shortcode to input $content | [ts_ptshortcode] [/ts_ptshortcode]
2. ts_ptshortcodeajax: shortcode with ajax | [ts_ptshortcodeajax] [/ts_ptshortcodeajax]
****

#To Create Shortcode
### Make a new `php` file inside modules folder
1. Name it according to plugin name eg. __ts_testercode.php__
2. Copy the code from __ts_ptshortcode.php__ or __ts_ptshortcodeajax.php__ (if using ajax) to __ts_testercode.php__
3. Replace every __ts_ptshortcode__ with __ts_testercode__

```php
public function __construct( $parent ) {
$this->parent = $parent;
add_shortcode("ts_ptshortcode", array($this,"ptshortcode"));
//change the code to: add_shortcode("ts_testercode", array($this, "testercode"));
}
```
* Becareful in very beginning of the code, It has a upper-case letter 
```php
if(!class_exists("TS_PTShortcode")){
class TS_PTShortcode{

}}
```
Becareful when replacing every name, if you change it like the one in the template it becoming like this:
```php
if(!class_exists("TS_TesterCode")){
class TS_TesterCode{

}}
```
This class will be use later in plugin.php so be sure of the class name.

4. Write your code after /* Shortcode */ comment, example::

```php
/**--------------------------------------------------
*
*	Shortcode 
*
* -------------------------------------------------- */
/**
*
*	Function: ptshortcode.
*  @return Shortcode main output in html
*
*/

public function testercode($atts, $content){
return ' Hello World ';
}
```
5. In plugin.php adding new `$instance` for __ts_testercode.php__, get the class name

```php
$instance = tspt::instance( __FILE__, $_token, $_version );
$instance->ptshortcode = TS_PTShortcode::instance( $instance );
$instance->ptshortcodeajax = TS_PTShortcodeajax::instance( $instance );
//$instance->testercode = TS_TesterCode::instance($instance);
return $instance;
```
6. Remove __ts_ptshortcode.php__ and __ts_ptshortcodeajax.php__
* Also remove their `$instance` in plugin.php

##Feature
1. __Assets__ folder has stylingsheet folder & Javascript folder

As you can see in the folder structure, every folder content more than 1 file, the css, js, and sass folder 	that you can use are

* css -> frontend.css
* js  -> frontend.js
* sass -> frontend.js

>Everytime you change the sass and js file make sure to use `grunt`,
>use `grunt watch` in the beginning of editing for watching every change,
>make sure to `grunt build` every time the editing is done





##Testing

After the plugin running ok, make sure to place those shortcodes in a post to see if its working properly:

```
[cmt]Here is an are for some comment. Not visible on front-end.[/cmt]

<h2>Hello</h2>
<pre><code>[[ts_hello][/ts_hello]]</code></pre>
[ts_hello][/ts_hello]

<pre><code>[[ts_hello]Hello Rusie![/ts_hello]]</code></pre>
[ts_hello]Hello Rusie![/ts_hello]

<pre><code>[[ts_hello suffix="hello-russie"]Hello Rusie![/ts_hello]]</code></pre>
[ts_hello suffix="hello-russie"]Hello Rusie![/ts_hello]

<pre><code>[[ts_hello font_color="red"]Hello Rusie! I am in red.[/ts_hello]]</code></pre>
[ts_hello font_color="red"]Hello Rusie! I am in red.[/ts_hello]

<h2>Hello Ajax</h2>

<pre><code>[[ts_helloajax]Hello Ajax![/ts_helloajax]]</code></pre>
[ts_helloajax]Hello Ajax![/ts_helloajax]

<pre><code>[[ts_helloajax suffix="userdefined" font_color="red"]Hello Ajax![/ts_helloajax]]</code></pre>
[ts_helloajax suffix="userdefined" font_color="red"]Hello Ajax![/ts_helloajax]

<pre><code>[[ts_helloajax font_color="blue" text_align="center"]Hello Ajax![/ts_helloajax]]</code></pre>
[ts_helloajax font_color="blue" text_align="center"]Hello Ajax![/ts_helloajax]

<h2>Good Bye Ajax</h2>
This is the shortcode made only in Piklist not working.
<pre><code>[[ts_goodbyeajax]Bye Ajax![/ts_goodbyeajax]]</code></pre>
[ts_goodbyeajax]Bye Ajax![/ts_goodbyeajax]
```

##Tutorials

###Workflow
![Modules](http://tuningsynesthesia.com/tools/wp-content/uploads/sites/7/tste_modulespiklist.jpeg "Modules")

###module files

 To define backend default values on your module file, use the following format:
 ```
 extract(shortcode_atts(array(
         'suffix'        => 'demo-sufiix',
         'font_color'    => 'demo-color',
         'class'         => 'demo-sufiix'
         ), $atts));
 if (empty($content)) $content = "Demo Content";
 ```
 This will not overwrite user input.
 When no value is passed by users, this default value will be used.