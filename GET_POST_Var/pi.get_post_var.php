<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
========================================================
Plugin GET_POST_Var
--------------------------------------------------------
Copyright: Ingo Wedler, Wedler Technology & Services
License: GPLv3
http://ingowedler.com/
--------------------------------------------------------
This addon may be used free of charge. Should you
employ it in a commercial project of a customer or your
own I'd appreciate a small donation.
========================================================
File: pi.get_post_var.php
--------------------------------------------------------
Purpose: GET_POST_Var provides some helper functions for fetching data like GET, POST, User IP, User Agent, Cookies, Server Variables (see PHP_Info).
========================================================
THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF
ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT
LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO
EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE
FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN
AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE
OR OTHER DEALINGS IN THE SOFTWARE.
========================================================
*/
/**
 * @package     GET_POST_Var
 * @category    Plugin
 * @author      Ingo Wedler
 * @copyright   Copyright (c) 2016, Ingo Wedler
 * @link        http://ingowedler.com/blog/get_post_var_free_expressionengine_add_on
 */
 
class Get_Post_Var
{
  public static $name         = 'GET_POST_Var';
  public static $version      = '2.0';
  public static $author       = 'Ingo Wedler';
  public static $author_url   = 'http://ingowedler.com/';
  public static $description  = 'GET_POST_Var provides some helper functions for fetching data like GET, POST, User IP, User Agent, Cookies, Server Variables (see PHP_Info).';

  public static $typography   = FALSE;

  public $return_data = "";

  // --------------------------------------------------------------------

  /**
   * @access  public
   * @return  string
   */

  public function __construct()
  {

		$this->EE =& get_instance();

		$text = $this->EE->TMPL->tagdata;

		$type = $this->EE->TMPL->fetch_param('type', '');
		$var = $this->EE->TMPL->fetch_param('var', '');

		if ($type == 'user_ip') {
			$text = $this->EE->input->ip_address();
		} elseif ($type == 'user_agent') {
			$text = $this->EE->input->user_agent();
		} elseif ($type == 'server') {
			$text = $this->EE->input->server($var);
		} elseif ($type == 'cookie') {
			$text = $this->EE->input->cookie($var);
		} elseif ($type == 'post') {
			$text = $this->EE->input->post($var);
		} elseif ($type == 'get') {
			$text = $this->EE->input->get($var);
		} else {
			$text = $this->EE->input->get_post($var, TRUE);
		}

		$text = trim($text);

		$this->return_data .= $text;

    }
  // --------------------------------------------------------------------
}
/* END Class */
/* End of file pi.get_post_var.php */
/* Location: ./system/user/addons/get_post_var/pi.get_post_var.php */