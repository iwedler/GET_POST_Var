# GET_POST_Var Plugin

GET_POST_Var provides some helper functions for fetching data like GET, POST, User IP, User Agent, Cookies, Server Variables (see PHP_Info).

## Usage

### {exp:get_post_var type='get' var='variable_name'}

To use this plugin, put this tag in your template and set up 'type' and 'var'.

**Note: If the specified variable isn't found, an empty string is returned.**

#### Example Usage

```
{exp:get_post_var type='get' var='variable_name'}
```

#### Availalbe Parameters

##### type, var

Supported Types/Pairs:

- type='get' var='variable_name'

- type='post' var='variable_name'

- type='get_post' var='variable_name'<br />
	-- looks in both GET and POST

- type='cookie' var='cookie_name'<br />
	-- reads cookies, [Note: For EE default cookies, you don't need the cookie prefix (i.e. exp_)]

- type='server' var='SERVER_VARIABLE'<br />
	-- (like 'SERVER_SOFTWARE') see PHP INFO (CP Home -> Utilities -> PHP Info) for more variables

- type='user_agent'<br />
	-- no var='' supported

- type='user_ip'<br />
	-- no var='' supported

#### Examples

```
{exp:get_post_var type='get' var='var1'}

```
If the url is example.com/index.php?var1=12345 or example.com/blog/entry?var1=12345
it results in: `12345`

```
{exp:get_post_var type='cookie' var='tracker'}
```
Reads the ExpressionEngine 'exp_tracker' cookie and
results in: `{"0":"blog/get_post_var_free_expressionengine_add_on","1":"blog","token":"7633ec2ac98a8173979cd8906799f488"}`

```
{exp:get_post_var type='server' var='SERVER_SOFTWARE'}
```
results in: `nginx/1.9.10`

```
{exp:get_post_var type='user_agent'}
```
results in: `Mozilla/5.0 (iPad; CPU OS 9_2_1 like Mac OS X) AppleWebKit/601.1 (KHTML, like Gecko) CriOS/48.0.2564.87 Mobile/13D15 Safari/601.1.46`

```
{exp:get_post_var type='user_ip'}
```
results in: `50.116.60.37`

## Change Log

### 2.0

- Updated plugin to be EE 3.x compatible
- Removed NSM Addon Updater compatibility

### 1.0

- Initial release for EE 2.x
